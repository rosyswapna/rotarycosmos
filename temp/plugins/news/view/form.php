<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
?>

<div class="page_heading">
	<h7><?php echo $mynews->title; ?>  [ <?php echo $mynews->date_formatted; ?> ]</h7>
</div>
<div class="page_content">
    <img class="image_big" src="<?php echo $image; ?>" ><br/>
    <?php echo $mynews->description; ?>
</div>


