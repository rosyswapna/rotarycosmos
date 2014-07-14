<?php 

/**
 * generates a random string
 *
 * @param int $length
 * @param string $characters
 * @return string
 */
function random_string($length=8,$characters='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
 {
  $random_string = '';
  $characters_length = strlen($characters);
  for($i=0;$i<$length;$i++)
   {
    $random_string .= $characters[mt_rand(0, $characters_length - 1)];
   }
  return $random_string;
 }

/**



/**
 * generates password hash
 *
 * @param string $pw
 * @return string
 */
function generate_pw_hash($pw)
 {
  $salt = random_string(10,'0123456789abcdef');
  $salted_hash = sha1($pw.$salt);
  $hash_with_salt = $salted_hash.$salt;
  return $hash_with_salt;
 }




function insert_forum_user($connection,$email,$password){
$password = generate_pw_hash($password);
    $strSQL = "INSERT INTO `mlf2_userdata` ( `user_type`, `user_name`, `user_real_name`, `gender`, `birthday`, `user_pw`, `user_email`, `email_contact`, `user_hp`, `user_location`, `signature`, `profile`, `logins`, `user_ip`, `registered`, `category_selection`, `thread_order`, `user_view`, `sidebar`, `fold_threads`, `thread_display`, `new_posting_notification`, `new_user_notification`, `user_lock`, `auto_login_code`, `pwf_code`, `activate_code`, `language`, `time_zone`, `time_difference`, `theme`, `entries_read`) VALUES
( 0, '".mysql_real_escape_string($email)."', '', 0, '0000-00-00', '".mysql_real_escape_string($password)."', '".mysql_real_escape_string($email)."', 1, '', '', '', '', 8, '".$_SERVER['REMOTE_ADDR']."', now(), NULL, 0, 0, 1, 0, 0, 0, 0, 0, '', '', '', '', '', 0, '', '1')";

    $rsRES = mysql_query($strSQL,$connection) or die ( mysql_error() . $strSQL );
    if ( mysql_affected_rows($connection) > 0 ) {
        $id = mysql_insert_id();
        return $id;
    }
    else{
        
        return false;
    }
    
}









?>
