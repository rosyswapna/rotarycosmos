<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

$login_error = "";
$msg_email_activation_success = "Your account has been activated. Please login using your Email and Password ";
$msg_email_activation_failed = "Your account has not been activated. Please contact Administrator ";


if ( isset ( $_GET[md5("AL")] ) && trim ( $_GET[md5("AL")] ) != ""  ){
    $strSQL = "SELECT * FROM users WHERE userstatus_id =".USERSTATUS_WAITING_EMAIL_ACTIVATION." and md5(id) = '" .$_GET[md5("AL")] ."'" ;
    $result = mysql_query($strSQL, $myconnection);
    $row_a_user = mysql_fetch_assoc($result);
    // if user exist
    if (mysql_num_rows($result) == 1){
        // activate user userstatusid active= 1, disabled=3
        $strSQL = "UPDATE users SET userstatus_id='".USERSTATUS_ACTIVE."' WHERE md5(id) = '" .$_GET[md5("AL")] ."'" ;
        mysql_query($strSQL, $myconnection);
        $login_error=$msg_email_activation_success;
    }
    else{
        /* Either unable to find the user entry User
        or multiple entries
        both are errorneous situations*/
            $login_error=$msg_email_activation_failed;
    }
}

if (isset($_POST['submit']) && $_POST['submit'] == $submit_sign_in){
	if ( $_POST['loginname'] == "" ){
		$login_error .= "Empty Login name";
	}
	if ( $_POST['passwd'] == "" ){
		$login_error .= "<br/> Empty Password";
	}
	if ( $login_error == "" ){
		  $username = trim($_POST['loginname']);
		  $password = md5(trim($_POST['passwd']));
		  $myuser = new UserSession($username,$password,$myconnection);
		  $chk = $myuser->login();
		  if ( $chk == true ){
		      $chk = $myuser->register_login();
				if($_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_GUEST){

					$myguest = new Guest($myconnection);
					$myguest->user_id = $_SESSION[SESSION_TITLE.'member_userid'];
					$myguest->get_detail();
					$access_time = $myguest->get_access_time();
					if($myguest->access_forum == false ){
						if($access_time >= 30){
							insert_forum_user($myconnection,$_POST['loginname'],$_POST['passwd']);
							$myguest->update_access_forum();
							// Forum session
							$_SESSION[mlf2_user_id] = $_SESSION[SESSION_TITLE.'member_userid'];
							$_SESSION[mlf2_user_name] =$_SESSION[SESSION_TITLE.'member_username'];
							$_SESSION[mlf2_user_type] = 0;
						}
					}elseif($myguest->access_forum == true){
							// Forum session
							$_SESSION[mlf2_user_id] = $_SESSION[SESSION_TITLE.'member_userid'];
							$_SESSION[mlf2_user_name] =$_SESSION[SESSION_TITLE.'member_username'];
							$_SESSION[mlf2_user_type] = 0;

					}

					header ("Location: index.php");
				}else{			
					header ("Location: profile.php");
				}
		      exit();
		  }else{
		$login_error .= "Invalid Login name/Password.";
		}
	
	}

}
?>
