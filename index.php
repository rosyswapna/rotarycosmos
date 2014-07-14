<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/class/class_page/class_page.php');	// new Page Class

$page = new Page;
	
	$page->current_url = $current_url;	// current url for pages
	$page->title = "Rotary Cochin Cosmos";	// page Title
	$page->page_name = 'index';		// page name for menu and other purpose
	$page->layout = 'home.html';		// layout name

    
    $page->conf_list = array("conf.php","user_session_conf.php");
    $page->menuconf_list = array("menu_conf.php");
	$page->connection_list = array("connection.php");

	$page->function_list = array("functions.php", "functions_forum.php");
	$page->class_list = array("class_user_session.php", "class_news.php","class_meeting.php","class_event.php",  "class_pagination.php", "class_guest.php");

	$page->use_dynamic_content = true;
	$page->dynamic_content_list = array("index.php","pres_msg.php");
	


    $index=0;
    $content_list[$index]['file_name']='inc_menu.php';
    $content_list[$index]['var_name']='menu';
    $index++;

    $content_list[$index]['file_name']='inc_login_code.php';
    $content_list[$index]['var_name']='login_form';
    $index++;

    $content_list[$index]['file_name']='inc_login_form.php';
    $content_list[$index]['var_name']='login_form';
    $index++;
	
	$content_list[$index]['file_name']='inc_left_member_menu.php';
    $content_list[$index]['var_name']='login_form';
    $index++;

    $content_list[$index]['file_name']='inc_orbit.php';
    $content_list[$index]['var_name']='slider';
    $index++;

//	$content_list[$index]['file_name']='inc_index_pres_msg.php';
//	$content_list[$index]['var_name']='index_pres_msg';
//    $index++;
// 
//	$content_list[$index]['file_name']='inc_index_next_meeting.php';
//	$content_list[$index]['var_name']='index_next_meeting';
//    $index++;
// 
//	$content_list[$index]['file_name']='inc_index_latest_news.php';
//	$content_list[$index]['var_name']='index_latest_news';
//    $index++;
// 
//	$content_list[$index]['file_name']='inc_index_upcoming_events.php';
//	$content_list[$index]['var_name']='index_upcoming_events';
//    $index++;


	$content_list[$index]['file_name']='inc_index.php';
	$content_list[$index]['var_name']='content';

	$page->content_list = $content_list;

	$page->display(); //completed page with dynamic cintent will be displayed
?>
