<?php if(isset($_SESSION[SESSION_TITLE.'member_userid']) && $_SESSION[SESSION_TITLE.'member_userid'] > 0){ ?>
<div class="div_left_menu_outer">
    <div class="div_left_menu">
        <h6><h6>Member Menu</h6></h6>
    </div>
<ul>
<?php if(isset($_SESSION[SESSION_TITLE.'member_userid']) && $_SESSION[SESSION_TITLE.'member_userid'] > 0){ ?>

<?php if($_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_ADMIN){ ?>

<li ><a class="sf-with-ul" href="#" title="Admin">Administration</a>
<ul >
	<li ><a href="/profile.php" title="Profile">Profile</a></li>
	<li ><a href="/contents_search.php" title="Dynamic Contents">Dynamic Contents</a></li>
	<li ><a href="/settings.php" title="Settings">Settings</a></li>
	<li ><a href="/change_password.php" title="Profile">Change Password</a></li>
	<li ><a href="/attendance.php" title="Attendance">Attendance</a></li>
</ul>
</li>

<?php }elseif($_SESSION[SESSION_TITLE.'member_roll_id'] == ROLL_MEMBER){ ?>

<li ><a class="sf-with-ul" href="#" title="Admin">Administration</a>
<ul >
	<li ><a href="/profile.php" title="Profile">Profile</a></li>
	<li ><a href="/attendance.php" title="Attendance">Attendance</a></li>
	<li ><a href="/change_password.php" title="Profile">Change Password</a></li>
</ul>
</li>
<?php } ?>

<li ><a  href="/logout.php" title="logout">Logout</a>
<?php }else{ //do  noting ?>

<?php } ?>
</li>
</ul>

</div>
<?php } ?>