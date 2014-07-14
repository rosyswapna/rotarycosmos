<?php


  function send_email_to_user($username, $password,$email,$id) {
// function used to mail to user and admin (user info and password)
    $strFrom=EMAIL_NO_REPLY;
    $strTo = $email;

    $strSubject="Activate your ".ORG_NAME." Guest account";
//     To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
//     Additional headers
    $headers .= "From: ".ORG_NAME." Registration <".$strFrom.">"."\r\n";
    $headers .= 'Reply-To: <'.$strFrom.'>'."\r\n";

    $strMailbody = "Hi " . $username . ",<br /><br />";
    $strMailbody .="Thanks for registering with us at ".WEB_NAME.". We look forward to seeing you around the site.<br />";
    $strMailbody .="To complete your registration, you need to confirm that you received this email. To do simply click the link below:<br />";
    $strMailbody .="<a  target=\"_blank\"  href=\"".WEB_URL."/index.php?".md5("AL")."=".md5($id)."\">click here to activate your ".ORG_NAME." Guest account</a>";
    $strMailbody .="<br />Here is your password for ".WEB_URL." Site .<br /><br />";
   
    
    $strMailbody .="Your Username :". $username ."<br />";
    $strMailbody .="Your Password :". $password . "<br /><br /><br /><br /><br />
    Thanks,<br />
    ".WEB_NAME."<br /><br />";
    $strMailbody .="If clicking the link does not work, just copy and paste the entire link into your browser. If you are still having problems, simply forward this email to ".EMAIL_SUPPORT." and we will do our best to help you. <br/> <br/>
    Welcome to ".WEB_NAME."!";
    
    //Send the mail to the Guest User with activation link
    mail($strTo,$strSubject,$strMailbody,$headers);
      //echo $strMailbody;
     //exit();
}


  function send_email_to_club($president_emailid,$secretary_emailid, $username,$first_name, $last_name,$district_number, $club_name) {
// function used to mail to user and admin (user info and password)
    $strFrom=EMAIL_NO_REPLY;
    //$strTo = $email;

    $strSubject= $username." open Guest account account at ".ORG_NAME." ";
//     To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
//     Additional headers
    $headers .= "From: ".ORG_NAME." Registration <".$strFrom.">"."\r\n";
    $headers .= 'Reply-To: <'.$strFrom.'>'."\r\n";

    $strMailbody = "Hi,<br /><br />";
    $strMailbody .=$username ."(".$first_name. " " . $last_name.") registerd with us at ".WEB_NAME.".";
    $strMailbody .="<br />Here is ".$username." Information .<br /><br />";
   
    
    $strMailbody .="Email :". $username ."<br />";
    $strMailbody .="Name :". $first_name .' '. $last_name ."<br />";
    $strMailbody .="Club Name :". $club_name ."<br />";
    $strMailbody .="District Number :". $district_number . "<br /><br /><br /><br /><br />
    Thanks,<br />
    ".WEB_NAME."<br /><br />";

    
    //Send the mail 
    mail($president_emailid,$strSubject,$strMailbody,$headers);
    mail($secretary_emailid,$strSubject,$strMailbody,$headers);
      //echo $strMailbody;
     //exit();
}








?>
