<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class UserStatus {
    var $connection;
    var $id = gINVALID;
    var $name = "";
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

function __construct($connection){
    $this->connection = $connection;
}
function get_id(){
    $strSQL = "SELECT id,name FROM userstatuses WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This userstatus doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id,name FROM userstatuses WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        return $this->id;
    }
    else{
    $this->error_number = 2;
    $this->error_description="This userstatus doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO userstatuses (name) VALUES ('";
    $strSQL .= addslashes(trim($this->name)) . "')";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_affected_rows($this->connection) > 0 ) {
        $this->id = mysql_insert_id();
        return $this->id;
    }
    else{
        $this->error_number = 3;
        $this->error_description="Can't insert this userstatus";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE userstatuses SET name = '".addslashes(trim($this->name))."'";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this userstatus";
                return false;
            }
    }
}

function get_list_array(){
        $userstatuses = array();$i=0;
        $strSQL = "SELECT id,name FROM userstatuses ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id,$name) = mysql_fetch_row($rsRES) ){
              $userstatuses[$i]["id"] = $id;
              $userstatuses[$i]["name"] = $name;
              $i++;
        }
        return $userstatuses;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list userstatuses";
        return false;
        }
}
function get_list_array_bylimit($name=-1,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id,name FROM userstatuses WHERE 1 ";
        if ( $name != "" && $name != -1 ) {
            if (trim($str_condition) =="") {
                $str_condition = "  id  = '" . $name . "'" ;
            }else{
                $str_condition .= " AND id  = '" . $name . "'" ;
            } 
        }
        if (trim($str_condition) !="") {
            $strSQL .= " AND  " . $str_condition . "  ";
        }
        $strSQL .= " ORDER BY name ";
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
                $i++;
            }
            return $limited_data;
        }else{
            $this->error_number = 5;
            $this->error_description="Can't get limited data";
            return false;
        }
}
}
?>
