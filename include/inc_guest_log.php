<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


if (isset($_SESSION[SESSION_TITLE.'member_roll_id']) && $_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_GUEST && isset($_SESSION[SESSION_TITLE.'member_userid']) && $_SESSION[SESSION_TITLE.'member_userid'] > 0 && isset($_REQUEST['log_time']) && $_REQUEST['log_time'] > 0){

	$myguest = new Guest($myconnection);
	$myguest->user_id = $_SESSION[SESSION_TITLE.'member_userid'];
	$myguest->get_detail();
	$myguest->access_log($_REQUEST['log_time']);

	
}


?>
