<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


 $mynews = new News($myconnection);
 $mynews->connection = $myconnection;


 $mystatus = new Status($myconnection);
 $mystatus->connection = $myconnection;
 $chk_status = $mystatus->get_list_array();

 $myimage = new Image;


 if ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $mynews = new News($myconnection);
      $mynews->id = $_GET['id'];
      $mynews->connection = $myconnection;
      $chk = $mynews->get_detail();
		if ( $chk == false ){
			header("Location: index.php");
			exit();
		}else{
			if ( $mynews->image != "" ) {
				$ext = explode('.', $mynews->image);
				$ext = $ext[count($ext)-1];
				$image = ROOT_PATH.NEWS_DIR . $mynews->id . '.' . $ext;
			}else{
				$image = ROOT_PATH.NEWS_DIR . 'default.png';
			}
		}
 }




?>
