<?php 
$tmp_page_heading = "Make Up Guidelines";

$page_heading = $this->content->get_content(CONF_TYPE_TEXT,"President's Message Title","make_up.php",$tmp_page_heading,"Dynamic President's Message Title");



$tmp_page_content = "Please Page Content..";

$page_content = $this->content->get_content(CONF_TYPE_HTML,"President's Message","make_up.php",$tmp_page_content,"Dynamic President's Message");


?>
