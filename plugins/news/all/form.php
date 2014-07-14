<?php
  // prnews execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }
?>

<div class="page_heading">
	<h7>news</h7>
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
			$link = "news.php?id=".$data_bylimit[$index]["id"]."";
			?>



	 <h5><?php echo $data_bylimit[$index]["title"]; ?> [ <?php echo $data_bylimit[$index]["date_formatted"]; ?> ] </h5>
	
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
