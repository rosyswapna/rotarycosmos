<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }

	if(isset($_GET["id"]) && $_GET["id"] > 0 ) {
		$user_id = $_GET["id"];
	}else{
        $_SESSION[SESSION_TITLE.'flash'] = "Invalid User/Member";
        $_SESSION[SESSION_TITLE.'flash_redirect_page'] = "dashboard.php";
        header( "Location: flash.php");
		exit();
	}


		 $mymember = new Member($myconnection);
		 $mymember->connection = $myconnection;



        $data_bylimit = $mymember->member_current_week_loggedin_details($user_id);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);

        }

		$from_date_tmp = date('Y/m/d', strtotime('previous Thursday'));
		$from_date = date('d/m/Y', strtotime('previous Thursday'));
		$to_date = date('d/m/Y', strtotime($from_date_tmp.' + 6 days'));
?>
