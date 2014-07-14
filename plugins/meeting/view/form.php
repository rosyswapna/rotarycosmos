<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
?>

<div class="page_heading">
	<h7> Meeting [ <?php echo $mymeeting->date_formatted; ?> ]</h7>
</div>
<div class="page_content">
    <h5><?php echo $mymeeting->name; ?> on <?php echo $mymeeting->date_formatted; ?> @ <?php echo date('h:i A', strtotime($mymeeting->time)); ?>
	<br/>
	Venue : <?php echo $mymeeting->venue; ?></h5>
    <p><?php echo $mymeeting->description; ?></p>

    <h5>Chief Guest: <?php echo $mymeeting->chief_guest; ?> 
		<br/>	
    Sponsor :  <?php echo $mymeeting->sponsor; ?></h5>
    <img  src="<?php echo $image; ?>" height="80px" >
</div>

