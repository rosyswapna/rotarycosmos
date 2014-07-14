<?php // prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
?><form  name="frmupdate" id="frmupdate" method="post" action="<?php echo $current_url; ?>" enctype="multipart/form-data">
      <!--<html> --> 
            <table border="0" cellpadding="0" cellspacing="2"  >
                <tr>
                    <td colspan="2" class="page_caption">
                    	Profile : <?php echo  $myuser->username; ?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>    
                    <td><img  src="<?php echo $member_image; ?>" height="80px" ></td>    
                    
                </tr>
                <tr>
                    <td class="table_left_col">First Name</td>   
                    <td><input  type="text" name="txtfirst_name" value="<?php echo $mymember->first_name; ?>"  ></td>
                </tr>
                <tr>
                    <td>Last Name</td>   
                    <td><input  type="text" name="txtlast_name" value="<?php echo $mymember->last_name; ?>"  ></td>
                </tr>

                <tr>
                    <td>Email</td>   
                    <td><input  type="text" name="txtemail" value="<?php echo $myuser->emailid;?>"  ></td>
                </tr>


                <tr>
                    <td>Phone</td>   
                    <td><input  type="text" name="txtphone" value="<?php echo $mymember->phone;?>"  ></td>
                </tr>

                <tr>
                    <td>Mobile</td>   
                    <td><input  type="text" name="txtmobile" value="<?php echo $mymember->mobile;?>"  ></td>
                </tr>

                <tr>
                    <td>Website</td>   
                    <td><input  type="text" name="txtwebsite" value="<?php echo $mymember->website;?>"  ></td>
                </tr>



                <?php if(isset($mymember->image) && $mymember->image == "" ){?>
                 <tr>
                    <td>Photo</td>
                    <td colspan="2"><input type="file" name="fleimage" id="fleimage" size="30" /></td>
                 </tr>
                <?php } ?>
                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Date of Birth</td>   
                    <td><input  type="text" name="txtdob" class="datepicker" value="<?php echo $mymember->dob_formatted;?>"  /></td>
                </tr>


                <tr>
                    <td>Date of Wedding</td>   
                    <td><input  type="text" name="txtdow" class="datepicker" value="<?php echo $mymember->dow_formatted;?>"  /></td>
                </tr>

                <tr>
                    <td>Blood Group</td>   
                    <td><input  type="text" name="txtblood_group" value="<?php echo $mymember->blood_group;?>"  ></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Office Address</td>   
                    <td><input  type="text" name="txtoffice_address1" value="<?php echo $mymember->office_address1;?>"  ></td>
                </tr>
                <tr>
                    <td></td>   
                    <td><input  type="text" name="txtoffice_address2" value="<?php echo $mymember->office_address2;?>"  ></td>
                </tr>
                <tr>
                    <td></td>   
                    <td><input  type="text" name="txtoffice_address3" value="<?php echo $mymember->office_address3;?>"  ></td>
                </tr>
                <tr>
                    <td>City</td>   
                    <td><input  type="text" name="txtoffice_city" value="<?php echo $mymember->office_city;?>"  ></td>
                </tr>
                <tr>
                    <td>Pin</td>   
                    <td><input  type="text" name="txtoffice_pin" value="<?php echo $mymember->office_pin;?>"  ></td>
                </tr>
                <tr>
                    <td>Phone</td>   
                    <td><input  type="text" name="txtoffice_phone" value="<?php echo $mymember->office_phone;?>"  ></td>
                </tr>



               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Residence Address</td>   
                    <td><input  type="text" name="txtresidence_address1" value="<?php echo $mymember->residence_address1;?>"  ></td>
                </tr>
                <tr>
                    <td></td>   
                    <td><input  type="text" name="txtresidence_address2" value="<?php echo $mymember->residence_address2;?>"  ></td>
                </tr>
                <tr>
                    <td></td>   
                    <td><input  type="text" name="txtresidence_address3" value="<?php echo $mymember->residence_address3;?>"  ></td>
                </tr>
                <tr>
                    <td>City</td>   
                    <td><input  type="text" name="txtresidence_city" value="<?php echo $mymember->residence_city;?>"  ></td>
                </tr>
                <tr>
                    <td>Pin</td>   
                    <td><input  type="text" name="txtresidence_pin" value="<?php echo $mymember->residence_pin;?>"  ></td>
                </tr>





               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>




                <tr>
					<td>&nbsp;</td>
                    <td>
                    <input type="submit" name="submit" value="<?php echo $CAP_update?>" onClick="return validate_member_update();" >
						<?php if(isset($mymember->image) && $mymember->image != "" ){?>                    
							<input type="Submit" name="submit" value="<?php echo $CAP_delete?>" onClick="return delete_image();">
						<?php } ?>                  

                    </td>
                </tr>
               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>

    
            </table>
            </form>
