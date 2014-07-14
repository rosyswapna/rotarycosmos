<?php 
$tmp_project_title = "Projects";

$project_title = $this->content->get_content(CONF_TYPE_TEXT,"Project Title","projects.php",$tmp_project_title,"Projects");



$tmp_project_content = "Please Add Content";

$project_content = $this->content->get_content(CONF_TYPE_HTML,"Project Content","projects.php",$tmp_project_content,"Project Content");



?>
