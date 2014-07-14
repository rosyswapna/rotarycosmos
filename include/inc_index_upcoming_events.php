<?php

	$myevent = new Event($myconnection);
	$myevent->connection = $myconnection;

	$Mypagination = new Pagination(1);



        $data_bylimit = $myevent->get_list_array_bylimit("",STATUS_ACTIVE,$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            //$mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $myevent->total_records;
            $Mypagination->paginate();

        }
?>











<h2>Upcoming Event</h2>
<?php

 if ( $data_bylimit == false ){
	//echo "No records found";
 }else{
	$index = 0;
	while ( $count_data_bylimit > $index ){
	$link = "event.php?id=".$data_bylimit[$index]["id"]."";
?>
	<p>
	 <?php echo $data_bylimit[$index]["title"]; ?> on <?php echo $data_bylimit[$index]["date_from_formatted"]; ?> to <?php echo $data_bylimit[$index]["date_to_formatted"]; ?> @ <?php echo date('h:i A', strtotime($data_bylimit[$index]["time_from"])); ?> to <?php echo date('h:i A', strtotime($data_bylimit[$index]["time_to"])); ?>
	

	<a class="more" href="<?php echo $link; ?>">more</a> 
	</p>
<?php
	$index++;
	}
 }
?>







