<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }
?>

<div class="page_heading">
	<h7>Events</h7>
</div>
<div class="page_content">

<?php
    if ( $data_bylimit == false ){?>
	<br/>
     <h5><?php echo $MSG_mesg ?></h5>
    <?php
     }else{
     $index = 0;
		while ( $count_data_bylimit > $index ){
			$link = "event.php?id=".$data_bylimit[$index]["id"]."";
			?>



	 <h5><?php echo $data_bylimit[$index]["title"]; ?> on <?php echo $data_bylimit[$index]["date_from_formatted"]; ?> to <?php echo $data_bylimit[$index]["date_to_formatted"]; ?> @ <?php echo date('h:i A', strtotime($data_bylimit[$index]["time_from"])); ?> to <?php echo date('h:i A', strtotime($data_bylimit[$index]["time_to"])); ?></h5>
	
    <p><?php echo $data_bylimit[$index]["description"]; ?></p>


    <p>   </p>

	<a class="more" href="<?php echo $link; ?>">more</a> 





		<?php
		 $index++;
		}
		?>


        <!--For pagination. we can create a  diff style  & use-->
        <?php $Mypagination->pagination_style1(); ?>

  <?php } ?>

</div>
