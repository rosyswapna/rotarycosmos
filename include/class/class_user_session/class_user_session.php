<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class UserSession {
    var $connection;
    var $id = gINVALID;
    var $username;
    var $password;
    var $emailid;

    var $clubposition_id = gINVALID;
    var $clubposition_name = "";
    var $roll_id = gINVALID;
    var $roll_name = "";

    var $registrationdate;
    var $lastlogin;
    var $sec_que_id = gINVALID;
    var $answer = "";

    var $created = "";
    var $updated = "";
    var $record_user_id= gINVALID;

    var $error = false;
    var $error_number=gINVALID;
    var $error_description="";


    function __construct($username,$password,$connection)
    {
			$this->username =$username;
			$this->password =$password;
			$this->connection =$connection;
    }

    function login(){
          $strSQL = "SELECT U.*, C.roll_id, C.name as clubposition_name, R.name as roll_name FROM users U LEFT JOIN clubpositions C ON  U.clubposition_id = C.id LEFT JOIN rolls R ON C.roll_id = R.id WHERE U.username = '".mysql_real_escape_string($this->username);
          $strSQL .= "' AND U.password='".$this->password."' AND U.userstatus_id = '".USERSTATUS_ACTIVE."'";

          $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
          if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'id');
                $this->username = mysql_result($rsRES,0,'username');
                $this->emailid = mysql_result($rsRES,0,'emailid');
                $this->registrationdate = mysql_result($rsRES,0,'registrationdate');
                $this->lastlogin = mysql_result($rsRES,0,'lastlogin');
                $this->clubposition_id = mysql_result($rsRES,0,'clubposition_id');
                $this->clubposition_name = mysql_result($rsRES,0,'clubposition_name');
                $this->roll_id = mysql_result($rsRES,0,'roll_id');
                $this->roll_name = mysql_result($rsRES,0,'roll_name');

                return true;
          }
          else{
                $this->error_description = "Login Failed";
                return false;
          }
    }

    function register_login(){
           $_SESSION[SESSION_TITLE.'member_userid'] = $this->id;
           $_SESSION[SESSION_TITLE.'member_username'] = $this->username;
		   if($this->clubposition_id != gINVALID){
				$_SESSION[SESSION_TITLE.'member_clubposition_id'] = $this->clubposition_id;
				$_SESSION[SESSION_TITLE.'member_clubposition_name'] = $this->clubposition_name;
				$_SESSION[SESSION_TITLE.'member_roll_id'] = $this->roll_id;
				$_SESSION[SESSION_TITLE.'member_roll_name'] = $this->roll_name;
				// Forum session
				$strSQL = "SELECT user_id, user_name FROM mlf2_userdata WHERE TRIM(user_name) LIKE '%".$this->username."%'";
				$res_forum = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
				$count_forum_user = mysql_num_rows($res_forum);
				if($count_forum_user == 1){
					$row_forum_user = mysql_fetch_assoc($res_forum);
					$_SESSION[mlf2_user_id] = $row_forum_user["user_id"];
					$_SESSION[mlf2_user_name] =$this->username;
					$_SESSION[mlf2_user_type] = 0;
				}
			}else{
				$_SESSION[SESSION_TITLE.'member_clubposition_id'] = $this->clubposition_id;
				$_SESSION[SESSION_TITLE.'member_clubposition_name'] =GUEST;
				$_SESSION[SESSION_TITLE.'member_roll_id'] = ROLL_GUEST;
				$_SESSION[SESSION_TITLE.'member_roll_name'] = GUEST;
			}



			$strSQL = "INSERT INTO userloggedindetails (user_id,ip,created) values('".$this->id."', '".$_SERVER['REMOTE_ADDR']."',now())";
			mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
			$strSQL = "UPDATE users SET lastlogin=now() WHERE id='".$this->id."'";
			mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );


           return true;
    }

    function logout(){
        $chk = session_destroy();
        if ($chk == true){
            return true;
        }
        else{
                return false;
        }
    }


    function check_login(){
		if ( isset($_SESSION[SESSION_TITLE.'member_userid']) && $_SESSION[SESSION_TITLE.'member_userid'] > 0 && $this->user_id == $_SESSION[SESSION_TITLE.'member_userid'] && ($_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_ADMIN || $_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_MEMBER)  ) {
			return true;
		}else{
			return false;
		}
    
	}

}
 
?>
