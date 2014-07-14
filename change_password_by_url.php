<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/class/class_page/class_page.php');	// new Page Class

$page = new Page;
	
	$page->current_url = $current_url;	// current url for pages
	$page->title = "Rotary";	// page Title
	$page->page_name = 'change_password';		// page name for menu and other purpose
	$page->layout = 'default.html';		// layout name

    
    $page->conf_list = array("conf.php");
    $page->menuconf_list = array("menu_conf.php");
	$page->connection_list = array("connection.php");

	$page->function_list = array("functions.php");
	$page->class_list = array("class_user.php");

	$page->css_list = array("form_table.css");

	

    $index=0;
    $content_list[$index]['file_name']='inc_menu.php';
    $content_list[$index]['var_name']='menu';
    $index++;

    $content_list[$index]['file_name']='inc_left_member_menu.php';
    $content_list[$index]['var_name']='left_menu';

	$page->content_list = $content_list;


    $page->plugin_path = 'plugins/user/'; 
    $page->plugin = 'change_password';

	$page->display(); //completed page with dynamic cintent will be displayed
?>
