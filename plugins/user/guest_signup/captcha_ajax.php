<?php session_start();
echo '<img  alt="." src="captcha.php?width=120&height=40&characters=5&'.date("h:i:s").'" />';
?>
