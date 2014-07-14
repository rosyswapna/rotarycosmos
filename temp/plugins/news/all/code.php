<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }

	$mystatus = new status($myconnection);
	$mystatus->connection = $myconnection;
	$chk_status = $mystatus->get_list_array();

	$array_status = $mystatus->get_array();

	$mynews = new News($myconnection);
	$mynews->connection = $myconnection;


//for pagination

	$Mypagination = new Pagination(10);


	if(isset($_GET["txtsearch_string"])){
		$search_string = $_GET["txtsearch_string"];	
	}else{
		$search_string = "";	
	}
	if(isset($_GET["lststatus"])){
		$status_id = $_GET["lststatus"];	
	}else{
		$status_id = gINVALID;	
	}




        $data_bylimit = $mynews->get_list_array_bylimit($search_string, $status_id,$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $mynews->total_records;
            $Mypagination->paginate();

        }
?>
