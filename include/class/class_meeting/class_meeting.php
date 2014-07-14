<?php
// prmeeting execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Meeting {
    var $connection;
    var $id = gINVALID;
    var $name = "";

	var $date = "" ;
	var $date_formatted  = "" ;
	var $time = "" ;
	var $time_formatted = "" ;
	var $venue = "" ;
	var $description = "" ;
	var $chief_guest = "" ;
	var $sponsor = "" ;
	var $image = "" ;
	var $type = "" ;

	var $status_id  = gINVALID ;
	var $gallery_id  = gINVALID ;
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
    $strSQL = "SELECT id, name, date, time, venue, description, chief_guest, sponsor, image, type,  status_id,  gallery_id,  created,  updated,  record_user_id  FROM meetings WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->date = mysql_result($rsRES,0,'date');
		$this->date_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'date')));
        $this->time = mysql_result($rsRES,0,'time');
		$this->time_formatted = date('H:i', strtotime(mysql_result($rsRES,0,'time')));
        $this->venue = mysql_result($rsRES,0,'venue');
        $this->description = mysql_result($rsRES,0,'description');
        $this->chief_guest = mysql_result($rsRES,0,'chief_guest');
        $this->sponsor = mysql_result($rsRES,0,'sponsor');
        $this->image = mysql_result($rsRES,0,'image');
        $this->type = mysql_result($rsRES,0,'type');
        $this->status_id = mysql_result($rsRES,0,'status_id');
        $this->gallery_id = mysql_result($rsRES,0,'gallery_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This meeting doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id, name, date, time, venue, description, chief_guest, sponsor, image, type, status_id,  gallery_id,  created,  updated,  record_user_id FROM meetings WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->date = mysql_result($rsRES,0,'date');
		$this->date_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'date')));
        $this->time = mysql_result($rsRES,0,'time');
		$this->time_formatted = date('H:i', strtotime(mysql_result($rsRES,0,'time')));
        $this->venue = mysql_result($rsRES,0,'venue');
        $this->description = mysql_result($rsRES,0,'description');
        $this->chief_guest = mysql_result($rsRES,0,'chief_guest');
        $this->sponsor = mysql_result($rsRES,0,'sponsor');
        $this->image = mysql_result($rsRES,0,'image');
        $this->type = mysql_result($rsRES,0,'type');
        $this->status_id = mysql_result($rsRES,0,'status_id');
        $this->gallery_id = mysql_result($rsRES,0,'gallery_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 2;
    $this->error_description="This meeting doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO meetings (name,  date, time, venue, description, chief_guest, sponsor, image, type, status_id,  gallery_id,  created,  updated,  record_user_id) VALUES ('";
    $strSQL .= addslashes(trim($this->name)) . "','";
	$strSQL .= addslashes(trim(date('Y-m-d', strtotime($this->date)))) . "','";
	$strSQL .= addslashes(trim(date('H:i:s', strtotime($this->time)))) . "','";
    $strSQL .= addslashes(trim($this->venue)) . "','";
    $strSQL .= addslashes(trim($this->description)) . "','";
    $strSQL .= addslashes(trim($this->chief_guest)) . "','";
    $strSQL .= addslashes(trim($this->sponsor)) . "','";
    $strSQL .= addslashes(trim($this->image)) . "','";
    $strSQL .= addslashes(trim($this->type)) . "','";
    $strSQL .= addslashes(trim($this->status_id)) . "','";
    $strSQL .= addslashes(trim($this->gallery_id)) . "','";
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
        $this->error_description="Can't insert this meeting";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE meetings SET name = '".addslashes(trim($this->name))."',";
	$strSQL .= " date = '".addslashes(trim(date('Y-m-d', strtotime($this->date))))."',";
	$strSQL .= " time = '".addslashes(trim(date('H:i:s', strtotime($this->time))))."',";
    $strSQL .= " venue = '".addslashes(trim($this->venue))."',";
    $strSQL .= " description = '".addslashes(trim($this->description))."',";
    $strSQL .= " chief_guest = '".addslashes(trim($this->chief_guest))."',";
    $strSQL .= " sponsor = '".addslashes(trim($this->sponsor))."',";
    $strSQL .= " image = '".addslashes(trim($this->image))."',";
    $strSQL .= " type = '".addslashes(trim($this->type))."',";
    $strSQL .= " status_id = '".addslashes(trim($this->status_id))."',";
    $strSQL .= " gallery_id = '".addslashes(trim($this->gallery_id))."',";
    $strSQL .= " created = '".addslashes(trim($this->created))."',";
    $strSQL .= " updated = '".addslashes(trim($this->updated))."' ";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this meeting";
                return false;
            }
    }
}


