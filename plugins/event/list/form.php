<?php
  // prevent execution of this code by direct call from browser
  if ( !defined('CHECK_INCLUDED') ){
    exit();
  }
?>
<form name="frmsearch" id="frmsearch" method="GET" action="<?php echo $current_url;?>">
<table align="center">
<tr>
                    <td colspan="5" align="center" class="page_caption">
                    <?php echo $CAP_page_caption?>
                    </td>
</tr>
    <tr>
      <td class="caption" ><?php echo $CAP_search_string ?></td>
      <td><input   name="txtsearch_string" value="<?php echo $search_string; ?>"></td>
    </tr> 

     <tr>
      <td class="caption" ><?php echo $CAP_status ?></td>
      <td><?php populate_list_array("lststatus", $chk_status, "id", "name", $status_id,$disable=false); ?></td>
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



    <table border="0" cellpadding="1px" cellspacing="1px">
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
        <th><?php echo $CAP_name?></th>
        <th><?php echo $CAP_status?></th>
    </tr>

     <?php
     //to number each record in a page
    
     $style = "row_lite";
     $index = 0;
     $slno = 1;

     while ( $count_data_bylimit > $index ){
        $link = "event.php?id=".$data_bylimit[$index]["id"]."";
         if ( $style == "row_lite" ){
            $style="row_dark";
        }
        else{
            $style="row_lite";
        }

        ?>
    <tr onmouseover="this.className='row_highlight'" onmouseout="this.className='<?php echo $style; ?>'"  class="<?php echo $style; ?>" >
        <td><?php echo $slno++ ?></td>
        <td><a href="<?php echo $link; ?>"><?php echo $data_bylimit[$index]["name"]; ?></a></td>
        <td><?php 
					if(isset($data_bylimit[$index]["status_id"]) && $data_bylimit[$index]["status_id"] > 0){
						$status_id = $data_bylimit[$index]["status_id"];
						echo $array_status [$status_id]["name"];
					}else{
					
					}
					 ?></td>


    </tr><?php
         $index++;
    }
    ?>
    <tr><td>&nbsp;</td></tr>
 </table>

        <!--For pagination. we can create a  diff style  & use-->
        <?php $Mypagination->pagination_style1(); ?>

  <?php } ?>



      <br />
<div align="center">* You can Click on a user search_string to "Update" or"Delete"</div>
