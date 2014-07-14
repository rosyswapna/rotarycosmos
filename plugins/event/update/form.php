<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
?><form  name="frmupdate" id="frmupdate" method="post" action="<?php echo $current_url; ?>" enctype="multipart/form-data">
      <!--<html> --> 
            <table border="0" cellpadding="0" cellspacing="2"  >
                <tr>
                    <td colspan="2" class="page_caption">
                    <?php if ( isset($_GET['id']) || isset($_POST['h_id']) ){?>
                    Update Event
                    <?php }else{?>
                    Add Event
                    <?php }?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>    
                    <td><img  src="<?php if(isset($image)) { echo $image; } ?>" height="80px" ></td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage">
                    <?php if(isset( $myevent->error_description)) echo $myevent->error_description; ?>
                    </td>
                </tr>

                <tr>
                    <td>Name</td>   
                    <td>
                        <input  <?php if(isset($_GET['id'])){?>readonly="true" <?php } ?>type="text" name="txtname" value="<?php if(isset($_POST['txtname'])){echo $_POST['txtname'];}elseif(isset($_GET['id'])){echo $myevent->name;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Status</td>   
                    <td>
                        <?php
                        if (isset($_POST['lststatus'])){$statusid = $_POST['lststatus'];}elseif(isset($_GET['id'])){$statusid = $myevent->status_id;}else{$statusid =gINVALID;}
                        populate_list_array("lststatus", $chk_status, "id", "name", $defaultvalue=$statusid,$disable=false);
                        ?>
                    </td>
                </tr>


               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Date From</td>   
                    <td>
                        <input class="datepicker"  type="text" name="txtdate_from" value="<?php if(isset($_POST['txtdate_from'])){echo $_POST['txtdate_from'];}elseif(isset($_GET['id'])){echo $myevent->date_from_formatted;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Date To</td>   
                    <td>
                        <input class="datepicker"  type="text" name="txtdate_to" value="<?php if(isset($_POST['txtdate_to'])){echo $_POST['txtdate_to'];}elseif(isset($_GET['id'])){echo $myevent->date_to_formatted;}?>"  >
                    </td>
                </tr>




                <tr>
                    <td>Time From</td>   
                    <td>
                        <input class="timepicker"  type="text" name="txttime_from" value="<?php if(isset($_POST['txttime_from'])){echo $_POST['txttime_from'];}elseif(isset($_GET['id'])){echo $myevent->time_from_formatted;}?>"  >
                    </td>
                </tr>

                <tr>
                    <td>Time To</td>   
                    <td>
                        <input class="timepicker"  type="text" name="txttime_to" value="<?php if(isset($_POST['txttime_to'])){echo $_POST['txttime_to'];}elseif(isset($_GET['id'])){echo $myevent->time_to_formatted;}?>"  >
                    </td>
                </tr>





                <tr>
                    <td>Title</td>   
                    <td>
                        <input type="text" name="txttitle" value="<?php if(isset($_POST['txttitle'])){echo $_POST['txttitle'];}elseif(isset($_GET['id'])){echo $myevent->title;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Description</td>   
                    <td>
						<textarea name="txtdescription"><?php if(isset($_POST['txtdescription'])){echo $_POST['txtdescription'];}elseif(isset($_GET['id'])){echo $myevent->description;}?></textarea>
                    </td>
                </tr>



                <?php if(isset($myevent->image) && $myevent->image == "" ){?>
                    <tr>
		                <td> Image </td>
                    	<td colspan="2"><input type="file" name="fleimage" id="fleimage" size="30" /></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
					<td>&nbsp;</td>
                    <td><br />
                    <?php if ( isset($_GET['id'])  || isset($_POST['h_id']) ){?>
                    <input type="submit" name="submit" value="<?php echo $CAP_update?>" onClick="return validate_update();" >
                    <input type="Submit" name="submit" value="<?php echo $CAP_delete?>" onClick="return confirm_delete();">
					<?php if(isset($myevent->image) && $myevent->image != "" ){?>                    
						<input type="Submit" name="submit" value="<?php echo $CAP_delete_image?>" onClick="return confirm_delete_image();">
					<?php } ?>  

                    <?php }else{ ?>
                    <input type="submit" name="submit" value="<?php echo$CAP_add?>" onClick="return validate_event_update();">
                    <?php }?>
                    <input type="hidden" name="h_check_id" value="<?php if( isset($_GET['id']) ){echo $myevent->id;}elseif ( isset($_POST['h_id']) ){ echo $myevent->id;}?>">
                    <input type="hidden" name="h_check" value="<?php echo md5("update_check"); ?>">                    

                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><br />
                    
                    </td>
                </tr>
            </table>
            </form>