function exist(){
    $strSQL = "SELECT 1 FROM meetings WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        return true;
    }
    else{
        return false;
    }
}



function get_list_array(){
        $meetings = array();$i=0;
        $strSQL = "SELECT id, name, date, time, venue, description, chief_guest, sponsor, image, type, status_id, gallery_id,  created,  updated,  record_user_id FROM meetings ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id, $name,  $date,  $time,  $venue,  $description,  $chief_guest,  $sponsor,  $image,  $type,  $status_id,  $gallery_id,  $created,  $updated,  $record_user_id) = mysql_fetch_row($rsRES) ){
              $meetings[$i]["id"] = $id;
              $meetings[$i]["name"] = $name;
              $meetings[$i]["date"] = $date;
              $meetings[$i]["date_formatted"] = date('d-m-Y', strtotime($date));
              $meetings[$i]["time"] = $time;
              $meetings[$i]["time_formatted"] = date('H:i:s', strtotime($time));
              $meetings[$i]["venue"] = $venue;
              $meetings[$i]["description"] = $description;
              $meetings[$i]["chief_guest"] = $chief_guest;
              $meetings[$i]["sponsor"] = $sponsor;
              $meetings[$i]["image"] = $image;
              $meetings[$i]["type"] = $type;
              $meetings[$i]["status_id"] = $status_id;
              $meetings[$i]["gallery_id"] = $gallery_id;
              $meetings[$i]["created"] = $created;
              $meetings[$i]["updated"] = $updated;
              $meetings[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $meetings;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list meetings";
        return false;
        }
}
function get_list_array_bylimit($search_string = "",$status_id = gINVALID ,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id, name,  date, time, venue, description, chief_guest, sponsor, image, type, status_id, gallery_id,  created,  updated,  record_user_id FROM meetings WHERE 1 ";
        if ( trim($search_string) != "" ) {
            $str_condition .= " AND CONCAT(name,' ',venue, ' ', description, ' ', chief_guest, ' ', sponsor) LIKE '%" . $search_string . "%'" ;
        }
     
        if ( trim($status_id) != "" && trim($status_id) != gINVALID ) {
            $str_condition .= " AND status_id =  '" . $status_id . "'" ;
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
                $limited_data[$i]["date"] = $row["date"];
                $limited_data[$i]["date_formatted"] = date('d-m-Y', strtotime($row["date"]));
                $limited_data[$i]["time"] = $row["time"];
                $limited_data[$i]["time_formatted"] = date('H:i:s', strtotime($row["time"]));
                $limited_data[$i]["venue"] = $row["venue"];
                $limited_data[$i]["description"] = $row["description"];
                $limited_data[$i]["chief_guest"] = $row["chief_guest"];
                $limited_data[$i]["sponsor"] = $row["sponsor"];
                $limited_data[$i]["image"] = $row["image"];
                $limited_data[$i]["type"] = $row["type"];
                $limited_data[$i]["status_id"] = $row["status_id"];
                $limited_data[$i]["gallery_id"] = $row["gallery_id"];
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
        $strSQL = " DELETE FROM meetings WHERE id = '".$this->id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
        }
        else{
            $this->error_number = 6;
            $this->error_description="Can't deltete this Meeting";
            return  false;
        }
    }
}



    function delete_image(){
		$this->get_detail();
		$id = $this->id;
		$image = $this->image;

        $strSQL = "UPDATE meetings SET image='' WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
			if ( $image != "" ) {
				$ext = explode('.', $image);
				$ext = $ext[count($ext)-1];
				$image_file = ROOT_PATH.NEWS_DIR . $id . '.' . $ext;
				eval("\$image_file = \"$image_file\";");
				unlink($image_file);
			}
            return true;
        }else{
            return false;
            $this->error_description = "Image not deleted";
         }
    }







}
?>
