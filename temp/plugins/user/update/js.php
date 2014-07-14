<!--
function Trim(strInput) {
    while (true) {
        if (strInput.substring(0, 1) != " ")
            break;
        strInput = strInput.substring(1, strInput.length);
    }
    while (true) {
        if (strInput.substring(strInput.length - 1, strInput.length) != " ")
            break;
        strInput = strInput.substring(0, strInput.length - 1);
    }
   return strInput;
}


function validate_member_update(frm){
    error = "";

    frm = document.getElementById("frmupdate");

    if(frm.txtusername.value==""){
        error = "<?php echo $MSG_empty_username ?>\n";
    }else{
	    pattern = /\w+@\w+\.\w+/;
	     //pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
	    result = pattern.test(Trim(frm.txtusername.value));
	    if( result == false) {
	       error = "<?php echo $MSG_invalid_username?>\n";
	    }
	}

    if(frm.txtemail.value==""){
        error = "<?php echo $MSG_empty_email ?>\n";
    }else{
	    pattern = /\w+@\w+\.\w+/;
	     //pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
	    result = pattern.test(Trim(frm.txtemail.value));
	    if( result == false) {
	       error = "<?php echo $MSG_invalid_email?>\n";
	    }
	}


    if (frm.h_check_id.value == ""){
		if (Trim(frm.txtpassword.value) == "" && Trim(frm.txtrepassword.value) == "" ) {
		    error += "<?php echo $MSG_empty_password ?>\n";
		}
		else if( Trim(frm.txtpassword.value) != Trim(frm.txtrepassword.value) ){
		        error += "<?php echo $MSG_unmatching_passwords ?>\n";
		}
		else{
		         pattern = /[a-zA-Z0-9_-]{5,}/;
		         result = pattern.test(Trim(frm.txtrepassword.value));
		         if(result == false)
		         error += "<?php echo $MSG_length_password ?>\n" ;
		}
    }





        if(frm.lstquestion.value==-1){
            error += "<?php echo $MSG_empty_question ?>\n";
        }
        else if(frm.txtanswer.value==""){
            error += "<?php echo $MSG_empty_answer ?>\n";
        }



    if ( Trim(frm.lstuserstatus.value) == -1 ) {
        error+= "<?php echo $MSG_empty_userstatus?>\n";
    }
    if ( error == "" )
        return true;
    else
    alert(error);
        return false;
}


function delete_member(){
    var ans = confirm("This will delete User Permanently");
    if ( ans == true ){
    	return true;
    }else{
        return false;
    }

}



 -->
