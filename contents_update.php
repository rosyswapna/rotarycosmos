<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/class/class_page/class_page.php');	// new Page Class

$page = new Page;
	
	$page->current_url = $current_url;	// current url for pages
	$page->title = "Rotary";	// page Title
	$page->page_name = 'contents_update';		// page name for menu and other purpose
	$page->layout = 'default.html';
    $page->use_dynamic_content = true;                 // enable dynamic content

    $page->conf_list = array("conf.php");
    $page->menuconf_list = array("menu_conf.php");
	$page->connection_list = array("connection.php");

	$page->function_list = array("functions.php");
	$page->class_list = array("class_pagination.php");

	$page->css_list = array("form_table.css");
	$page->access_list = array("ROLL_ADMIN","ADMINISTRATOR");


    $index=0;
    $content_list[$index]['file_name']='inc_menu.php';
    $content_list[$index]['var_name']='menu';
    $index++;

    $content_list[$index]['file_name']='inc_left_menu.php';
    $content_list[$index]['var_name']='left_menu';

	$page->content_list = $content_list;

	$page->plugin_path = 'plugins/content/'; 
	$page->plugin = 'update';
	$page->display(); //completed pluggin with dynamic content will be displayed
?>
