<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
?>

<div class="page_heading">
	<h7> <?php echo $myevent->title; ?> </h7>
</div>
<div class="page_content">
    <h5><?php echo $myevent->title; ?> on <?php echo $myevent->date_from_formatted; ?> to <?php echo $myevent->date_to_formatted; ?>, between <?php echo date('h:i A', strtotime($myevent->time_from)); ?> and <?php echo date('h:i A', strtotime($myevent->time_to)); ?>
</h5>
    <p><?php echo $myevent->description; ?></p>


    <img  src="<?php echo $image; ?>" height="80px" >
</div>

