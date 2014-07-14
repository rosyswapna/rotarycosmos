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


function validate_update(frm){
    error = "";

    frm = document.getElementById("frmupdate");

    if(frm.txtname.value==""){
        error = "Empty Name\n";
    }


    if ( Trim(frm.lstuser.value) == -1 ) {
        error+= "User not selected\n";
    }
    if ( error == "" )
        return true;
    else
    alert(error);
        return false;
}


function confirm_delete(){
    var ans = confirm("This will delete Gallery Permanently");
    if ( ans == true ){
    	return true;
    }else{
        return false;
    }

}


function confirm_delete_image(){
    var ans = confirm("This will delete Image");
    if ( ans == true ){
    	return true;
    }else{
        return false;
    }

}

 -->
