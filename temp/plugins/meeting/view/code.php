<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


 $mymeeting = new Meeting($myconnection);
 $mymeeting->connection = $myconnection;


 $mystatus = new Status($myconnection);
 $mystatus->connection = $myconnection;
 $chk_status = $mystatus->get_list_array();

 $myimage = new Image;



 if ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $mymeeting = new Meeting($myconnection);
      $mymeeting->id = $_GET['id'];
      $mymeeting->connection = $myconnection;
      $chk = $mymeeting->get_detail();
		if ( $chk == false ){
			header("Location: index.php");
			exit();
		}else{
			if ( $mymeeting->image != "" ) {
				$ext = explode('.', $mymeeting->image);
				$ext = $ext[count($ext)-1];
				$image = ROOT_PATH.MEETING_DIR . $mymeeting->id . '.' . $ext;
			}else{
				$image = ROOT_PATH.MEETING_DIR . 'default.png';
			}
		}
 }


?>
