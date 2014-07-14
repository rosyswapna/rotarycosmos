<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }
?>


<table align="center">
<tr>
    <td colspan="2" class="page_caption">
    <?php echo $CAP_page_caption?>    [ <?php echo $from_date ?> - <?php echo $to_date?> ]
    </td>
</tr>
 </table>



    <table  border="0" cellpadding="1px" cellspacing="1px">
     <tr><td colspan="6">&nbsp;</td></tr>
    <?php
    if ( $data_bylimit == false ){?>
     <tr><td colspan="6">&nbsp;</td></tr>
     <tr><td colspan="6" align="center" class="message" ><?php echo $MSG_mesg ?></td></tr>
     <tr><td colspan="6">&nbsp;</td></tr>
 </table>
    <?php
     }
     else{?>
    <tr>
        <th class="slno"></th>
        <th><?php echo $CAP_username?></th>
        <th><?php echo $CAP_name?></th>
        <th><?php echo $CAP_ip?></th>
        <th><?php echo $CAP_date?></th>

    </tr>

     <?php
     //to number each record in a page
    
     $style = "row_lite";
     $index = 0;
     $slno = 1;

     while ( $count_data_bylimit > $index ){
        $link = "member.php?id=".$data_bylimit[$index]["id"]."";
         if ( $style == "row_lite" ){
            $style="row_dark";
        }
        else{
            $style="row_lite";
        }

        ?>
    <tr onmouseover="this.className='row_highlight'" onmouseout="this.className='<?php echo $style; ?>'"  class="<?php echo $style; ?>" >
        <td><?php echo $slno++ ?></td>
        <td><a><?php echo $data_bylimit[$index]["username"]; ?></a></td>
        <td><?php echo $data_bylimit[$index]["first_name"] . ' '.$data_bylimit[$index]["last_name"]; ?></td>
        <td><?php echo $data_bylimit[$index]["ip"]; ?></td>
        <td class="td_right" ><?php echo $data_bylimit[$index]["date"]; ?></td>

    </tr><?php
         $index++;
    }
    ?>
    <tr><td colspan="5">&nbsp;</td></tr>
  </table>


<?php } ?>


