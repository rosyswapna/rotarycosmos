<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class MemberRelationDetail {
    var $connection;
    var $id = gINVALID;
    var $user_id = gINVALID;
    var $memberrelation_id = gINVALID;

    var $first_name = "";
    var $last_name = "";

    var $dob = "";
    var $blood_group = "";

	var $created  = "" ;
	var $updated  = "" ;
	var $record_user_id= "" ;

    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

function __construct($connection){
    $this->connection = $connection;
}
function get_id(){
    $strSQL = "SELECT id, user_id, memberrelation_id, first_name, las_name,  dob, blood_group , created,  updated,  record_user_id  FROM memberrelationdetails WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->user_id = mysql_result($rsRES,0,'user_id');
        $this->memberrelation_id = mysql_result($rsRES,0,'memberrelation_id');

        $this->first_name = mysql_result($rsRES,0,'first_name');
        $this->last_name = mysql_result($rsRES,0,'last_name');

        $this->dob = mysql_result($rsRES,0,'dob');
        $this->blood_group = mysql_result($rsRES,0,'blood_group');

        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This Record doesn't exist";
    return false;
    }
}

function get_detail(){
    $strSQL = "SELECT id, user_id, memberrelation_id, first_name, las_name,  dob, blood_group , created,  updated,  record_user_id FROM memberrelationdetails WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->user_id = mysql_result($rsRES,0,'user_id');
        $this->memberrelation_id = mysql_result($rsRES,0,'memberrelation_id');

        $this->first_name = mysql_result($rsRES,0,'first_name');
        $this->last_name = mysql_result($rsRES,0,'last_name');

        $this->dob = mysql_result($rsRES,0,'dob');
        $this->blood_group = mysql_result($rsRES,0,'blood_group');

        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 2;
    $this->error_description="This Record doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO memberrelationdetails ( user_id, memberrelation_id, first_name, las_name,  dob, blood_group ,  created,  updated,  record_user_id) VALUES ('";
	$strSQL .= addslashes(trim($this->user_id)) . "','";
	$strSQL .= addslashes(trim($this->memberrelation_id)) . "','";
    $strSQL .= addslashes(trim($this->first_name)) . "','";
    $strSQL .= addslashes(trim($this->last_name)) . "','";
    $strSQL .= addslashes(trim($this->dob)) . "','";
    $strSQL .= addslashes(trim($this->blood_group)) . "','";
    $strSQL .= addslashes(trim($this->created)) . "','";
    $strSQL .= addslashes(trim($this->updated)) . "','";
    $strSQL .= addslashes(trim($this->record_user_id)) . "')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_affected_rows($this->connection) > 0 ) {
        $this->id = mysql_insert_id();
        return $this->id;
    }
    else{
        $this->error_number = 3;
        $this->error_description="Can't insert this Record";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE memberrelationdetails SET user_id = '".addslashes(trim($this->user_id))."',";
    $strSQL .= " memberrelation_id = '".addslashes(trim($this->memberrelation_id))."',";
    $strSQL .= " first_name = '".addslashes(trim($this->first_name))."',";
    $strSQL .= " last_name = '".addslashes(trim($this->last_name))."',";
    $strSQL .= " dob = '".addslashes(trim($this->dob))."',";
    $strSQL .= " blood_group = '".addslashes(trim($this->blood_group))."',";
    $strSQL .= " created = '".addslashes(trim($this->created))."',";
    $strSQL .= " updated = '".addslashes(trim($this->updated))."' ";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this Record";
                return false;
            }
    }
}



function get_list_array(){
        $memberrelationdetails = array();$i=0;
        $strSQL = "SELECT id, user_id, memberrelation_id, first_name, las_name,  dob, blood_group ,  created,  updated,  record_user_id FROM memberrelationdetails ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id, $user_id, $memberrelation_id, $first_name, $las_name,  $dob, $blood_group ,  $updated,  $record_user_id) = mysql_fetch_row($rsRES) ){
              $memberrelationdetails[$i]["id"] = $id;
              $memberrelationdetails[$i]["user_id"] = $user_id;
              $memberrelationdetails[$i]["memberrelation_id"] = $memberrelation_id;
              $memberrelationdetails[$i]["first_name"] = $first_name;
              $memberrelationdetails[$i]["last_name"] = $last_name;
              $memberrelationdetails[$i]["dob"] = $dob;
              $memberrelationdetails[$i]["blood_group"] = $blood_group;
              $memberrelationdetails[$i]["created"] = $created;
              $memberrelationdetails[$i]["updated"] = $updated;
              $memberrelationdetails[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $memberrelationdetails;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list Records";
        return false;
        }
}
function get_list_array_bylimit($search_string = "",$user_id = gINVALID ,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id, user_id, memberrelation_id, first_name, las_name,  dob, blood_group , created, updated,  record_user_id FROM memberrelationdetails WHERE 1 ";
        if ( trim($search_string) != "" ) {
            $str_condition .= " AND CONCAT(first_name,' ',last_name, ' ', blood_group) LIKE '%" . $search_string . "%'" ;
        }
     
        if ( trim($user_id) != "" && trim($user_id) != gINVALID ) {
            $str_condition .= " AND user_id =  '" . $user_id . "'" ;
        }
     
            $strSQL .=  $str_condition . "  ORDER BY first_name";
        
        //taking limit  result of that in $rsRES .$start_record is starting record of a page.$max_records num of records in that page
        $strSQL_limit = sprintf("%s LIMIT %d, %d", $strSQL, $start_record, $max_records);
        $rsRES = mysql_query($strSQL_limit, $this->connection) or die(mysql_error(). $strSQL_limit);

        if ( mysql_num_rows($rsRES) > 0 ){

            //without limit  , result of that in $all_rs
            if (trim($this->total_records)!="" && $this->total_records > 0) {
                
            } else {
                $all_rs = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL_limit); 
                $this->total_records = mysql_num_rows($all_rs);
            }
    
            while ( $row = mysql_fetch_assoc($rsRES) ){
                $limited_data[$i]["id"] = $row["id"];
                $limited_data[$i]["user_id"] = $row["user_id"];
                $limited_data[$i]["memberrelation_id"] = $row["memberrelation_id"];
                $limited_data[$i]["first_name"] = $row["first_name"];
                $limited_data[$i]["last_name"] = $row["last_name"];
                $limited_data[$i]["dob"] = $row["dob"];
                $limited_data[$i]["blood_group"] = $row["blood_group"];
                $limited_data[$i]["created"] = $row["created"];
                $limited_data[$i]["updated"] = $row["updated"];
                $limited_data[$i]["record_user_id"] = $row["record_user_id"];
                $i++;
            }
            return $limited_data;
        }else{
            $this->error_number = 5;
            $this->error_description="Can't get limited data";
            return false;
        }
}

function delete(){
    if($this->id > 0 ) {
        $strSQL = " DELETE FROM memberrelationdetails WHERE id = '".$this->id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
        }
        else{
            $this->error_number = 6;
            $this->error_description="Can't deltete this Record";
            return  false;
        }
    }
}

}



?>
