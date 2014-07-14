<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


if (isset($_POST['submit'])){
 
  $myuser = new User();   
  $myuser->connection = $myconnection;

  $myuser->username = $_POST['username'];
  $chk = $myuser->check_email();

  if ($chk == false){

      $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_incorrect_username;
      header( "Location: index.php");
      exit(); 

  }else{

      $myuser->password=$chk;
      $chk_email=$myuser->forgot_password_email();

      if($chk_email==true){
        $_SESSION[SESSION_TITLE.'flash'] ="An email with password reset link has been sent to ".$myuser->username.". Please check your email.";
        header( "Location: index.php");
        exit();
      }else{
        $_SESSION[SESSION_TITLE.'flash'] =$RD_MSG_email_send_failed;
        header( "Location: index.php");
        exit();
      } 
  }
  
}

?>
