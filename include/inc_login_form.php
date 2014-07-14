<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

if(!isset($_SESSION[SESSION_TITLE.'member_userid'])){
?>
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>

	<div class="login">
		<form target="_self" method="post" action="<?php echo $current_url?>" name="frmlogin">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#e9e9e9">
		  <tr>
		    <td height="35" colspan="2" align="left" bgcolor="#FFCC00">&nbsp;&nbsp;<strong>Login</strong></td>
		  </tr>
		  <tr>
		    <td width="37%" height="35" align="center" bgcolor="#f2f2f2"><span class="style1">Username:</span></td>
		    <td width="63%" height="35" align="center" bgcolor="#f2f2f2">
			<input onclick="clean_loginname();" class="login_box"  type="text" name="loginname" id="loginname" style="font-size:11px;"  title="<?php echo $msg_default_username ?>"  value="<?php echo $msg_default_username ?>" >		    </td>
		  </tr>
		  <tr>
		    <td height="35" align="center" bgcolor="#f2f2f2"><span class="style1">Password:</span></td>
	      <td height="35" align="center" bgcolor="#f2f2f2">
	    	<input class="login_box"  type="password" name="passwd" id="passwd" >		    </td>
		  </tr>
		  <tr>

		    <td height="35"  align="left" bgcolor="#f2f2f2" colspan="2">

		    	<a href="forgot_password.php" style="font-size:10px;margin:0px 10px 0px 5px;text-decoration:none;">Forgot Password?</a>
		    	
				<input  value="<?php echo $submit_sign_in ?>" type="submit" name="submit" >
          		<input name="h_id" value="<?php if(isset($h_id))echo $h_id; ?>" type="hidden">
          		<input name="h_login" value="pass" type="hidden">	
          	</td>	 
          </tr>
		</table>
	  </form>
<div class="login_error">
<?php if(isset($myuser->err_desc)) echo $myuser->err_desc; 
                                if(isset($login_error)) echo $login_error ;?>
</div>
	</div>


    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("loginname").focus();
            document.getElementById("loginname").select();
   //-->
    </script>  

<?php } 

if(isset($_SESSION[SESSION_TITLE.'member_roll_id']) && $_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_GUEST){
	echo "Loggedin as ".$_SESSION[SESSION_TITLE.'member_username'].".<br/>Thanks for loggedin at ".WEB_NAME.". <br/>We look forward to seeing you around the site.";
	
}elseif(isset($_SESSION[SESSION_TITLE.'member_roll_id']) && ($_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_MEMBER || $_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_ADMIN)){
?>
	<span style="color:#990000; font-weight:bold; padding-left:10px;">Welcome <?php echo $_SESSION[SESSION_TITLE.'member_username']; ?></span>

<?php }
?>

<br /> 
