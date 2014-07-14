<?php 

    ?>
        <!-- form start-->
            <form  target="_self" method="post" action="<?php echo $current_url?>" name="frmchange_passwd">
                <table border="0" cellpadding="0" cellspacing="2"  >
                <tr>
                    <td colspan="2" class="page_caption" ><?php echo $CAP_page_caption?></td>
                </tr>
                <tr>
                    <td colspan="2" class="errormessage" >
                       <?php if(isset($myuser)) { echo $myuser->error_description; echo $passwd_error ; }?>
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>    
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><?php echo $CAP_email ?></td>
                    <td><input type="text" name="username" id="username" value="" ></td>
                </tr>
                
                <tr>
					<td>&nbsp;</td>
                    <td>
                    <input value="<?php echo $CAP_change ?>" type="submit" name="submit" />
                    </td>
                </tr>
                </table>
            </form>

            <!-- form end-->
    <script language="javascript" type="text/javascript">
    //<!--
            document.getElementById("email").focus();
   //-->
    </script>   
