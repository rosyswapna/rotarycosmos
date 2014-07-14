<?php

	$mynews = new News($myconnection);
	$mynews->connection = $myconnection;

	$Mypagination = new Pagination(2);



        $data_bylimit = $mynews->get_list_array_bylimit("",STATUS_ACTIVE,$Mypagination->start_record,$Mypagination->max_records);
        
        if ( $data_bylimit == false ){
            //$mesg = "No records found";
        }else{
            $count_data_bylimit=count($data_bylimit);
            $Mypagination->total_records = $mynews->total_records;
            $Mypagination->paginate();

        }
?>




<h2>Latest news</h2>

<?php

 if ( $data_bylimit == false ){
	//echo "No records found";
 }else{

	$index = 0;
	while ( $count_data_bylimit > $index ){
	$link = "news.php?id=".$data_bylimit[$index]["id"]."";
?>
	<p>
		<?php echo $data_bylimit[$index]["title"]; ?>
		<a class="more" href="<?php echo $link; ?>">more</a> 
	</p>
<?php
	$index++;
	}
 }
?>


