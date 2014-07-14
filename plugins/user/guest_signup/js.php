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


function validate_signup(frm){
    error = "";

    frm = document.getElementById("frmupdate");



    if(frm.txtusername.value==""){
        error = "<?php echo $MSG_empty_username ?>\n";
    }else{
	    pattern = /\w+@\w+\.\w+/;
	     //pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
	    result = pattern.test(Trim(frm.txtusername.value));
	    if( result == false) {
	       error = error+"<?php echo $MSG_invalid_email?>\n";
	    }
	}

    if(frm.txtfirst_name.value==""){
        error = error+"<?php echo $MSG_empty_first_name ?>\n";
    }

    if(frm.txtlast_name.value==""){
        error = error+"<?php echo $MSG_empty_last_name ?>\n";
    }

    if(frm.txtdistrict_number.value==""){
        error = error+"<?php echo $MSG_empty_district_number ?>\n";
    }

    if(frm.txtclub_name.value==""){
        error = error+"<?php echo $MSG_empty_club_name ?>\n";
    }

    if(frm.txtpresident_emailid.value==""){
        error = error+"<?php echo $MSG_empty_president_emailid ?>\n";
    }else{
	    pattern = /\w+@\w+\.\w+/;
	     //pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
	    result = pattern.test(Trim(frm.txtpresident_emailid.value));
	    if( result == false) {
	       error = error+"<?php echo $CAP_president_emailid.', '.$MSG_invalid_email?>\n";
	    }
	}

    if(frm.txtsecretary_emailid.value==""){
        error = error+"<?php echo $MSG_empty_secretary_emailid ?>\n";
    }else{
	    pattern = /\w+@\w+\.\w+/;
	     //pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
	    result = pattern.test(Trim(frm.txtsecretary_emailid.value));
	    if( result == false) {
	       error = error+"<?php echo $CAP_secretary_emailid.', '.$MSG_invalid_email?>\n";
	    }
	}


    if(frm.txtsecurity_code.value==""){
        error = error+"<?php echo $MSG_empty_security_code ?>\n";
    }




    if ( error == "" )
        return true;
    else
    alert(error);
        return false;

}



function createRequestObject_captcha(){
    //declare the variable to hold the object.
    var objRequest;
    //find the browser name
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer")
        objRequest = new ActiveXObject("Microsoft.XMLHTTP");
    else
        objRequest = new XMLHttpRequest();
    //return the object
    return objRequest;
}

var http_captcha = createRequestObject_captcha();

function captcha_reaload(){


//       http_captcha.open("POST", 'captcha_ajax.php?check=captcha');
		http_captcha.open("get", "plugins/user/guest_signup/captcha_ajax.php");
		http_captcha.onreadystatechange = get_captcha_image;
		http_captcha.send(null);

    return false;
}

function get_captcha_image(){
    if(http_captcha.readyState == 4){ //Finished loading the response
        var response = http_captcha.responseText;
        document.getElementById("div_captcha").innerHTML=response;

    }

}




 -->
