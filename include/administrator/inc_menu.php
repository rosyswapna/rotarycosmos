<ul class="sf-menu sf-js-enabled sf-shadow" id="menu">
<li><a href="index.php">Home</a></li>
<?php if(isset($_SESSION[SESSION_TITLE.'admin_userid']) && $_SESSION[SESSION_TITLE.'admin_userid'] > 0){ ?>
<li ><a  href="#" title="Member List">Members »</a>
<ul >
	<li ><a href="members.php" title="Member List">Member List</a></li>
	<li ><a href="member.php" title="Add Member">Add Member</a></li>
	<li ><a href="current_week_attendance_members.php" title="Current Week Attendance">Current Week Attendance</a></li>
	<li ><a href="attendance_members.php" title="Attendance">Attendance</a></li>
	<li ><a href="loggedin_details.php" title="Logged in Details">Logged in Details</a></li>
</ul>
</li>

<li ><a  href="#" title="Activities">Activities »</a>
<ul >
	<li ><a href="newslist.php" title="News">News</a></li>
	<li ><a href="news.php" title="Add News">Add News</a></li>

	<li ><a href="meetings.php" title="Meetings">Meetings</a></li>
	<li ><a href="meeting.php" title="Add Meeting">Add Meeting</a></li>

	<li ><a href="events.php" title="Events">Events</a></li>
	<li ><a href="event.php" title="Add Event">Add Event</a></li>

	<li ><a href="bulletins.php" title="Bulletins">Bulletins</a></li>
	<li ><a href="bulletin.php" title="Add Bulletin">Add Bulletin</a></li>


</ul>
</li>


<li ><a  href="#" title="Images">Images »</a>
<ul >
	<li ><a href="sliders.php" title="Sliders">Sliders</a></li>
	<li ><a href="simple_gallery.php" title="Gallery">Gallery</a></li>
</ul>
</li>


<li ><a href="#" title="Admin">Web Contents »</a>
<ul >
	<li ><a href="/contents_search.php" title="Dynamic Contents">Dynamic Contents</a></li>
	<li ><a href="/settings.php" title="Settings">Settings</a></li>
</ul>
</li>

<li ><a  href="#" title="Admin">Admin Settings »</a>
<ul >
	<li ><a href="change_password.php" title="Settings">Change Password</a></li>
</ul>
</li>



<li ><a  href="logout.php" title="logout">Logout</a>
<?php }else{ ?>
<li ><a  href="index.php" title="Login">Login</a>
<?php } ?>
</ul>
