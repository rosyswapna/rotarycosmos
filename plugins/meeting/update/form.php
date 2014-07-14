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
                    Update Meeting
                    <?php }else{?>
                    Add Meeting
                    <?php }?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>    
                    <td><img  src="<?php if(isset($image)) { echo $image; } ?>" height="80px" ></td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage">
                    <?php if(isset( $mymeeting->error_description)) echo $mymeeting->error_description; ?>
                    </td>
                </tr>

                <tr>
                    <td>Name</td>   
                    <td>
                        <input  <?php if(isset($_GET['id'])){?>readonly="true" <?php } ?>type="text" name="txtname" value="<?php if(isset($_POST['txtname'])){echo $_POST['txtname'];}elseif(isset($_GET['id'])){echo $mymeeting->name;}?>"  >
                    </td>
                </tr>

                <tr>
                    <td>Type</td>   
                    <td>
                        <input type="text" name="txttype" value="<?php if(isset($_POST['txttype'])){echo $_POST['txttype'];}elseif(isset($_GET['id'])){echo $mymeeting->type;}?>"  >
                    </td>
                </tr>

                <tr>
                    <td>Status</td>   
                    <td>
                        <?php
                        if (isset($_POST['lststatus'])){$statusid = $_POST['lststatus'];}elseif(isset($_GET['id'])){$statusid = $mymeeting->status_id;}else{$statusid =gINVALID;}
                        populate_list_array("lststatus", $chk_status, "id", "name", $defaultvalue=$statusid,$disable=false);
                        ?>
                    </td>
                </tr>


               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Date</td>   
                    <td>
                        <input class="datepicker"  type="text" name="txtdate" value="<?php if(isset($_POST['txtdate'])){echo $_POST['txtdate'];}elseif(isset($_GET['id'])){echo $mymeeting->date_formatted;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Time</td>   
                    <td>
                        <input class="timepicker"  type="text" name="txttime" value="<?php if(isset($_POST['txttime'])){echo $_POST['txttime'];}elseif(isset($_GET['id'])){echo $mymeeting->time_formatted;}?>"  >
                    </td>
                </tr>





                <tr>
                    <td>Venue</td>   
                    <td>
                        <input type="text" name="txtvenue" value="<?php if(isset($_POST['txtvenue'])){echo $_POST['txtvenue'];}elseif(isset($_GET['id'])){echo $mymeeting->venue;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Description</td>   
                    <td>
						<textarea name="txtdescription"><?php if(isset($_POST['txtdescription'])){echo $_POST['txtdescription'];}elseif(isset($_GET['id'])){echo $mymeeting->description;}?></textarea>
                    </td>
                </tr>


                <tr>
                    <td>Chief Guest</td>   
                    <td>
                        <input type="text" name="txtchief_guest" value="<?php if(isset($_POST['txtchief_guest'])){echo $_POST['txtchief_guest'];}elseif(isset($_GET['id'])){echo $mymeeting->chief_guest;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Sponsor</td>   
                    <td>
                        <input type="text" name="txtsponsor" value="<?php if(isset($_POST['txtsponsor'])){echo $_POST['txtsponsor'];}elseif(isset($_GET['id'])){echo $mymeeting->sponsor;}?>"  >
                    </td>
                </tr>



                <?php if(isset($mymeeting->image) && $mymeeting->image == "" ){?>
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
					<?php if(isset($mymeeting->image) && $mymeeting->image != "" ){?>                    
						<input type="Submit" name="submit" value="<?php echo $CAP_delete_image?>" onClick="return confirm_delete_image();">
					<?php } ?>  

                    <?php }else{ ?>
                    <input type="submit" name="submit" value="<?php echo$CAP_add?>" onClick="return validate_meeting_update();">
                    <?php }?>
                    <input type="hidden" name="h_check_id" value="<?php if( isset($_GET['id']) ){echo $mymeeting->id;}elseif ( isset($_POST['h_id']) ){ echo $mymeeting->id;}?>">
                    <input type="hidden" name="h_check" value="<?php echo md5("update_check"); ?>">                    

                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><br />
                    
                    </td>
                </tr>
            </table>
            </form>
