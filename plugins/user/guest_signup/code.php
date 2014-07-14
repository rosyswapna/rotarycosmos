<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

 $myuser = new User($myconnection);
 $myuser->connection = $myconnection;


 $myguest = new Guest($myconnection);
 $myguest->connection = $myconnection;


 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_add ) {
 $strERR = "";

 if ( trim($_POST['txtusername']) == "" ){
      $strERR .= "<br/>".$MSG_empty_username;
 }elseif (!filter_var($_POST['txtusername'], FILTER_VALIDATE_EMAIL)){
		$strERR .= "<br/>".$MSG_invalid_email;
 }


 if ( trim($_POST['txtfirst_name']) == "" ){
      $strERR .= $MSG_empty_first_name."<br/>";
 }

 if ( trim($_POST['txtlast_name']) == "" ){
      $strERR .= "<br/>".$MSG_empty_last_name;
 }

 if ( trim($_POST['txtdistrict_number']) == "" ){
      $strERR .= "<br/>".$MSG_empty_district_number;
 }

 if ( trim($_POST['txtclub_name']) == "" ){
      $strERR .= $MSG_empty_club_name."<br/>";
 }

 if ( trim($_POST['txtpresident_emailid']) == "" ){
      $strERR .= "<br/>".$MSG_empty_president_emailid;
 }elseif (!filter_var($_POST['txtpresident_emailid'], FILTER_VALIDATE_EMAIL)){
		$strERR .= "<br/>".$MSG_invalid_email;
 }

 if ( trim($_POST['txtsecretary_emailid']) == "" ){
      $strERR .= $MSG_empty_secretary_emailid."<br/>";
 }elseif (!filter_var($_POST['txtsecretary_emailid'], FILTER_VALIDATE_EMAIL)){
		$strERR .= $MSG_invalid_email."<br/>";
 }





if (trim($_POST["txtsecurity_code"]) == "") {
    $strERR .= "<br/>".$MSG_empty_security_code;
}
elseif ( trim($_POST["txtsecurity_code"]) != $_SESSION[SESSION_TITLE.'security_code'] ) {
    $strERR .= "<br/>".$MSG_invalid_security_code;
}


$myuser->error_description = $strERR;

if ( $strERR == "" ){
    $myuser = new User();
    $myuser->connection = $myconnection;
    $myuser->username = $_POST['txtusername'];
    //check user exist or not
    $chk = $myuser->exist();
    if ( $chk == true ){
        $myuser->error_description = "User already exist";
    }else{
	      $password = substr(MD5(time()),0,6);
          $myuser->password = $password;
          $myuser->userstatus_id =  USERSTATUS_WAITING_EMAIL_ACTIVATION;
          $myuser->clubposition_id = gINVALID;
          $myuser->emailid = $_POST['txtusername'];

          $chk = $myuser->update();
          if ( $chk == true ){
			if ( $myuser->id > 0 ) {
				$myguest->id =gINVALID;
				$myguest->user_id = $myuser->id;
				$myguest->first_name = $_POST['txtfirst_name'];
				$myguest->last_name = $_POST['txtlast_name'];
				$myguest->emailid = $myuser->emailid;
				$myguest->district_number = $_POST['txtdistrict_number'];
				$myguest->club_name = $_POST['txtclub_name'];
				$myguest->president_emailid = $_POST['txtpresident_emailid'];
				$myguest->secretary_emailid = $_POST['txtsecretary_emailid'];
				$myguest->update();

				// insert to forum user
				//insert_forum_user($myconnection,$_POST['txtusername'],$_POST['txtpassword']);
			
				send_email_to_user($myuser->username, $password,$myuser->username,$myuser->id);
				send_email_to_club($myguest->president_emailid,$myguest->secretary_emailid, $myuser->username,$myguest->first_name, $myguest->last_name,$myguest->district_number, $myguest->club_name);

				$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_signup;
				$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
				header( "Location: flash.php");
				exit();
			}else{
				$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
				$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
				header( "Location: flash.php");
				exit();
			}
    	}
	}
}
}

?>
