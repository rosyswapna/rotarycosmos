<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class User {
    var $connection;
    var $id = gINVALID;
    var $username;
    var $password;
    var $clubposition_id = gINVALID;
    var $parent_user_id = gINVALID;
    var $userstatus_id = gINVALID;

    var $emailid;
    var $registrationdate;
    var $lastlogin;
    var $securityquestion_id = gINVALID;
    var $answer = "";

    var $created = "";
    var $updated = "";
    var $record_user_id= gINVALID;

    var $error = false;
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

    function __construct()
    {

    }


    function update(){
        if ( $this->id == "" || $this->id == gINVALID) {
              $strSQL = "INSERT INTO users (username, password,userstatus_id, clubposition_id,parent_user_id,emailid, registrationdate, securityquestion_id,answer,created) ";
              $strSQL .= "VALUES ('".addslashes(trim($this->username))."','";
              $strSQL .= md5(addslashes(trim($this->password)))."','";
              $strSQL .= addslashes(trim($this->userstatus_id))."','";
              $strSQL .= addslashes(trim($this->clubposition_id))."','";
              $strSQL .= addslashes(trim($this->parent_user_id))."','";
              $strSQL .= addslashes(trim($this->emailid))."',";
              $strSQL .= "now(),";
              $strSQL .= addslashes(trim($this->securityquestion_id)).",'";
              $strSQL .= addslashes(trim($this->answer))."',";
              $strSQL .= "now())";
              $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
              if ( mysql_affected_rows($this->connection) > 0 ){
                    $this->id = mysql_insert_id();;
                    return true;
              }
              else{
                $this->error_description = "Insert data Failed";
                return false;
              }

        }
        elseif($this->id > 0 ) {
            $strSQL = "UPDATE users SET ";
            $strSQL .= "userstatus_id = '".addslashes(trim($this->userstatus_id))."',";
            $strSQL .= "clubposition_id = '".addslashes(trim($this->clubposition_id))."',";
            $strSQL .= "parent_user_id = '".addslashes(trim($this->parent_user_id))."',";
            $strSQL .= "emailid = '".addslashes(trim($this->emailid))."',";
            $strSQL .= "securityquestion_id = '".addslashes(trim($this->securityquestion_id))."',";
            $strSQL .= "answer = '".addslashes(trim($this->answer))."',";
            $strSQL .= "updated = now(), ";
			$strSQL .= "record_user_id = '".addslashes(trim($this->record_user_id))."'";
            $strSQL .= " WHERE id = ".$this->id;
            $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }else{
                $this->error_description = "Update data Failed";
                return false;
            }
        }

    }



    function change_password($newpasswd,$oldpasswd){
                    $strSQL = "UPDATE users SET ";
                    $strSQL .= "password = '" .$newpasswd. "' ";
                    $strSQL .= "WHERE id = '" . $this->id . "' AND password = '".$oldpasswd."'";
                    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
                    if ( mysql_affected_rows($this->connection) > 0 ) {
                        return true;
                    }else{
                        return false;
                        $this->error_description = "Incorrect password";
                    }
    }


    function exist(){
        $strSQL = "SELECT 1 FROM users WHERE username = '".$this->username."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            return true;
        }else{
            return false;
        }
    }



    function get_detail(){
        $strSQL = "SELECT * FROM users WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'id');
                $this->username = mysql_result($rsRES,0,'username');
                $this->userstatus_id = mysql_result($rsRES,0,'userstatus_id');
                $this->clubposition_id = mysql_result($rsRES,0,'clubposition_id');
                $this->parent_user_id = mysql_result($rsRES,0,'parent_user_id');
                $this->emailid = mysql_result($rsRES,0,'emailid');
                $this->registrationdate = mysql_result($rsRES,0,'registrationdate');
                $this->lastlogin = mysql_result($rsRES,0,'lastlogin');
                $this->securityquestion_id = mysql_result($rsRES,0,'securityquestion_id');
                $this->answer = mysql_result($rsRES,0,'answer');
                return true;
        }
        else{
            return false;
        }
    }




function get_array(){
        $users = array();
        $strSQL = "SELECT id,username FROM users ORDER BY username";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$username) = mysql_fetch_row($rsRES) ){
          $users[$id]["name"] = $username;
        }
        return $users;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list users";
        return false;
        }
}


function get_list_array(){
        $users = array();$i=0;
        $strSQL = "SELECT id,username FROM users ORDER BY username";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$username) = mysql_fetch_row($rsRES) ){
              $users[$i]["id"] = $id;
              $users[$i]["name"] = $username;
              $i++;
        }
        return $users;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list users";
        return false;
        }
}




    function get_list_array_bylimit($username, $userstatus_id= gINVALID, $clubposition_id= gINVALID, $start_record = 0,$max_records = 25){
        $limited_data = array(); 
		$i=0;
		$str_condition = "";
        $strSQL = "SELECT U.id, U.username, U.userstatus_id, U.clubposition_id, U.parent_user_id, U.emailid, U.registrationdate, US.name as userstatus_name, CP.name as clubposition_name FROM users U, userstatuses US, clubpositions CP WHERE U.userstatus_id = US.id AND U.clubposition_id = CP.id ";

        if ($username != "" ) {
                $str_condition .= " AND U.username  LIKE '%" . $username . "%' " ;
         }
 
        if ($userstatus_id != gINVALID ) {
                $str_condition .= " AND U.userstatus_id  = '" . $userstatus_id . "' " ;
         }
 
        if ($clubposition_id != gINVALID ) {
                $str_condition .= " AND U.clubposition_id  = '" . $clubposition_id . "' " ;
         }
 

		$strSQL .= $str_condition . " ORDER BY username";


		$strSQL_limit = sprintf("%s LIMIT %d, %d", $strSQL, $start_record, $max_records);
		$rsRES = mysql_query($strSQL_limit, $this->connection) or die(mysql_error(). $strSQL_limit);

        if ( mysql_num_rows($rsRES) > 0 ){

            //without limit  , result of that in $all_rs
            if (trim($this->total_records)!="" && $this->total_records > 0) {
            } else {
				
                $all_rs = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL_limit); 
                $this->total_records = mysql_num_rows($all_rs);
            }



		    while ( list ($id,$username,$userstatus_id, $clubposition_id, $parent_user_id, $emailid,$registrationdate, $userstatus_name,$clubposition_name) = mysql_fetch_row($rsRES) ){
		          $limited_data[$i]["id"] = $id;
		          $limited_data[$i]["username"] = $username;
		          $limited_data[$i]["userstatus_id"] = $userstatus_id;
		          $limited_data[$i]["userstatus_name"] = $userstatus_name;
		          $limited_data[$i]["clubposition_id"] = $clubposition_id;
		          $limited_data[$i]["clubposition_name"] = $clubposition_name;

		          $limited_data[$i]["parent_user_id"] = $parent_user_id;
		          $limited_data[$i]["emailid"] = $emailid;
		          $registrationdate = date('m/d/Y', strtotime($registrationdate));
		          $limited_data[$i]["registrationdate"] = $registrationdate;
		          $i++;
		    }
        	return $limited_data;
        }
        else{
        	return false;
        }
    }





function delete(){
    if($this->id > 0 ) {
        $strSQL = " DELETE FROM users WHERE id = '".$this->id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
        }
        else{
            $this->error_number = 6;
            $this->error_description="Can't deltete this User";
            return  false;
        }
    }
}







}
?>
