<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


 $myuser = new User($myconnection);
 $myuser->connection = $myconnection;


 $mymember = new Member($myconnection);
 $mymember->connection = $myconnection;


 //$chk_user = $myuser->get_list_array();

 $myquestion = new SecurityQuestion();
 $myquestion->connection = $myconnection;
 $chk_que = $myquestion->get_list_array();


 $myuserstatus = new UserStatus($myconnection);
 $myuserstatus->connection = $myconnection;
 $chk_userstatus = $myuserstatus->get_list_array();


 $myclubposition = new ClubPosition($myconnection);
 $myclubposition->connection = $myconnection;
 $chk_clubposition = $myclubposition->get_list_array();



 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_add ) {
 $strERR = "";
 if ( trim($_POST['txtusername']) == "" ){
      $strERR .= $MSG_empty_username;
 }

 if ( trim($_POST['txtemail']) == "" ){
      $strERR .= $MSG_empty_email;
 }

 if ( trim($_POST['txtpassword']) == "" && trim($_POST['txtrepassword']) == "" ){
	      $strERR .= $MSG_empty_password;
  
 }
 
 if ( $_POST['lstuserstatus'] == -1 ){
      $strERR .= $MSG_empty_userstatus;
 }
 
 if ( $_POST['lstclubposition'] == -1 ){
      $strERR .= $MSG_empty_clubposition;
 }

 if ( $_POST['lstquestion'] == -1 ){
    $strERR .= $MSG_empty_question;
 }
 elseif($_POST['lstquestion'] == ""){
	$strERR .= $MSG_empty_answer;
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
          $myuser->password = $_POST['txtpassword'];
          $myuser->userstatus_id = $_POST['lstuserstatus'];
          $myuser->clubposition_id = $_POST['lstclubposition'];
          $myuser->emailid = $_POST['txtemail'];
          $myuser->securityquestion_id = $_POST['lstquestion'];
          $myuser->answer = $_POST['txtanswer'];
          $chk = $myuser->update();
          if ( $chk == true ){
			if ( $myuser->id > 0 ) {
				$mymember->id =gINVALID;
				$mymember->user_id = $myuser->id;
				$mymember->update();

				// insert to forum user
				insert_forum_user($myconnection,$_POST['txtusername'],$_POST['txtpassword']);
				send_email_to_user($myuser->username, $_POST['txtpassword'],$myuser->username,$myuser->id);
				$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_added;
				$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "members.php";
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
 if ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $myuser = new User();
      $myuser->id = $_GET['id'];
      $myuser->connection = $myconnection;
      $chk1 = $myuser->get_detail();
      if ( $chk == false ){
		  header("Location: index.php");
		  exit();
      }
 }
 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_update ) {
 $strERR = "";

	 if ( $_POST['lstuserstatus'] == -1 ){
		  $strERR .= $MSG_empty_userstatus;
	 }

	 if ( $_POST['lstclubposition'] == -1 ){
		  $strERR .= $MSG_empty_clubposition;
	 }

	 if ( $_POST['lstquestion'] == -1 ){
		$strERR .= $MSG_empty_question;
	}
	elseif($_POST['lstquestion'] == ""){
		$strERR .= $MSG_empty_answer;
	}
	$myuser->error_description = $strERR;
	 if ( $strERR == "" ){
		$myuser = new User();
		$myuser->id = $_POST['h_check_id'];
		$myuser->connection = $myconnection;
		$chk = $myuser->get_detail();
		$myuser->userstatus_id = $_POST['lstuserstatus'];
        $myuser->clubposition_id = $_POST['lstclubposition'];
		$myuser->emailid = $_POST['txtemail'];
		$myuser->securityquestion_id = $_POST['lstquestion'];
		$myuser->answer = $_POST['txtanswer'];
		$chk = $myuser->update();

		if ( $chk == true ){
			$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_updated;
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "members.php";
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
if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_delete ) {
	$myuser = new User();
	$myuser->connection = $myconnection;
	$myuser->id = $_POST['h_check_id'];
	$chk = $myuser->delete();
	if ( $chk == true ){
		$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_deleted;
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "members.php";
		header( "Location: flash.php");
		exit();
	}else{
		$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
		header( "Location: flash.php");
		exit();
	}
}
?>
