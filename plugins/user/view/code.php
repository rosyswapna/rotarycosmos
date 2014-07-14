<?php  
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

	if(isset($_GET["id"]) && $_GET["id"] > 0 ){ 
		$user_id = $_GET["id"];
	}else{

		$_SESSION[SESSION_TITLE.'flash'] = "Invalid Member Information.";
		$_SESSION[SESSION_TITLE.'flash_redirect_page'] = "index.php";
		header( "Location: flash.php");
		exit();	
	}

 

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






?>
