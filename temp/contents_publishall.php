<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/class/class_page/class_page.php');   // new Page Class

$page = new Page;
    
    $page->current_url = $current_url;  // current url for pages
    $page->title = "PHP MVC";   // page Title
    $page->page_name = 'contents_publishall';     // page name for menu and other purpose
    $page->layout = 'default.html';     // layout name
    $page->use_dynamic_content = true;                 // enable dynamic content
    
    $page->conf_list = array("conf.php");
    $page->menuconf_list = array("admin_menu_conf.php");
    $page->connection_list = array("connection.php");

    $page->function_list = array("functions.php");
    $page->class_list = array("class_language.php");

    $index=0;
    $content_list[$index]['file_name']='inc_language.php';
    $content_list[$index]['var_name']='language';
    $index++;
    $content_list[$index]['file_name']='inc_admin_menu.php';
    $content_list[$index]['var_name']='menu';

    $page->content_list = $content_list;


    $page->plugin_path = 'plugins/content/'; 
    $page->plugin = 'contents_publishall';
    $page->get_plugin(); //completed pluggin with dynamic content will be displayed
?>
