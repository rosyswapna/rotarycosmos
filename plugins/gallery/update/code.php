<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


 $mygallery = new Gallery($myconnection);
 $mygallery->connection = $myconnection;

 $mystatus = new Status($myconnection);
 $mystatus->connection = $myconnection;
 $chk_status = $mystatus->get_list_array();

 $myimage = new Image;


if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_add ) {
	$strERR = "";
	if ( trim($_POST['txtname']) == "" ){
	  $strERR .= "Empty Name";
	}

	if ( $_POST['lststatus'] == -1 ){
	  $strERR .= "Status not selected";
	}



	$mygallery->error_description = $strERR;

	if ( $strERR == "" ){
		$mygallery = new Gallery($myconnection);
		$mygallery->connection = $myconnection;
		$mygallery->name = $_POST['txtname'];
		//check user exist or not
		$chk = $mygallery->exist();
		if ( $chk == true ){
		    $mygallery->error_description = "Gallery already exist";
		}else{
			
		      $mygallery->status_id = $_POST['lststatus'];
			  $mygallery->description = $_POST['txtdescription'];

		      $chk = $mygallery->update();
		      if ( $chk == true ){
				if ( $mygallery->id > 0 ) {


					$_SESSION[SESSION_TITLE.'flash'] = "Data Inserted";
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "galleries.php";
					header( "Location: flash.php");
					exit();
				}else{
					$_SESSION[SESSION_TITLE.'flash'] = "Data Insert Failed";
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
					header( "Location: flash.php");
					exit();
				}
			}
		}
	}
}
 if ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $mygallery = new Gallery($myconnection);
      $mygallery->id = $_GET['id'];
      $mygallery->connection = $myconnection;
      $chk1 = $mygallery->get_detail();
		if ( $chk == false ){
			header("Location: index.php");
			exit();
		}else{
			// Do Nothing
		}
 }
 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_update ) {
 $strERR = "";

	 if ( $_POST['lststatus'] == -1 ){
		  $strERR .= "Status not selected";
	 }




	$mygallery->error_description = $strERR;
	 if ( $strERR == "" ){
		$mygallery = new Gallery($myconnection);
		$mygallery->id = $_POST['h_check_id'];
		$mygallery->connection = $myconnection;
		$chk = $mygallery->get_detail();

		$mygallery->status_id = $_POST['lststatus'];
		$mygallery->description = $_POST['txtdescription'];

		$chk = $mygallery->update();
		if ( $chk == true ){


			$_SESSION[SESSION_TITLE.'flash'] = "Data Updated.";
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "galleries.php";
			header( "Location: flash.php");
			exit();
		}else{
			$_SESSION[SESSION_TITLE.'flash'] = "Data Update Failed";
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
			header( "Location: flash.php");
			exit();
		}
	 }
 }



if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_delete ) {
	$mygallery = new Gallery($myconnection);
	$mygallery->connection = $myconnection;
	$mygallery->id = $_POST['h_check_id'];
	$chk = $mygallery->delete();
	if ( $chk == true ){
		$_SESSION[SESSION_TITLE.'flash'] = "Data Deleted.";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "galleries.php";
		header( "Location: flash.php");
		exit();
	}else{
		$_SESSION[SESSION_TITLE.'flash'] = "Data Delete Failed";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
		header( "Location: flash.php");
		exit();
	}
}



?>
