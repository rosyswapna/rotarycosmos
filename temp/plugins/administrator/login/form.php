<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
?>
<div class="div_center_login">
	<div class="login">
		<form target="_self" method="post" action="<?php echo $current_url?>" name="frmlogin">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#e9e9e9">
		  <tr>
		    <td height="35" colspan="2" align="left" bgcolor="#FFCC00">&nbsp;&nbsp;<strong>Login</strong></td>
		  </tr>
		  <tr>
		    <td width="37%" height="35" align="center" bgcolor="#7FC1FB">Username:</td>
		    <td width="63%" height="35" align="center" bgcolor="#7FC1FB">
			<input onclick="clean_loginname();" class="login_box"  type="text" name="loginname" id="loginname"  title="<?php echo $msg_default_username ?>"  value="<?php echo $msg_default_username ?>" >
		    </td>
		  </tr>
		  <tr>
		    <td height="35" align="center" bgcolor="#7FC1FB">Password:</td>
		    <td height="35" align="center" bgcolor="#7FC1FB">
		    	<input class="login_box"  type="password" name="passwd" id="passwd" >
		    </td>
		  </tr>
		  <tr>
		    <td height="35" colspan="2" align="center" bgcolor="#7FC1FB">
		    	<input  value="<?php echo $submit_sign_in ?>" type="submit" name="submit" >
		                        <input name="h_id" value="<?php if(isset($h_id))echo $h_id; ?>" type="hidden"><input name="h_login" value="pass" type="hidden">
		  </tr>
		</table>
		</form>

<?php if(isset($myuser->err_desc)) echo $myuser->err_desc; 
                                if(isset($login_error)) echo $login_error ;?>

	</div>




    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("loginname").focus();
            document.getElementById("loginname").select();
   //-->
    </script>   


</div>
