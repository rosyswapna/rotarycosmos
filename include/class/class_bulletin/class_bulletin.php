<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Bulletin {
    var $connection;
    var $id = gINVALID;
    var $name = "";

    var $frequency = "";
    var $url = "";
    var $user_id = gINVALID;
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
    $strSQL = "SELECT id, name, frequency, url , user_id,  created,  updated,  record_user_id  FROM bulletins WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->frequency = mysql_result($rsRES,0,'frequency');
        $this->url = mysql_result($rsRES,0,'url');
        $this->user_id = mysql_result($rsRES,0,'user_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This bulletin doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id,name, frequency, url , user_id, created,  updated,  record_user_id FROM bulletins WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->frequency = mysql_result($rsRES,0,'frequency');
        $this->url = mysql_result($rsRES,0,'url');
        $this->user_id = mysql_result($rsRES,0,'user_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 2;
    $this->error_description="This bulletin doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO bulletins (name, frequency, url , user_id,  created,  updated,  record_user_id) VALUES ('";
    $strSQL .= addslashes(trim($this->name)) . "','";
    $strSQL .= addslashes(trim($this->frequency)) . "','";
    $strSQL .= addslashes(trim($this->url)) . "','";
    $strSQL .= addslashes(trim($this->user_id)) . "','";
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
        $this->error_description="Can't insert this bulletin";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE bulletins SET name = '".addslashes(trim($this->name))."',";
    $strSQL .= " frequency = '".addslashes(trim($this->frequency))."',";
    $strSQL .= " url = '".addslashes(trim($this->url))."',";
    $strSQL .= " user_id = '".addslashes(trim($this->user_id))."',";
    $strSQL .= " created = '".addslashes(trim($this->created))."',";
    $strSQL .= " updated = '".addslashes(trim($this->updated))."' ";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this bulletin";
                return false;
            }
    }
}

function exist(){
    $strSQL = "SELECT 1 FROM bulletins WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        return true;
    }
    else{
        return false;
    }
}



function get_list_array(){
        $bulletins = array();$i=0;
        $strSQL = "SELECT id, name, frequency, url , user_id,  created,  updated,  record_user_id FROM bulletins ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id, $name, $frequency, $url , $user_id,  $created,  $updated,  $record_user_id) = mysql_fetch_row($rsRES) ){
              $bulletins[$i]["id"] = $id;
              $bulletins[$i]["name"] = $name;
              $bulletins[$i]["frequency"] = $frequency;
              $bulletins[$i]["url"] = $url;
              $bulletins[$i]["user_id"] = $user_id;
              $bulletins[$i]["created"] = $created;
              $bulletins[$i]["updated"] = $updated;
              $bulletins[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $bulletins;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list bulletins";
        return false;
        }
}
function get_list_array_bylimit($search_string = "",$user_id = gINVALID ,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id, name,  frequency, url , user_id, created, updated,  record_user_id FROM bulletins WHERE 1 ";
        if ( trim($search_string) != "" ) {
            $str_condition .= " AND CONCAT(name,' ',frequency, ' ', url) LIKE '%" . $search_string . "%'" ;
        }
     
        if ( trim($user_id) != "" && trim($user_id) != gINVALID ) {
            $str_condition .= " AND user_id =  '" . $user_id . "'" ;
        }
     
            $strSQL .=  $str_condition . "  ORDER BY name";
        
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
                $limited_data[$i]["name"] = $row["name"];
                $limited_data[$i]["frequency"] = $row["frequency"];
                $limited_data[$i]["url"] = $row["url"];
                $limited_data[$i]["user_id"] = $row["user_id"];
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
        $strSQL = " DELETE FROM bulletins WHERE id = '".$this->id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
        }
        else{
            $this->error_number = 6;
            $this->error_description="Can't deltete this Bulletin";
            return  false;
        }
    }
}

}



?>
