<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }

 $mymember = new Member($myconnection);
 $mymember->connection = $myconnection;



        $data_bylimit = $mymember->current_week_attendance_all();
        
        if ( $data_bylimit == false ){
            $mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);

        }

		$from_date_tmp = date('Y/m/d', strtotime('previous Thursday'));
		$from_date = date('d/m/Y', strtotime('previous Thursday'));
		$to_date = date('d/m/Y', strtotime($from_date_tmp.' + 6 days'));
?>
