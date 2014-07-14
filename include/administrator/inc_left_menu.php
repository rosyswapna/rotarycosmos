<div style="background-color:#0067A9; height:30px;border-top-left-radius:15px;border-top-right-radius:15px; padding-top:5px;">
	<h6>Administration</h6>
</div>
<ul>

<?php if(isset($_SESSION[SESSION_TITLE.'admin_userid']) && $_SESSION[SESSION_TITLE.'admin_userid'] > 0){ ?>

	<li><a href="newslist.php" title="News">News</a> <ul> <li> <a href="news.php" title="News">Add News</a> </li> </ul>  </li>
	<li><a href="events.php" title="Events">Events</a> <ul> <li> <a href="event.php" title="News">Add Events</a> </li> </ul>  </li>
	<li><a href="meetings.php" title="Meetings">Meetings</a><ul> <li><a href="meeting.php" title="News">Add Meetings</a> </li> </ul>  </li>
	<li><a href="sliders.php" title="Sliders">Sliders</a></li>
	<li><a href="simple_gallery.php" title="Gallery">Gallery</a></li>
	<li><a href="/contents_search.php" title="Web Contents">Web Contents</a></li>
	<li><a href="/settings.php" title="Settings">Settings</a></li>
	<li>Help</li>

<?php }else{ ?>
	<li>Help</li>
<?php } ?>
</ul>

