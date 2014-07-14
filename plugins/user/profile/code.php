<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

 $user_id =$_SESSION[SESSION_TITLE.'member_userid'];

 $myuser = new User($myconnection);
 $myuser->connection = $myconnection;
 $myuser->id = $user_id;
  $chk_user = $myuser->get_detail();

 $mymember = new Member($myconnection);
 $mymember->connection = $myconnection;
 $mymember->user_id = $user_id;
 $chk_member = $mymember->get_detail();

 $myimage = new Image;


 $myclassification = new Classification($myconnection);
 $myclassification->connection = $myconnection;
 $chk_classification = $myclassification->get_list_array();

	if($chk_user==false && $chk_member==false){
		$_SESSION[SESSION_TITLE.'flash'] = "Invalid Member Information.";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
		header( "Location: flash.php");
		exit();	
	}else{
	 $member_id =$mymember->id;


	if ( $mymember->image != "" ) {
		$ext = explode('.', $mymember->image);
		$ext = $ext[count($ext)-1];
		$member_image = MEMBER_DIR . $member_id . '.' . $ext;
	}else{
		$member_image = MEMBER_DIR . 'member.gif';
	}

	}



 if ( isset($_GET['id']) && $_GET['id'] > 0 ){
      $myuser = new User();
      $myuser->id = $_GET['id'];
      $myuser->connection = $myconnection;
      $chk1 = $myuser->get_detail();
      if ( $chk == false ){
		  header("Location: index.php");
		  exit();
      }
 }




 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_update ) {


	$strERR = "";

	if ( trim ( $_FILES['fleimage']['name'] ) != ""  && $strERR == "" ) {

		    $imgfilename = basename($_FILES["fleimage"]["name"]);
		    $imgfilesize = $_FILES["fleimage"]["size"];
		    //move the uploaded file to the CAR image directory and create the thumbnail
		    $arrupload = $myimage->upload_image($_FILES['fleimage'], 48, 800, 48, 600, 1048576,  MEMBER_DIR);

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

	$myuser->error_description = $strERR;
	if ( $strERR == "" ){
		$myuser = new User($myconnection);
		$myuser->id = $user_id;
		$myuser->connection = $myconnection;
		$chk_user = $myuser->get_detail();
		$myuser->emailid = $_POST['txtemail'];
		$chk = $myuser->update();

		$mymember = new Member($myconnection);
		$mymember->id = $member_id;
		$mymember->user_id = $user_id;

		$mymember->connection = $myconnection;
		$chk = $mymember->get_detail();
		$mymember->first_name = $_POST['txtfirst_name'];
		$mymember->last_name = $_POST['txtlast_name'];
		$mymember->phone = $_POST['txtphone'];
		$mymember->mobile = $_POST['txtmobile'];
		$mymember->website = $_POST['txtwebsite'];
		$mymember->image = $_FILES['fleimage']['name'];

		$mymember->dob = $_POST['txtdob'];
		$mymember->dow = $_POST['txtdow'];
		$mymember->blood_group = $_POST['txtblood_group'];

		$mymember->office_address1 = $_POST['txtoffice_address1'];
		$mymember->office_address2 = $_POST['txtoffice_address2'];
		$mymember->office_address3 = $_POST['txtoffice_address3'];
		$mymember->office_city = $_POST['txtoffice_city'];
		$mymember->office_pin = $_POST['txtoffice_pin'];
		$mymember->office_phone = $_POST['txtoffice_phone'];

		$mymember->residence_address1 = $_POST['txtresidence_address1'];
		$mymember->residence_address2 = $_POST['txtresidence_address2'];
		$mymember->residence_address3 = $_POST['txtresidence_address3'];
		$mymember->residence_city = $_POST['txtresidence_city'];
		$mymember->residence_pin = $_POST['txtresidence_pin'];





		$chk_member = $mymember->update();
		if ( $chk_member == true ){
			
		    if ( trim ( $_FILES['fleimage']['name'] ) != "" && $member_id > 0 ) {
		        //rename the uploaded Image file and the thumbnail
		        if ( $myimage->rename_image ($member_id, $arrupload["imagefile"], MEMBER_DIR)  /*&& rename_image ($imageid, $arrupload["thumbfile"], THUMBS_DIR)*/ ) {
		        $strERR = "Profile Photo Updated";
		        }
		        else {
		        //Error while renaming the uploaded files
		        $strERR = "Photo upload Failed";
		        }
		    }
			$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_updated."<br/>".$strERR;
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
			header( "Location: flash.php");
			exit();
		}else{
			$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
			header( "Location: flash.php");
			exit();
		}
	}else{
	
			$_SESSION[SESSION_TITLE.'flash'] = $strERR;
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
			header( "Location: flash.php");
			exit();
	}
 }


if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_delete ) {
	$mymember = new Member();
	$mymember->connection = $myconnection;
	$mymember->user_id = $user_id;
	$chk = $mymember->delete_image();
	if ( $chk == true ){
		$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_image_deleted;
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
		header( "Location: flash.php");
		exit();
	}else{
		$_SESSION[SESSION_TITLE.'flash'] = $RD_MSG_attempt_failed;
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = $current_url;
		header( "Location: flash.php");
		exit();
	}
}
?>
