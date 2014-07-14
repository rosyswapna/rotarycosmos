<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


 $mybulletin = new Bulletin($myconnection);
 $mybulletin->connection = $myconnection;


 $myuser = new User($myconnection);
 $myuser->connection = $myconnection;
 $chk_user = $myuser->get_list_array();

	
if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_add ) {
	$strERR = "";
	if ( trim($_POST['txtname']) == "" ){
	  $strERR .= "Empty Name";
	}

	if ( $_POST['lstuser'] == -1 ){
	  $strERR .= "User not selected";
	}

	$mybulletin->error_description = $strERR;

	if ( $strERR == "" ){
		$mybulletin = new Bulletin($myconnection);
		$mybulletin->connection = $myconnection;
		$mybulletin->name = $_POST['txtname'];
		//check user exist or not
		$chk = $mybulletin->exist();
		if ( $chk == true ){
		    $mybulletin->error_description = "Bulletin already exist";
		}else{

		      $mybulletin->frequency = $_POST['txtfrequency'];
			  $mybulletin->url = $_POST['txturl'];
		      $mybulletin->user_id = $_POST['lstuser'];
			
		      $chk = $mybulletin->update();
		      if ( $chk == true ){
				if ( $mybulletin->id > 0 ) {


					$_SESSION[SESSION_TITLE.'flash'] = "Data Inserted";
					$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "bulletins.php";
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
      $mybulletin = new Bulletin($myconnection);
      $mybulletin->id = $_GET['id'];
      $mybulletin->connection = $myconnection;
      $chk1 = $mybulletin->get_detail();
		if ( $chk == false ){
			header("Location: index.php");
			exit();
		}else{
			// Do Nothing
		}
 }
 if ( isset($_POST['submit']) && $_POST['submit'] == $CAP_update ) {
 $strERR = "";

	 if ( $_POST['lstuser'] == -1 ){
		  $strERR .= "User not selected";
	 }



	$mybulletin->error_description = $strERR;
	 if ( $strERR == "" ){
		$mybulletin = new Bulletin($myconnection);
		$mybulletin->id = $_POST['h_check_id'];
		$mybulletin->connection = $myconnection;
		$chk = $mybulletin->get_detail();

		$mybulletin->frequency = $_POST['txtfrequency'];
		$mybulletin->url = $_POST['txturl'];
		$mybulletin->user_id = $_POST['lstuser'];

		$mybulletin->image = $_FILES['fleimage']['name'];
		$chk = $mybulletin->update();
		if ( $chk == true ){


			$_SESSION[SESSION_TITLE.'flash'] = "Data Updated.";
			$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "bulletins.php";
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
	$mybulletin = new Bulletin($myconnection);
	$mybulletin->connection = $myconnection;
	$mybulletin->id = $_POST['h_check_id'];
	$chk = $mybulletin->delete();
	if ( $chk == true ){
		$_SESSION[SESSION_TITLE.'flash'] = "Data Deleted.";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "bulletins.php";
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
