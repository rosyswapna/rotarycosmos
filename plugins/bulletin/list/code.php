<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }

	$myuser = new User($myconnection);
	$myuser->connection = $myconnection;
	$chk_user = $myuser->get_list_array();

	$array_user = $myuser->get_array();

	$mybulletin = new Bulletin($myconnection);
	$mybulletin->connection = $myconnection;


//for pagination

	$Mypagination = new Pagination(10);


	if(isset($_GET["txtsearch_string"])){
		$search_string = $_GET["txtsearch_string"];	
	}else{
		$search_string = "";	
	}
	if(isset($_GET["lstuser"])){
		$user_id = $_GET["lstuser"];	
	}else{
		$user_id = gINVALID;	
	}




        $data_bylimit = $mybulletin->get_list_array_bylimit($search_string, $user_id,$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $mybulletin->total_records;
            $Mypagination->paginate();

        }
?>
