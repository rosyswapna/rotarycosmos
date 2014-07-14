<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }

 $myuser = new User($myconnection);
 $myuser->connection = $myconnection;
 //$chk_user = $myuser->get_list_array();

 $myuserstatus = new userstatus($myconnection);
 $myuserstatus->connection = $myconnection;
 $chk_userstatus = $myuserstatus->get_list_array();


 $myclubposition = new ClubPosition($myconnection);
 $myclubposition->connection = $myconnection;
 $chk_clubposition = $myclubposition->get_list_array();



//for pagination
	$Mypagination = new Pagination(10);
	
	if(isset($_GET["txtusername"])){
		$username = $_GET["txtusername"];	
	}else{
		$username = "";	
	}
	if(isset($_GET["lstuserstatus"])){
		$userstatus_id = $_GET["lstuserstatus"];	
	}else{
		$userstatus_id = gINVALID;	
	}

	if(isset($_GET["lstclubposition"])){
		$clubposition_id = $_GET["lstclubposition"];	
	}else{
		$clubposition_id = gINVALID;	
	}



        $data_bylimit = $myuser->get_list_array_bylimit($username, $userstatus_id, $clubposition_id,$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $myuser->total_records;
            $Mypagination->paginate();

        }
?>
