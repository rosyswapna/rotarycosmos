<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class GalleryImage {
    var $connection;
    var $id = gINVALID;
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
    $strSQL = "SELECT id, title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id  FROM gallery_images WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
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
    $this->error_description="This Record doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id, title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM gallery_images WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
		$this->date_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'date')));
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
    $this->error_description="This gallery_images doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
		$strSQL = "INSERT INTO gallery_images (name, date,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id) VALUES ('";
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
		    $this->error_description="Can't insert this Record";
		    return false;
		}
    }
    elseif($this->id > 0 ) {

		$strSQL = "UPDATE gallery_images SET title = '".addslashes(trim($this->title))."',";
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
		            $this->error_description="Can't update this Record";
		            return false;
		        }
    }
}

function exist(){
    $strSQL = "SELECT 1 FROM gallery_images WHERE title = '".$this->title."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        return true;
    }
    else{
        return false;
    }
}




function get_list_array(){
        $gallery_images = array();$i=0;
        $strSQL = "SELECT id, title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM gallery_images ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id, $name, $date,  $title,  $description,  $image,  $status_id,  $gallery_id,  $created,  $updated,  $record_user_id) = mysql_fetch_row($rsRES) ){
              $gallery_images[$i]["id"] = $id;
              $gallery_images[$i]["title"] = $title;
              $gallery_images[$i]["description"] = $description;
              $gallery_images[$i]["image"] = $image;
              $gallery_images[$i]["status_id"] = $status_id;
              $gallery_images[$i]["gallery_id"] = $gallery_id;
              $gallery_images[$i]["created"] = $created;
              $gallery_images[$i]["updated"] = $updated;
              $gallery_images[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $gallery_images;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list Records";
        return false;
        }
}
function get_list_array_bylimit($search_string = "",$status_id = gINVALID ,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id, title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM gallery_images WHERE 1 ";
        if ( trim($search_string) != "" ) {
            $str_condition .= " AND CONCAT(title, ' ', description) LIKE '%" . $search_string . "%'" ;
        }
     
        if ( trim($status_id) != "" && trim($status_id) != gINVALID ) {
            $str_condition .= " AND status_id =  '" . $status_id . "'" ;
        }
     
            $strSQL .=  $str_condition . "  ORDER BY id";
        
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
		    $strSQL = " DELETE FROM gallery_images WHERE id = '".$this->id."'";
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

    function delete_image(){
		$this->get_detail();
		$id = $this->id;
		$image = $this->image;

        $strSQL = "UPDATE gallery_images SET image='' WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
			if ( $image != "" ) {
				$ext = explode('.', $image);
				$ext = $ext[count($ext)-1];
				$image_file = ROOT_PATH.gallery_images_DIR . $id . '.' . $ext;
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
