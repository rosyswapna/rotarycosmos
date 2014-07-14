<?php
$i=0;

GLOBAL $menu_list;
GLOBAL $g_msg_unauthorized_request;

$menu_list[$i]["caption"] = "Home";
$menu_list[$i]["url"]="index.php";
$menu_list[$i]["usertype"] = 0;
$menu_list[$i]["submenu"] = "";
$i++;
$menu_list[$i]["caption"] = "Administration";
$menu_list[$i]["url"]="#";
$menu_list[$i]["usertype"] = 0;
// $menu_list[$i]["usertype"] = USERTYPE_ADMIN;
$menu_list[$i]["submenu"] = "admin_menu";
$i++;

$menu_list[$i]["caption"] = "Downloads";
$menu_list[$i]["url"]="#";
$menu_list[$i]["usertype"] = 0;
$menu_list[$i]["submenu"] = "download_menu";
$i++;



GLOBAL $admin_menu;

$admin_menu[$i]["caption"] = "Settings";
$admin_menu[$i]["url"]="settings.php";
$admin_menu[$i]["usertype"] = 0;
// $admin_menu[$i]["usertype"] = USERTYPE_ADMIN;
$admin_menu[$i]["submenu"] = "";
$i++;







GLOBAL $download_menu;
$download_menu[$i]["caption"] = "Download Source";
$download_menu[$i]["url"]="download.php?download=source.zip"; 
$download_menu[$i]["usertype"] = 0;
$download_menu[$i]["submenu"] = "";
$i++;
$download_menu[$i]["caption"] = "Download DB";
$download_menu[$i]["url"]="download.php?download=db.sql";
$download_menu[$i]["usertype"] = 0;
$download_menu[$i]["submenu"] = "";
$i++;





?>

