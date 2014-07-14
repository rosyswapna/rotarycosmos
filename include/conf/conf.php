<?php
//User Types
define("ROLL_ADMIN", 1);
define("ROLL_MEMBER", 2);

define("ADMINISTRATOR", 999);

//User Status
define("USERSTATUS_ACTIVE", 1);
define("USERSTATUS_INACTIVE", 2);


// Status
define("STATUS_ACTIVE", 1);
define("STATUS_INACTIVE", 2);


GLOBAL $g_msg_unauthorized_request;
$g_msg_unauthorized_request = "<strong>Unauthorized Page Request</strong><br/> <br/> You are not authorized to access this page. This attempt will be reported to the system Administrator. ";

GLOBAL $g_msg_unauthorized_request_redirect_page;
$g_msg_unauthorized_request_redirect_page = "index.php";

GLOBAL $g_obj_select_default_text;
$g_obj_select_default_text = "Choose from list..";


//Email 
define("EMAIL_NO_REPLY", "noreply@rotarycochincosmos.org");
define("EMAIL_INFO", "info@rotarycochincosmos.org");
define("EMAIL_SUPPORT", "support@rotarycochincosmos.org");


define("WEB_URL", "http://www.rotarycochincosmos.org");
define("SUBSITE_WEB_URL", "http://www.rotarycochincosmos.org/subsite");
define("WEB_NAME", "rotarycochincosmos.org");
define("ORG_NAME", "rotarycochincosmos");
?>
