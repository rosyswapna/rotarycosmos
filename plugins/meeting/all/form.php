<?php
  // prmeeting execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }
?>

<div class="page_heading">
	<h7>meetings</h7>
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
			$link = "meeting.php?id=".$data_bylimit[$index]["id"]."";
			?>


	 <h5> <?php echo $data_bylimit[$index]["name"]; ?> on <?php echo $data_bylimit[$index]["date_formatted"]; ?> @ <?php echo date('h:i A', strtotime($data_bylimit[$index]["time"])); ?>
	<br/>
	Venue : <?php echo $data_bylimit[$index]["venue"]; ?></h5>
    <h5>Chief Guest: <?php echo $data_bylimit[$index]["chief_guest"]; ?> 
		
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
