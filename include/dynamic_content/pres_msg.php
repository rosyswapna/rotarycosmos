<?php 
$tmp_pres_msg_title = "President's Message for 2013";

$pres_msg_title = $this->content->get_content(CONF_TYPE_TEXT,"President's Message Title","pres_msg.php",$tmp_pres_msg_title,"Dynamic President's Message Title");



$tmp_pres_msg = "Please Add Message";

$pres_msg = $this->content->get_content(CONF_TYPE_HTML,"President's Message","pres_msg.php",$tmp_pres_msg,"Dynamic President's Message");



$tmp_pres_msg_home = "Please Add Message for home page";

$pres_msg_home = $this->content->get_content(CONF_TYPE_HTML,"President's Message for Home Page","pres_msg.php",$tmp_pres_msg_home,"Dynamic President's Message for Home Page");


?>
