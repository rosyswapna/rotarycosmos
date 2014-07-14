<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script>
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}
var ww=window.innerWidth;
var wh=window.innerHeight;
setCookie('iwidth',ww,'100');
setCookie('iheight',wh,'100');
</script>
<?php 
$_SESSION['iwidth']=$_COOKIE['iwidth']; 
$_SESSION['iheight']=$_COOKIE['iheight'];
?>
<table width="<?php echo $_SESSION['iwidth'] ?>" height="<?php echo $_SESSION['iheight']; ?>" border="0" bgcolor="#0066CC">
  <tr>
  	<td align="left" valign="top" style="padding:20px;"><img src="logo.png" width="100" /></td>
    <td align="right" valign="bottom"><img src="uc.png" /></td>
  </tr>
</table>
