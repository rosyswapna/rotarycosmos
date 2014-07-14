<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class News {
    var $connection;
    var $id = gINVALID;
    var $name = "";

	var $date  = "" ;
	var $date_formatted  = "" ;
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
    $strSQL = "SELECT id, name, date,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id  FROM news WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->date = mysql_result($rsRES,0,'date');
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
    $this->error_number = 1;
    $this->error_description="This news doesn't exist";
    return false;
    }
}
function get_detail(){
    $strSQL = "SELECT id,name, date,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM news WHERE id = '".$this->id."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        $this->id = mysql_result($rsRES,0,'id');
        $this->name = mysql_result($rsRES,0,'name');
        $this->date = mysql_result($rsRES,0,'date');
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
    $this->error_description="This news doesn't exist";
    return false;
    }
}
function update(){
    if ( $this->id == "" || $this->id == gINVALID) {
		$strSQL = "INSERT INTO news (name, date,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id) VALUES ('";
		$strSQL .= addslashes(trim($this->name)) . "','";
		$strSQL .= addslashes(trim(date('Y-m-d', strtotime($this->date)))) . "','";
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
		    $this->error_description="Can't insert this news";
		    return false;
		}
    }
    elseif($this->id > 0 ) {

		$strSQL = "UPDATE news SET name = '".addslashes(trim($this->name))."',";
		$strSQL .= " date = '".addslashes(trim(date('Y-m-d', strtotime($this->date))))."',";
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
		            $this->error_description="Can't update this news";
		            return false;
		        }
    }
}

function exist(){
    $strSQL = "SELECT 1 FROM news WHERE name = '".$this->name."'";
    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
    if ( mysql_num_rows($rsRES) > 0 ){
        return true;
    }
    else{
        return false;
    }
}




function get_list_array(){
        $news = array();$i=0;
        $strSQL = "SELECT id, name, date,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM news ORDER BY name";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
        while ( list ($id, $name, $date,  $title,  $description,  $image,  $status_id,  $gallery_id,  $created,  $updated,  $record_user_id) = mysql_fetch_row($rsRES) ){
              $news[$i]["id"] = $id;
              $news[$i]["name"] = $name;
              $news[$i]["date"] = $date;
              $news[$i]["date_formatted"] = date('d-m-Y', strtotime($date));
              $news[$i]["title"] = $title;
              $news[$i]["description"] = $description;
              $news[$i]["image"] = $image;
              $news[$i]["status_id"] = $status_id;
              $news[$i]["gallery_id"] = $gallery_id;
              $news[$i]["created"] = $created;
              $news[$i]["updated"] = $updated;
              $news[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $news;
        }
        else{
        $this->error_number = 4;
        $this->error_description="Can't list news";
        return false;
        }
}
function get_list_array_bylimit($search_string = "",$status_id = gINVALID ,$start_record = 0,$max_records = 25){

        $limited_data = array();
        $i=0;
        $str_condition = "";

        $strSQL = "SELECT id,name,  date,  title,  description,  image,  status_id,  gallery_id,  created,  updated,  record_user_id FROM news WHERE 1 ";
        if ( trim($search_string) != "" ) {
            $str_condition .= " AND CONCAT(name,' ',title, ' ', description) LIKE '%" . $search_string . "%'" ;
        }
     
        if ( trim($status_id) != "" && trim($status_id) != gINVALID ) {
            $str_condition .= " AND status_id =  '" . $status_id . "'" ;
        }
     
            $strSQL .=  $str_condition . "  ORDER BY id DESC";
        
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
		    $strSQL = " DELETE FROM news WHERE id = '".$this->id."'";
		    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
		    if ( mysql_affected_rows($this->connection) > 0 ) {
		        return true;
		    }
		    else{
		        $this->error_number = 6;
		        $this->error_description="Can't deltete this News";
		        return  false;
		    }
		}
	}

    function delete_image(){
		$this->get_detail();
		$id = $this->id;
		$image = $this->image;

        $strSQL = "UPDATE news SET image='' WHERE id = ".$this->id;
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
