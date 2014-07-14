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
                    <?php echo $CAP_page_caption_update?>
                    <?php }else{?>
                    <?php echo $CAP_page_caption_add?>
                    <?php }?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage">
                    <?php if(isset( $myuser->error_description)) echo $myuser->error_description; ?>
                    </td>
                </tr>
                <tr>
                    <?php if ( isset($image) && $image != "" ){?>
                    <td>
                        <img  src="<?php echo $user_image?>" height="48px" align="left">
                    </td>
                    <td></td>
                    <?php }?>
                </tr>
                <?php /*if(isset($_GET['id']) || isset($_POST['h_id']) ) {?>
                <tr>
                    <td><b>Registration Date : </b></td>
                    <td><b><?php echo$r_date?></b></td>
                </tr>
                <?php } */?>
                <tr>
                    <td>
                        <?php echo$CAP_username?>
                    </td>   
                    <td>
                        <input  <?php if(isset($_GET['id'])){?>readonly="true" <?php } ?>type="text" name="txtusername" value="<?php if(isset($_POST['txtusername'])){echo $_POST['txtusername'];}elseif(isset($_GET['id'])){echo $myuser->username;}?>"  >
                    </td>
                </tr>
                <?php if(!isset($_GET['id']) && !isset($_POST['h_id']) ) {?>

                <tr>
                    <td>
                        <?php echo $CAP_password?>
                    </td>   
                    <td>
                        <input  type="password" name="txtpassword" value="<?php if(isset($_POST['txtusername'])){echo $_POST['txtpassword'];}?>"  >
                    </td>
                </tr>


                <tr>
                    <td>
                        <?php echo $CAP_repassword?>
                    </td>   
                    <td>
                        <input  type="password" name="txtrepassword" value="<?php if(isset($_POST['txtusername'])){echo $_POST['txtrepassword'];}?>"  >
                    </td>
                </tr>
                <?php } ?>


                <tr>
                    <td>
                        <?php echo $CAP_userstatus?>
                    </td>   
                    <td>
                        <?php
                        if (isset($_POST['lstuserstatus'])){$userstatusid = $_POST['lstuserstatus'];}elseif(isset($_GET['id'])){$userstatusid = $myuser->userstatus_id;}else{$userstatusid =gINVALID;}
                        populate_list_array("lstuserstatus", $chk_userstatus, "id", "name", $defaultvalue=$userstatusid,$disable=false);
                        ?>
                    </td>
                </tr>


 

                <tr>
                    <td>
                        <?php echo $CAP_clubposition?>
                    </td>   
                    <td>
                        <?php
                        if (isset($_POST['lstclubposition'])){$clubposition_id = $_POST['lstclubposition'];}elseif(isset($_GET['id'])){$clubposition_id = $myuser->clubposition_id;}else{$clubposition_id =gINVALID;}
                        populate_list_array("lstclubposition", $chk_clubposition, "id", "name", $defaultvalue=$clubposition_id,$disable=false);
                        ?>
                    </td>
                </tr>


                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>



                <tr>
                    <td>
                        <?php echo $CAP_email?>
                    </td>   
                    <td>
                        <input  type="text" name="txtemail" value="<?php if(isset($_POST['txtemail'])){echo $_POST['txtemail'];}elseif(isset($_GET['id'])){echo $myuser->emailid;}?>"  >
                    </td>
                </tr>

                <tr>
                    <td>
                        <?php echo $CAP_question ?>
                    </td>   
                    <td>
                         <?php if(isset($_POST['lstquestion'])){ $value = $_POST['lstquestion']; } elseif(isset($_GET['id'])){$value=$myuser->securityquestion_id;}else{ $value = -1;}
                         populate_list_array("lstquestion", $chk_que, "id", "question", $defaultvalue=$value,$disable=false);?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $CAP_answer ?>
                    </td>   
                    <td>
                        <input class="passwd_box"  type="text" name="txtanswer" id="txtanswer" value="<?php if(isset($_POST['txtanswer'])){echo $_POST['txtanswer'];}elseif(isset($_GET['id'])){echo $myuser->answer;}?>" />
                    </td>
                </tr>
                <?php if(isset($image) && $image == "" ){?>
                    <tr>
                    <td>
                        <b><?php echo $CAP_image?></b>
                    </td>
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
                    <input type="submit" name="submit" value="<?php echo $CAP_update?>" onClick="return validate_member_update();" >
                    <input type="Submit" name="submit" value="<?php echo $CAP_delete?>" onClick="return delete_member();">

                    <?php }else{ ?>
                    <input type="submit" name="submit" value="<?php echo$CAP_add?>" onClick="return validate_member_update();">
                    <?php }?>
                    <input type="hidden" name="h_check_id" value="<?php if( isset($_GET['id']) ){echo $myuser->id;}elseif ( isset($_POST['h_id']) ){ echo $myuser->id;}?>">
                    <input type="hidden" name="h_check" value="<?php echo md5("update_user_check"); ?>">                    

                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><br />
                    
                    </td>
                </tr>
            </table>
            </form>
