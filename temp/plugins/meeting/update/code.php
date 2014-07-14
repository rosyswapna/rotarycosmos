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
		$arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576,  ROOT_PATH.MEETING_DIR);

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

	$mymeeting->error_description = $strERR;

	if ( $strERR == "" ){
		$mymeeting = new Meeting($myconnection);
		$mymeeting->connection = $myconnection;
		$mymeeting->name = $_POST['txtname'];
		//check user exist or not
		$chk = $mymeeting->exist();
		if ( $chk == true ){
		    $mymeeting->error_description = "Meeting already exist";
		}else{

		      $mymeeting->type = $_POST['txttype'];
		      $mymeeting->status_id = $_POST['lststatus'];
			  $mymeeting->date = $_POST['txtdate'];
			  $mymeeting->time = $_POST['txttime'];
			  $mymeeting->venue = $_POST['txtvenue'];
			  $mymeeting->description = $_POST['txtdescription'];
			  $mymeeting->chief_guest = $_POST['txtchief_guest'];
			  $mymeeting->sponsor = $_POST['txtsponsor'];				
			  $mymeeting->image = $_FILES['fleimage']['name'];
		      $chk = $mymeeting->update();
		      if ( $chk == true ){
				if ( $mymeeting->id > 0 ) {

					if ( trim ( $_FILES['fleimage']['name'] ) != "" && $mymeeting->id > 0 ) {
						//rename the uploaded Image file and the thumbnail
						if ( $myimage->rename_image ($mymeeting->id, $arrupload["imagefile"], ROOT_PATH.MEETING_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
						$strERR = "Image Updated";
						}
						else {
						//Error while renaming the uploaded files
						$strERR = "Image upload Failed";
						}
					}

					$_SESSION[SESSION_TITLE.'flash'] = "Data Inserted";
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "meetings.php";
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
 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_update ) {
 $strERR = "";

	 if ( $_POST['lststatus'] == -1 ){
		  $strERR .= "Status not selected";
	 }

	if ( trim ( $_FILES['fleimage']['name'] ) != ""  && $strERR == "" ) {

		$imgfilename = basename($_FILES["fleimage"]["name"]);
		$imgfilesize = $_FILES["fleimage"]["size"];
		//move the uploaded file to the CAR image directory and create the thumbnail
		$arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576,  ROOT_PATH.MEETING_DIR);

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


	$mymeeting->error_description = $strERR;
	 if ( $strERR == "" ){
		$mymeeting = new Meeting($myconnection);
		$mymeeting->id = $_POST['h_check_id'];
		$mymeeting->connection = $myconnection;
		$chk = $mymeeting->get_detail();

		$mymeeting->type = $_POST['txttype'];
		$mymeeting->status_id = $_POST['lststatus'];
		$mymeeting->date = $_POST['txtdate'];
		$mymeeting->time = $_POST['txttime'];
		$mymeeting->venue = $_POST['txtvenue'];
		$mymeeting->description = $_POST['txtdescription'];
		$mymeeting->chief_guest = $_POST['txtchief_guest'];
		$mymeeting->sponsor = $_POST['txtsponsor'];

		$mymeeting->image = $_FILES['fleimage']['name'];
		$chk = $mymeeting->update();
		if ( $chk == true ){

			if ( trim ( $_FILES['fleimage']['name'] ) != "" && $mymeeting->id > 0 ) {
				//rename the uploaded Image file and the thumbnail
				if ( $myimage->rename_image ($mymeeting->id, $arrupload["imagefile"], ROOT_PATH.MEETING_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
				$strERR = "Image Updated";
				}
				else {
				//Error while renaming the uploaded files
				$strERR = "Image upload Failed";
				}
			}

			$_SESSION[SESSION_TITLE.'flash'] = "Data Updated.";
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "meetings.php";
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
	$mymeeting = new Meeting($myconnection);
	$mymeeting->connection = $myconnection;
	$mymeeting->id = $_POST['h_check_id'];
	$chk = $mymeeting->delete();
	if ( $chk == true ){
		$_SESSION[SESSION_TITLE.'flash'] = "Data Deleted.";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "meetings.php";
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
	$mymeeting = new Meeting($myconnection);
	$mymeeting->connection = $myconnection;
	$mymeeting->id = $_POST['h_check_id'];
	$chk = $mymeeting->delete_image();
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
