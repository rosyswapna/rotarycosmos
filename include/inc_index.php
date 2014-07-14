<div class="column_1">
    <?php if (!empty($login_form)) echo $login_form ?>
    <br />
    <?php // if (!empty($index_pres_msg)) echo $index_pres_msg ; ?>
    <?php // if (!empty($index_next_meeting)) echo $index_next_meeting; ?>
    <?php // if (!empty($index_latest_news)) echo $index_latest_news; ?>
    <?php // if (!empty($index_upcoming_events)) echo $index_upcoming_events; ?>

    <div class="div_left_menu_outer">
        <div class="div_left_menu">
            <h6>E-Club's Column</h6>
        </div>
        <ul>
            <li class="foo"><a href="pres_msg.php" >President Message</a></li>
            <li class="foo"><a href="news_all.php"  >News</a></li>
            <li class="foo"><a href="events.php" >Events</a></li>
            <li class="foo"><a href="meetings.php" >Meetings</a></li>
        </ul>
    </div>
    
    <div><a href="https://www.facebook.com/RotaryCochinCosmos" target="_blank"><img src="../images/layouts/default/fb.png" border="0" /></a></div>

</div>
<div style="width:778px; float:left;">
   <?php if (!empty($slider)) echo $slider ?>

    <div class="column_2">
    
<marquee> <?php if (!empty($marquee)) echo $marquee; ?> </marquee>

<?php if (!empty($index_content)) echo $index_content; ?>
                    
    </div>

</div>

