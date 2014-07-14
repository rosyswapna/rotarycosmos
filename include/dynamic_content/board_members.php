<?php 
$tmp_board_members_title = "Rotary E-Club of D-3201 Board Directors 2012 - 2013 ";

$board_members_title = $this->content->get_content(CONF_TYPE_TEXT,"Board Members Title","board_members.php",$tmp_board_members_title,"Dynamic Board Members Title");



$tmp_board_members_content = "Please Add Content";

$board_members_content = $this->content->get_content(CONF_TYPE_HTML,"Board Members","board_members.php",$tmp_board_members_content,"Dynamic Board Members");

?>
