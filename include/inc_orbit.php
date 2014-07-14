<style>
#featured { 
	width: 750px;
	height: 360px;
	background: #000 url('../images/orbit_images/loading.gif') no-repeat center center;
	overflow: hidden; 
	
}

div.orbit-wrapper {
    width: 1px;
    height: 1px;
    position: relative;
	width: 750px !important;
    height: 360px !important; }

div.orbit>img {
    position: absolute;
    top: 0;
    left: 0;
    display: none;
	width: 750px !important;
    height: 360px !important; }

</style>

<script type="text/javascript">
$(window).load(function() {
$('#featured').orbit({
	bullets: false
});

$('.orbit-wrapper').css({ width: 750, height: 360 });
 $('.orbit>img').css({ width: 750, height: 360 });
	});
</script>



<div class="column_2_full">
    <div id="featured"> 


<?php 
		$result =get_filenames(ROOT_PATH."images/orbit_gallery","jpg","",true);
		$n = sizeof($result);
		for ($i = 0 ; $i < $n ; $i++ ){
?>
<img src="<?php echo $result[$i]?>"  />

<?php  } ?>

    </div>
</div>

