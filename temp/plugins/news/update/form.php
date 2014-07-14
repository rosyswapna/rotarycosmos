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
                    Update News
                    <?php }else{?>
                    Add News
                    <?php }?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>    
                    <td><img  src="<?php echo $image; ?>" height="80px" ></td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage">
                    <?php if(isset( $mynews->error_description)) echo $mynews->error_description; ?>
                    </td>
                </tr>

                <tr>
                    <td>Name</td>   
                    <td>
                        <input  <?php if(isset($_GET['id'])){?>readonly="true" <?php } ?>type="text" name="txtname" value="<?php if(isset($_POST['txtname'])){echo $_POST['txtname'];}elseif(isset($_GET['id'])){echo $mynews->name;}?>"  >
                    </td>
                </tr>



                <tr>
                    <td>Status</td>   
                    <td>
                        <?php
                        if (isset($_POST['lststatus'])){$statusid = $_POST['lststatus'];}elseif(isset($_GET['id'])){$statusid = $mynews->status_id;}else{$statusid =gINVALID;}
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
                        <input class="datepicker"  type="text" name="txtdate" value="<?php if(isset($_POST['txtdate'])){echo $_POST['txtdate'];}elseif(isset($_GET['id'])){echo $mynews->date_formatted;}?>"  >
                    </td>
                </tr>

                <tr>
                    <td>Title</td>   
                    <td>
                        <input type="text" name="txttitle" value="<?php if(isset($_POST['txttitle'])){echo $_POST['txttitle'];}elseif(isset($_GET['id'])){echo $mynews->title;}?>"  >
                    </td>
                </tr>
                <tr>
                    <td>Content</td>   
                    <td>
						<textarea name="txtdescription"><?php if(isset($_POST['txtdescription'])){echo $_POST['txtdescription'];}elseif(isset($_GET['id'])){echo $mynews->description;}?></textarea>
                    </td>
                </tr>



                <?php if(isset($mynews->image) && $mynews->image == "" ){?>
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
					<?php if(isset($mynews->image) && $mynews->image != "" ){?>                    
						<input type="Submit" name="submit" value="<?php echo $CAP_delete_image?>" onClick="return confirm_delete_image();">
					<?php } ?>  

                    <?php }else{ ?>
                    <input type="submit" name="submit" value="<?php echo$CAP_add?>" onClick="return validate_news_update();">
                    <?php }?>
                    <input type="hidden" name="h_check_id" value="<?php if( isset($_GET['id']) ){echo $mynews->id;}elseif ( isset($_POST['h_id']) ){ echo $mynews->id;}?>">
                    <input type="hidden" name="h_check" value="<?php echo md5("update_check"); ?>">                    

                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><br />
                    
                    </td>
                </tr>
            </table>
            </form>
