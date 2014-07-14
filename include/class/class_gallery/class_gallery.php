<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Gallery {
    var $connection;
    var $id = gINVALID;
    var $name = "";
	var $title  = "" ;
	var $description  = "" ;
	var $gallery  = "" ;
	var $status_id  = gINVALID ;
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
    $strSQL = "SELECT id, name, title,  description,  status_id,  created,  updated,  record_user_id  FROM galleries WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->title = mysql_result($rsRES,0,'title');
        $this->description = mysql_result($rsRES,0,'description');
        $this->status_id = mysql_result($rsRES,0,'status_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 1;
    $this->error_description="This gallery doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id,name, title,  description,  status_id,  created,  updated,  record_user_id FROM galleries WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->title = mysql_result($rsRES,0,'title');
        $this->description = mysql_result($rsRES,0,'description');
        $this->status_id = mysql_result($rsRES,0,'status_id');
        $this->created = mysql_result($rsRES,0,'created');
        $this->updated = mysql_result($rsRES,0,'updated');
        $this->record_user_id = mysql_result($rsRES,0,'record_user_id');
        return $this->id;
    }
    else{
    $this->error_number = 2;
    $this->error_description="This gallery doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
    $strSQL = "INSERT INTO galleries (name, title,  description, status_id, created,  updated,  record_user_id) VALUES ('";
    $strSQL .= addslashes(trim($this->name)) . "','";
    $strSQL .= addslashes(trim($this->title)) . "','";
    $strSQL .= addslashes(trim($this->description)) . "','";
    $strSQL .= addslashes(trim($this->status_id)) . "','";
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
        $this->error_description="Can't insert this gallery";
        return false;
    }
    }
    elseif($this->id > 0 ) {
    $strSQL = "UPDATE galleries SET name = '".addslashes(trim($this->name))."',";
    $strSQL .= " title = '".addslashes(trim($this->title))."',";
    $strSQL .= " description = '".addslashes(trim($this->description))."',";
    $strSQL .= " status_id = '".addslashes(trim($this->status_id))."',";
    $strSQL .= " created = '".addslashes(trim($this->created))."',";
    $strSQL .= " updated = '".addslashes(trim($this->updated))."' ";
    $strSQL .= " WHERE id = ".$this->id;
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_number = 3;
                $this->error_description="Can't update this gallery";
                return false;
            }
    }
}


function exist(){
    $strSQL = "SELECT 1 FROM galleries WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        return true;
    }
    else{
        return false;
    }
}



function get_list_array(){
        $galleries = array();$i=0;
        $strSQL = "SELECT id, name, title,  description,   status_id,  created,  updated,  record_user_id FROM galleries ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id, $name, $title,  $description,  $status_id,  $gallery_id,  $created,  $updated,  $record_user_id) = mysql_fetch_row($rsRES) ){
              $galleries[$i]["id"] = $id;
              $galleries[$i]["name"] = $name;
              $galleries[$i]["title"] = $title;
              $galleries[$i]["description"] = $description;
              $galleries[$i]["status_id"] = $status_id;
              $galleries[$i]["created"] = $created;
              $galleries[$i]["updated"] = $updated;
              $galleries[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $galleries;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list gallery";
        return false;
        }
}
function get_list_array_bylimit($search_string = "",$status_id = gINVALID ,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id,name,  title,  description,  status_id,  created,  updated,  record_user_id FROM galleries WHERE 1 ";
        if ( trim($search_string) != "" ) {
            $str_condition .= " AND CONCAT(name,' ',title, ' ', description ) LIKE '%" . $search_string . "%'" ;
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
                $limited_data[$i]["title"] = $row["title"];
                $limited_data[$i]["description"] = $row["description"];
                $limited_data[$i]["status_id"] = $row["status_id"];
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
		    $strSQL = " DELETE FROM galleries WHERE id = '".$this->id."'";
		    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
		    if ( mysql_affected_rows($this->connection) > 0 ) {
		        return true;
		    }
		    else{
		        $this->error_number = 6;
		        $this->error_description="Can't deltete this Galleries";
		        return  false;
		    }
		}
	}

    function delete_image(){
		$this->get_detail();
		$id = $this->id;
		$image = $this->image;

        $strSQL = "UPDATE galleries SET image='' WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
			if ( $image != "" ) {
				$ext = explode('.', $image);
				$ext = $ext[count($ext)-1];
				$image_file = ROOT_PATH.GALLERY_DIR . $id . '.' . $ext;
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
