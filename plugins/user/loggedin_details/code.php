<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }

	$myuser = new User($myconnection);
	$myuser->connection = $myconnection;
	$chk_user = $myuser->get_list_array();

	$array_user = $myuser->get_array();

	if(isset($_POST["txtdate_from"]) && $_POST["txtdate_from"] != "" ){
		$from_date = $_POST["txtdate_from"];
	}else{
		$from_date_tmp = date('Y/m/d', strtotime('previous Thursday'));
		$from_date = date('d-m-Y', strtotime('previous Thursday'));
	}

	if(isset($_POST["txtdate_to"]) && $_POST["txtdate_to"] != "" ){
		$to_date = $_POST["txtdate_to"];
	}else{
		$to_date = date('d-m-Y', strtotime($from_date_tmp.' + 7 days'));
	}

	if(isset($_POST["lstuser"])){
		$user_id = $_POST["lstuser"];	
	}else{
		$user_id = gINVALID;	
	}

	if(isset($_POST["submit"]) && $_POST["submit"] == $CAP_submit){
	

		$mymember = new Member($myconnection);
		$mymember->connection = $myconnection;

        $data_bylimit = $mymember->loggedin_details_all($from_date, $to_date, $user_id);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
        }


	}else{

		 $mymember = new Member($myconnection);
		 $mymember->connection = $myconnection;



        $data_bylimit = $mymember->member_current_week_loggedin_details($user_id);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);

        }

	}
?>
