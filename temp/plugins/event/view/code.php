<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


 $myevent = new Event($myconnection);
 $myevent->connection = $myconnection;


 $mystatus = new Status($myconnection);
 $mystatus->connection = $myconnection;
 $chk_status = $mystatus->get_list_array();

 $myimage = new Image;


 if ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $myevent = new Event($myconnection);
      $myevent->id = $_GET['id'];
      $myevent->connection = $myconnection;
      $chk = $myevent->get_detail();
		if ( $chk == false ){
			header("Location: index.php");
			exit();
		}else{
			if ( $myevent->image != "" ) {
				$ext = explode('.', $myevent->image);
				$ext = $ext[count($ext)-1];
				$image = ROOT_PATH.EVENT_DIR . $myevent->id . '.' . $ext;
			}else{
				$image = ROOT_PATH.EVENT_DIR . 'default.png';
			}
		}
 }




?>
