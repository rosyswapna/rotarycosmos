<?php 

$tmp_marquee = "We meet online every Friday at 11:30 AM";

$marquee = $this->content->get_content(CONF_TYPE_HTML,"Marquee Content","index.php",$tmp_marquee,"Marquee Content");

$tmp_index_content = "Club Profile  ....";

$index_content = $this->content->get_content(CONF_TYPE_HTML,"Index Content","index.php",$tmp_index_content,"Index Content");



?>
