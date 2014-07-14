<?php

	$mymeeting = new Meeting($myconnection);
	$mymeeting->connection = $myconnection;

	$Mypagination = new Pagination(1);



        $data_bylimit = $mymeeting->get_list_array_bylimit("",STATUS_ACTIVE,$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            //$mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $mymeeting->total_records;
            $Mypagination->paginate();

        }
?>











<h2>Next Meeting</h2>
<p>
<?php

 if ( $data_bylimit == false ){
	//echo "No records found";
 }else{
	$index = 0;
	while ( $count_data_bylimit > $index ){
	$link = "meeting.php?id=".$data_bylimit[$index]["id"]."";
?>

Our next physical meeting is on <?php echo $data_bylimit[$index]["date_formatted"]; ?> @ <?php echo date('h:i A', strtotime($data_bylimit[$index]["time"])); ?>


	<a class="more" href="<?php echo $link; ?>">more</a> 

<?php
	$index++;
	}
 }
?>

</p>

