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
                    <td class="table_left_col">First Name : </td>   
                    <td> <?php echo $mymember->first_name; ?></td>
                </tr>
                <tr>
                    <td>Last Name : </td>   
                    <td> <?php echo $mymember->last_name; ?></td>
                </tr>

                <tr>
                    <td>Email : </td>   
                    <td> <?php echo $myuser->emailid;?></td>
                </tr>


                <tr>
                    <td>Phone : </td>   
                    <td> <?php echo $mymember->phone;?></td>
                </tr>

                <tr>
                    <td>Mobile : </td>   
                    <td> <?php echo $mymember->mobile;?></td>
                </tr>

                <tr>
                    <td>Website : </td>   
                    <td> <?php echo $mymember->website;?></td>
                </tr>



                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Date of Birth : </td>   
                    <td> <?php echo $mymember->dob_formatted;?></td>
                </tr>


                <tr>
                    <td>Date of Wedding : </td>   
                    <td> <?php echo $mymember->dow_formatted;?></td>
                </tr>

                <tr>
                    <td>Blood Group : </td>   
                    <td> <?php echo $mymember->blood_group;?></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Office Address : </td>   
                    <td> <?php echo $mymember->office_address1;?></td>
                </tr>
                <tr>
                    <td></td>   
                    <td> <?php echo $mymember->office_address2;?></td>
                </tr>
                <tr>
                    <td></td>   
                    <td> <?php echo $mymember->office_address3;?></td>
                </tr>
                <tr>
                    <td>City : </td>   
                    <td> <?php echo $mymember->office_city;?></td>
                </tr>
                <tr>
                    <td>Pin : </td>   
                    <td> <?php echo $mymember->office_pin;?></td>
                </tr>
                <tr>
                    <td>Phone : </td>   
                    <td> <?php echo $mymember->office_phone;?></td>
                </tr>



               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td>Residence Address : </td>   
                    <td> <?php echo $mymember->residence_address1;?></td>
                </tr>
                <tr>
                    <td></td>   
                    <td> <?php echo $mymember->residence_address2;?></td>
                </tr>
                <tr>
                    <td></td>   
                    <td> <?php echo $mymember->residence_address3;?></td>
                </tr>
                <tr>
                    <td>City : </td>   
                    <td> <?php echo $mymember->residence_city;?></td>
                </tr>
                <tr>
                    <td>Pin : </td>   
                    <td> <?php echo $mymember->residence_pin;?></td>
                </tr>





               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>


               <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>

    
            </table>
            </form>
