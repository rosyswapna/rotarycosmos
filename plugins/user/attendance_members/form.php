<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }
?>



	<form name="frmsearch" id="frmsearch" method="POST" action="<?php echo $current_url;?>">
	<table align="center">
		<tr>
			<td colspan="2" class="page_caption">
			<?php echo $CAP_page_caption?>    [ <?php echo $from_date ?> - <?php echo $to_date?> ]
			</td>
		</tr>

		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr> 

        <tr>
            <td>Date</td>   
            <td>
                <input class="datepicker"  type="text" name="txtdate_from" value="<?php echo $from_date;?>"  > B/W 
                <input class="datepicker"  type="text" name="txtdate_to" value="<?php echo $to_date; ?>"
            </td>
        </tr>

		 <tr>
		  <td class="caption" ><?php echo $CAP_username ?></td>
		  <td><?php populate_list_array("lstuser", $chk_user, "id", "name", $user_id , $disable=false); ?></td>
		</tr> 

		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td>&nbsp;&nbsp;</td>
		  <td><input name="submit" value="<?php echo $CAP_submit?>" type="submit"><input type="hidden" name="h_conf_search" value="<?php echo md5("CONF_SEARCH"); ?>"></td>
		</tr>

	</table>
	</form>



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
        <th><?php echo $CAP_attendance?></th>

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
        <td class="td_right" ><?php echo $data_bylimit[$index]["attendance"]; ?></td>

    </tr><?php
         $index++;
    }
    ?>
    <tr><td colspan="5">&nbsp;</td></tr>
  </table>


<?php } ?>


