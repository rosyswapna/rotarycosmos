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


if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_add ) {
	$strERR = "";
	if ( trim($_POST['txtname']) == "" ){
	  $strERR .= "Empty Name";
	}

	if ( $_POST['lststatus'] == -1 ){
	  $strERR .= "Status not selected";
	}

	if ( trim ( $_FILES['fleimage']['name'] ) != ""  && $strERR == "" ) {

		$imgfilename = basename($_FILES["fleimage"]["name"]);
		$imgfilesize = $_FILES["fleimage"]["size"];
		//move the uploaded file to the CAR image directory and create the thumbnail
		$arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576,  ROOT_PATH.NEWS_DIR);

		if ($arrupload["err_code"] == -1) {
		$strERR .= $MSG_VAL_image_err1;
		}
		elseif ($arrupload["err_code"] == -2) {
		$strERR .= $MSG_VAL_image_err2;
		}
		elseif ($arrupload["err_code"] == -3) {
		$strERR .= $MSG_VAL_image_err3;
		}
		elseif ($arrupload["err_code"] == -4) {
		$strERR .= $MSG_VAL_image_err4;
		}
		elseif ($arrupload["err_code"] == -5) {
		$strERR .= $MSG_VAL_image_err5;
		}
		elseif ($arrupload["err_code"] == -6) {
		$strERR .= $MSG_VAL_image_err6;
		}

		//the first image uploaded is set as the default
		$int_default = 0;
	}

	$mynews->error_description = $strERR;

	if ( $strERR == "" ){
		$mynews = new News($myconnection);
		$mynews->connection = $myconnection;
		$mynews->name = $_POST['txtname'];
		//check user exist or not
		$chk = $mynews->exist();
		if ( $chk == true ){
		    $mynews->error_description = "News already exist";
		}else{
		      $mynews->status_id = $_POST['lststatus'];
			  $mynews->date = $_POST['txtdate'];
			  $mynews->title = $_POST['txttitle'];
			  $mynews->description = $_POST['txtdescription'];
			  $mynews->image = $_FILES['fleimage']['name'];
		      $chk = $mynews->update();
		      if ( $chk == true ){
				if ( $mynews->id > 0 ) {

					if ( trim ( $_FILES['fleimage']['name'] ) != "" && $mynews->id > 0 ) {
						//rename the uploaded Image file and the thumbnail
						if ( $myimage->rename_image ($mynews->id, $arrupload["imagefile"], ROOT_PATH.NEWS_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
						$strERR = "Image Updated";
						}
						else {
						//Error while renaming the uploaded files
						$strERR = "Image upload Failed";
						}
					}

					$_SESSION[SESSION_TITLE.'flash'] = "Data Inserted";
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "newslist.php";
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
 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_update ) {
 $strERR = "";

	 if ( $_POST['lststatus'] == -1 ){
		  $strERR .= "Status not selected";
	 }

	if ( trim ( $_FILES['fleimage']['name'] ) != ""  && $strERR == "" ) {

		$imgfilename = basename($_FILES["fleimage"]["name"]);
		$imgfilesize = $_FILES["fleimage"]["size"];
		//move the uploaded file to the CAR image directory and create the thumbnail
		$arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576,  ROOT_PATH.NEWS_DIR);

		if ($arrupload["err_code"] == -1) {
		$strERR .= $MSG_VAL_image_err1;
		}
		elseif ($arrupload["err_code"] == -2) {
		$strERR .= $MSG_VAL_image_err2;
		}
		elseif ($arrupload["err_code"] == -3) {
		$strERR .= $MSG_VAL_image_err3;
		}
		elseif ($arrupload["err_code"] == -4) {
		$strERR .= $MSG_VAL_image_err4;
		}
		elseif ($arrupload["err_code"] == -5) {
		$strERR .= $MSG_VAL_image_err5;
		}
		elseif ($arrupload["err_code"] == -6) {
		$strERR .= $MSG_VAL_image_err6;
		}

		//the first image uploaded is set as the default
		$int_default = 0;
	}


	$mynews->error_description = $strERR;
	 if ( $strERR == "" ){
		$mynews = new News($myconnection);
		$mynews->id = $_POST['h_check_id'];
		$mynews->connection = $myconnection;
		$chk = $mynews->get_detail();
		$mynews->status_id = $_POST['lststatus'];
	    $mynews->date = $_POST['txtdate'];
	    $mynews->title = $_POST['txttitle'];
	    $mynews->description = $_POST['txtdescription'];
		$mynews->image = $_FILES['fleimage']['name'];
		$chk = $mynews->update();
		if ( $chk == true ){

			if ( trim ( $_FILES['fleimage']['name'] ) != "" && $mynews->id > 0 ) {
				//rename the uploaded Image file and the thumbnail
				if ( $myimage->rename_image ($mynews->id, $arrupload["imagefile"], ROOT_PATH.NEWS_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
				$strERR = "Image Updated";
				}
				else {
				//Error while renaming the uploaded files
				$strERR = "Image upload Failed";
				}
			}

			$_SESSION[SESSION_TITLE.'flash'] = "Data Updated.";
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "newslist.php";
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
	$mynews = new News($myconnection);
	$mynews->connection = $myconnection;
	$mynews->id = $_POST['h_check_id'];
	$chk = $mynews->delete();
	if ( $chk == true ){
		$_SESSION[SESSION_TITLE.'flash'] = "Data Deleted.";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "newslist.php";
		header( "Location: flash.php");
		exit();
	}else{
		$_SESSION[SESSION_TITLE.'flash'] = "Data Delete Failed";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
		header( "Location: flash.php");
		exit();
	}
}

if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_delete_image ) {
	$mynews = new News($myconnection);
	$mynews->connection = $myconnection;
	$mynews->id = $_POST['h_check_id'];
	$chk = $mynews->delete_image();
	if ( $chk == true ){
		$_SESSION[SESSION_TITLE.'flash'] = "Image Deleted.";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
		header( "Location: flash.php");
		exit();
	}else{
		$_SESSION[SESSION_TITLE.'flash'] = "Image Delete Failed";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
		header( "Location: flash.php");
		exit();
	}
}
?>
