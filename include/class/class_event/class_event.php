<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Event {
    var $connection;
    var $id = gINVALID;
    var $name = "";

	var $date_from  = "" ;
	var $date_from_formatted  = "" ;
	var $date_to  = "" ;
	var $date_to_formatted  = "" ;
	var $time_from  = "" ;
	var $time_from_formatted  = "" ;
	var $time_to_formatted  = "" ;

	var $title  = "" ;
	var $description  = "" ;
	var $image  = "" ;
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
    $strSQL = "SELECT id, name, date_from ,date_to ,time_from ,time_to ,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id  FROM events WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->date_from = mysql_result($rsRES,0,'date_from');
        $this->date_to = mysql_result($rsRES,0,'date_to');
        $this->time_from = mysql_result($rsRES,0,'time_from');
        $this->time_to = mysql_result($rsRES,0,'time_to');

		$this->date_from_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'date_from')));
		$this->date_to_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'date_to')));
		$this->time_from_formatted = date('H:i', strtotime(mysql_result($rsRES,0,'time_from')));
		$this->time_to_formatted = date('H:i', strtotime(mysql_result($rsRES,0,'time_to')));

        $this->title = mysql_result($rsRES,0,'title');
        $this->description = mysql_result($rsRES,0,'description');
        $this->image = mysql_result($rsRES,0,'image');
        $this->status_id = mysql_result($rsRES,0,'status_id');
        $this->gallery_id = mysql_result($rsRES,0,'gallery_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This event doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id, name, date_from ,date_to ,time_from ,time_to ,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM events WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->date_from = mysql_result($rsRES,0,'date_from');
        $this->date_to = mysql_result($rsRES,0,'date_to');
        $this->time_from = mysql_result($rsRES,0,'time_from');
        $this->time_to = mysql_result($rsRES,0,'time_to');


		$this->date_from_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'date_from')));
		$this->date_to_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'date_to')));
		$this->time_from_formatted = date('H:i', strtotime(mysql_result($rsRES,0,'time_from')));
		$this->time_to_formatted = date('H:i', strtotime(mysql_result($rsRES,0,'time_to')));

        $this->title = mysql_result($rsRES,0,'title');
        $this->description = mysql_result($rsRES,0,'description');
        $this->image = mysql_result($rsRES,0,'image');
        $this->status_id = mysql_result($rsRES,0,'status_id');
        $this->gallery_id = mysql_result($rsRES,0,'gallery_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 2;
    $this->error_description="This event doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO events (name, date_from ,date_to ,time_from ,time_to ,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id) VALUES ('";
    $strSQL .= addslashes(trim($this->name)) . "','";
    $strSQL .= addslashes(trim(date('Y-m-d', strtotime($this->date_from)))) . "','";
    $strSQL .= addslashes(trim(date('Y-m-d', strtotime($this->date_to)))) . "','";
    $strSQL .= addslashes(trim(date('H:i:s', strtotime($this->time_from)))) . "','";
    $strSQL .= addslashes(trim(date('H:i:s', strtotime($this->time_to)))) . "','";
    $strSQL .= addslashes(trim($this->title)) . "','";
    $strSQL .= addslashes(trim($this->description)) . "','";
    $strSQL .= addslashes(trim($this->image)) . "','";
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
        $this->error_description="Can't insert this event";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE events SET name = '".addslashes(trim($this->name))."',";
    $strSQL .= " date_from = '".addslashes(trim(date('Y-m-d', strtotime($this->date_from))))."',";
    $strSQL .= " date_to = '".addslashes(trim(date('Y-m-d', strtotime($this->date_to))))."',";
    $strSQL .= " time_from = '".addslashes(trim(date('H:i:s', strtotime($this->time_from))))."',";
    $strSQL .= " time_to = '".addslashes(trim(date('H:i:s', strtotime($this->time_to))))."',";
    $strSQL .= " title = '".addslashes(trim($this->title))."',";
    $strSQL .= " description = '".addslashes(trim($this->description))."',";
    $strSQL .= " image = '".addslashes(trim($this->image))."',";
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
                $this->error_description="Can't update this event";
                return false;
            }
    }
}


function exist(){
    $strSQL = "SELECT 1 FROM events WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        return true;
    }
    else{
        return false;
    }
}


function get_list_array(){
        $events = array();$i=0;
        $strSQL = "SELECT id, name, date_from ,date_to ,time_from ,time_to ,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM events ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id, $name, $date_from ,$date_to ,$time_from ,$time_to ,  $title,  $description,  $image,  $status_id,  $gallery_id,  $created,  $updated,  $record_user_id) = mysql_fetch_row($rsRES) ){
              $events[$i]["id"] = $id;
              $events[$i]["name"] = $name;
              $events[$i]["date_from"] = $date_from;
              $events[$i]["date_to"] = $date_to;
              $events[$i]["time_from"] = $time_from;
              $events[$i]["time_to"] = $time_to;
			  $events[$i]["date_from_formatted"] = date('d-m-Y', strtotime($date_from));
			  $events[$i]["date_to_formatted"] = date('d-m-Y', strtotime($date_to));
			  $events[$i]["time_from_formatted"] = date('H:i:s', strtotime($time_from));		  
			  $events[$i]["time_to_formatted"] = date('H:i:s', strtotime($time_to));		  
              $events[$i]["title"] = $title;
              $events[$i]["description"] = $description;
              $events[$i]["image"] = $image;
              $events[$i]["status_id"] = $status_id;
              $events[$i]["gallery_id"] = $gallery_id;
              $events[$i]["created"] = $created;
              $events[$i]["updated"] = $updated;
              $events[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $events;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list events";
        return false;
        }
}
function get_list_array_bylimit($search_string = "",$status_id = gINVALID ,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id, name, date_from, date_to, time_from, time_to, title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM events WHERE 1 ";
        if ( trim($search_string) != "" ) {
            $str_condition .= " AND CONCAT(name,' ',title, ' ', description) LIKE '%" . $search_string . "%'" ;
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
                $limited_data[$i]["date_from"] = $row["date_from"];
                $limited_data[$i]["date_to"] = $row["date_to"];
                $limited_data[$i]["time_from"] = $row["time_from"];
                $limited_data[$i]["time_to"] = $row["time_to"];
                $limited_data[$i]["date_from_formatted"] = date('d-m-Y', strtotime($row["date_from"]));
                $limited_data[$i]["date_to_formatted"] = date('d-m-Y', strtotime($row["date_to"]));
                $limited_data[$i]["time_from_formatted"] = date('H:i:s', strtotime($row["time_from"]));
                $limited_data[$i]["time_to_formatted"] = date('H:i:s', strtotime($row["time_to"]));
                $limited_data[$i]["title"] = $row["title"];
                $limited_data[$i]["description"] = $row["description"];
                $limited_data[$i]["image"] = $row["image"];
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
        $strSQL = " DELETE FROM events WHERE id = '".$this->id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
        }
        else{
            $this->error_number = 6;
            $this->error_description="Can't deltete this Event";
            return  false;
        }
    }
}



    function delete_image(){
		$this->get_detail();
		$id = $this->id;
		$image = $this->image;

        $strSQL = "UPDATE events SET image='' WHERE id = ".$this->id;
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
