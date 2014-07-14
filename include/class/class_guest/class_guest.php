<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Guest {
    var $connection;
    var $id = gINVALID;
    var $user_id;
	var $first_name  = "";
	var $last_name  = "";
	var $district_number  = "";
	var $club_name  = "";
	var $president_emailid  = "";
	var $secretary_emailid  = "";
	var $access_forum = 0;
	var $ip  = "";
	var $created  = "";
	var $updated  = "";



    var $error = false;
    var $error_number=gINVALID;
    var $error_description="";
    //for pagination
    var $total_records = "";

    function __construct ( $connection ){
        $this->connection = $connection;
 
    }

    function update(){
        if ( $this->id == "" || $this->id == gINVALID) {
              $strSQL = "INSERT INTO guestdetails(user_id,first_name , last_name ,  emailid, district_number, club_name, president_emailid, secretary_emailid, ip, created) ";
              $strSQL .= "VALUES ('".addslashes(trim($this->user_id))."','";
              $strSQL .= addslashes(trim($this->first_name))."','";
              $strSQL .= addslashes(trim($this->last_name))."','";
              $strSQL .= addslashes(trim($this->emailid))."','";
              $strSQL .= addslashes(trim($this->district_number))."','";
              $strSQL .= addslashes(trim($this->club_name))."','";
              $strSQL .= addslashes(trim($this->president_emailid))."','";
              $strSQL .= addslashes(trim($this->secretary_emailid))."','";
              $strSQL .= addslashes(trim($_SERVER['REMOTE_ADDR']))."',";
              
              $strSQL .=  "now())";
              $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
              if ( mysql_affected_rows($this->connection) > 0 ){
                    $this->id = mysql_insert_id();;
                    return true;
              }
              else{
                $this->error_description = "Insert Failed";
                return false;
              }

        }elseif($this->id > 0 ) {

            $strSQL = "UPDATE guestdetails SET ";
            $strSQL .= "first_name = '".addslashes(trim($this->first_name))."',";
            $strSQL .= "last_name = '".addslashes(trim($this->last_name))."',";
            $strSQL .= "emailid = '".addslashes(trim($this->emailid))."',";
            $strSQL .= "district_number = '".addslashes(trim($this->district_number))."',";
            $strSQL .= "club_name = '".addslashes(trim($this->club_name))."',";
            $strSQL .= "president_emailid = '".addslashes(trim($this->president_emailid))."',";
            $strSQL .= "secretary_emailid = '".addslashes(trim($this->secretary_emailid))."',";
            $strSQL .= "updated = now() ";
            $strSQL .= " WHERE user_id =".$this->user_id;

    $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }
            else{
                $this->error_description = "Update Failed";
                return false;
            }
        }

    }


    function delete(){
        $strSQL = "DELETE FROM guestdetails WHERE id =".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) > 0 ) {
                    return true;
            }
            else{
                $this->error_description = "Can't Delete This record";
                return false;
            }
    }




    function exist(){
        $strSQL = "SELECT 1 FROM guestdetails WHERE user_id = '".$this->user_id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            return true;
        }
        else{
            return false;
        }
    }

    function get_detail(){
        $strSQL = "SELECT * FROM guestdetails WHERE user_id = ".$this->user_id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'id');
                $this->user_id = mysql_result($rsRES,0,'user_id');
                $this->first_name = mysql_result($rsRES,0,'first_name');
                $this->last_name = mysql_result($rsRES,0,'last_name');
                $this->emailid = mysql_result($rsRES,0,'emailid');
                $this->district_number = mysql_result($rsRES,0,'district_number');
                $this->club_name = mysql_result($rsRES,0,'club_name');
                $this->president_emailid = mysql_result($rsRES,0,'president_emailid');
                $this->secretary_emailid = mysql_result($rsRES,0,'secretary_emailid');
                $this->access_forum = mysql_result($rsRES,0,'access_forum');
                $this->ip = mysql_result($rsRES,0,'ip');
                $this->created = mysql_result($rsRES,0,'created');
                $this->updated = mysql_result($rsRES,0,'updated');

                return true;
        }
        else{
            return false;
        }
    }




    function get_list_array_bylimit($search_string,$user_id = gINVALID, $start_record = 0,$max_records = 25){
        $limited_data = array();$i=0;
        $strSQL = "SELECT * FROM guestdetails WHERE 1 ";

        if (trim($search_string) != "" ) {
                $str_condition = "AND CONCAT (first_name ,  ' ', last_name ,  ' ', emailid ,  ' ', district_number ,  ' ', club_name ,  ' ', president_emailid ,  ' ', secretary_emailid  ) LIKE '%" . $search_string . "%'" ;
        }


        if ( $user_id != "" && $user_id != -1 ) {
                $str_condition .= " AND user_id = " . $user_id;
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

        while ( list ($id, $user_id, $first_name ,$last_name ,$emailid ,$district_number, $club_name, $president_emailid, $secretary_emailid, $access_forum, $ip,  $created ,  $updated  ) = mysql_fetch_row($rsRES) ){
              $limited_data[$i]["id"] = $id;
              $limited_data[$i]["user_id"] = $user_id;
              $limited_data[$i]["first_name"] = $first_name;
              $limited_data[$i]["last_name"] = $last_name;
              $limited_data[$i]["emailid"] = $emailid;
              $limited_data[$i]["district_number"] = $district_number;
              $limited_data[$i]["club_name"] = $club_name;
              $limited_data[$i]["president_emailid"] = $president_emailid;
              $limited_data[$i]["secretary_emailid"] = $secretary_emailid;
              $limited_data[$i]["access_forum"] = $access_forum;
              $limited_data[$i]["ip"] = $ip;
              $limited_data[$i]["created"] = $created;
              $limited_data[$i]["updated"] = $updated;
              $i++;
        }
        return $limited_data;
        }
        else{
        return false;
        }
    }



    function access_log($log_time){
		$strSQL = "INSERT INTO guestaccesslog (user_id,log_date,log_time) values('".$this->user_id."', now(), '".$log_time."')";
		mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
		return true;
    }



    function get_access_time(){
		$strSQL = "SELECT SUM(log_time) as log_time FROM guestaccesslog WHERE user_id='".$this->user_id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
                return mysql_result($rsRES,0,'log_time');
                 
        }else{
			return false;
		}
    }



    function update_access_forum(){
		$strSQL = "UPDATE guestdetails SET access_forum = '1' WHERE user_id ='".$this->user_id."'";
		mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
		return true;
    }




}
?>
