<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
?><form  name="frmupdate" id="frmupdate" method="post" action="<?php echo $current_url; ?>" enctype="multipart/form-data">
      <!--<html> --> 
            <table border="0" cellpadding="0" cellspacing="2"  >
                <tr>
                    <td colspan="2" class="page_caption">
                    <?php echo $CAP_page_caption ?>
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
                    <td><?php echo$CAP_username; ?></td>   
                    <td><input type="text" name="txtusername" value=""  ></td>
                </tr>


                <tr>
                    <td><?php echo$CAP_first_name; ?></td>   
                    <td><input type="text" name="txtfirst_name" value=""  ></td>
                </tr>

                <tr>
                    <td><?php echo$CAP_last_name; ?></td>   
                    <td><input type="text" name="txtlast_name" value=""  ></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td><?php echo$CAP_district_number; ?></td>   
                    <td><input type="text" name="txtdistrict_number" value=""  ></td>
                </tr>

                <tr>
                    <td><?php echo$CAP_club_name; ?></td>   
                    <td><input type="text" name="txtclub_name" value=""  ></td>
                </tr>

                <tr>
                    <td><?php echo$CAP_president_emailid; ?></td>   
                    <td><input type="text" name="txtpresident_emailid" value=""  ></td>
                </tr>

                <tr>
                    <td><?php echo$CAP_secretary_emailid; ?></td>   
                    <td><input type="text" name="txtsecretary_emailid" value=""  ></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><label><?php echo $CAP_security_code; ?></label></td>    
                    <td><input id="txtsecurity_code" name="txtsecurity_code" type="text" /></td>
                </tr>
                <tr>
                    <td><br/><input type="image" alt="Reload" title="Try another?" src="images/captcha/reload.gif"  style="cursor:pointer;" onclick="return captcha_reaload();" /></td>    
                    <td><?php echo $CAP_security_code_message; ?>
<div id="div_captcha" style="width:200px;height:40px;"><img alt="." src="captcha.php?width=120&height=40&characters=5" /></div></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
					<td>&nbsp;</td>
                    <td><br />

                    <input type="submit" name="submit" value="<?php echo$CAP_add?>" onClick="return validate_signup();">

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
