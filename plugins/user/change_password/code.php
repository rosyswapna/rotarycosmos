<?php

if(isset($_GET['password_token'])){
  $url_token = $_GET['password_token'];
}else{
  $url_token = false;
}




if (isset($_POST['submit']) && $_POST['submit'] == $CAP_change){
  $passwd_error = "";

  if(isset($_POST['hd_token'])){
    $password_token = $_POST['hd_token'];
  }else{
    $password_token = false;
    if ( $_POST['passwd'] == "" ){
        $passwd_error .= "<br/>".$MSG_empty_password;
    }
  }
  if ( $_POST['new_passwd'] == "" ){
      $passwd_error .= "<br/>".$MSG_empty_new_password;
  }
  if ( $_POST['retype_passwd'] == "" ){
      $passwd_error .= "<br/>".$MSG_empty_retype_password;
  }
  if ( $_POST['new_passwd'] != $_POST['retype_passwd'] ){
      $passwd_error .= "<br/>".$MSG_unmatching_passwords;
  }

  
  if ( $passwd_error == "" ){

    $myuser = new User();
    $myuser->connection = $myconnection;

    if($password_token){

      $chk = $myuser->reset_password(md5(trim($_POST['new_passwd'])),$password_token);
      if ($chk){
        $_SESSION[SESSION_TITLE.'flash'] = "Password Changed Successfully";
        $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
        header( "Location: flash.php");
        exit();
      }

    }else{

        $pass = md5(trim($_POST['passwd']));
     
        $new_pass = md5(trim($_POST['new_passwd']));
        
        $myuser->id = $_SESSION[SESSION_TITLE.'member_userid'];

        $chk = $myuser->change_password($new_pass,$pass);

        if ($chk == false){
          $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_incorrect_password;
          $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "profile.php";
          header( "Location: flash.php");
          exit();
          //echo $msg_unmatching_que_ans;exit();
        }
        else{
          $_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_changed_password;
          $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "profile.php";
          header( "Location: flash.php");
          exit();
        }
    }

  }

}
?>
