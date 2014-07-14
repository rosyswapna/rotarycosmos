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
                    <td><img  src="<?php echo $image; ?>" height="80px" ></td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage">
                    <?php if(isset( $mybulletin->error_description)) echo $mybulletin->error_description; ?>
                    </td>
                </tr>

                <tr>
                    <td>Name</td>   
                    <td>
                        <input  <?php if(isset($_GET['id'])){?>readonly="true" <?php } ?>type="text" name="txtname" value="<?php if(isset($_POST['txtname'])){echo $_POST['txtname'];}elseif(isset($_GET['id'])){echo $mybulletin->name;}?>"  >
                    </td>
                </tr>

                <tr>
                    <td>Frequency</td>   
                    <td>
                        <input type="text" name="txtfrequency" value="<?php if(isset($_POST['txtfrequency'])){echo $_POST['txtfrequency'];}elseif(isset($_GET['id'])){echo $mybulletin->frequency;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Url</td>   
                    <td>
                        <input type="text" name="txturl" value="<?php if(isset($_POST['txturl'])){echo $_POST['txturl'];}elseif(isset($_GET['id'])){echo $mybulletin->url;}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>Member</td>   
                    <td>
                        <?php
                        if (isset($_POST['lstuser'])){$userid = $_POST['lstuser'];}elseif(isset($_GET['id'])){$userid = $mybulletin->user_id;}else{$userid =gINVALID;}
                        populate_list_array("lstuser", $chk_user, "id", "name", $defaultvalue=$userid,$disable=false);
                        ?>
                    </td>
                </tr>




                
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
					<?php if(isset($mybulletin->image) && $mybulletin->image != "" ){?>                    
						<input type="Submit" name="submit" value="<?php echo $CAP_delete_image?>" onClick="return confirm_delete_image();">
					<?php } ?>  

                    <?php }else{ ?>
                    <input type="submit" name="submit" value="<?php echo$CAP_add?>" onClick="return validate_bulletin_update();">
                    <?php }?>
                    <input type="hidden" name="h_check_id" value="<?php if( isset($_GET['id']) ){echo $mybulletin->id;}elseif ( isset($_POST['h_id']) ){ echo $mybulletin->id;}?>">
                    <input type="hidden" name="h_check" value="<?php echo md5("update_check"); ?>">                    

                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><br />
                    
                    </td>
                </tr>
            </table>
            </form>
