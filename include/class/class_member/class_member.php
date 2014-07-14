<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Member {
    var $connection;
    var $id = gINVALID;
    var $user_id;
	var $first_name  = "";
	var $last_name  = "";
	var $past_clubposition_id  = gINVALID;
	var $phf_id  = gINVALID;
	var $classification_id  = gINVALID;
	var $districtposition_id  = gINVALID;
	var $dob  = "";
	var $dob_formatted ="";
	var $dow  = "";
	var $dow_formatted ="";
	var $blood_group  = "";
	var $phone  = "";
	var $mobile  = "";
	var $website  = "";
	var $office_address1  = "";
	var $office_address2  = "";
	var $office_address3  = "";
	var $office_city  = "";
	var $office_pin  = "";
	var $office_phone  = "";
	var $residence_address1  = "";
	var $residence_address2  = "";
	var $residence_address3  = "";
	var $residence_city  = "";
	var $residence_pin  = "";
	var $image  = "";
	var $created  = "";
	var $updated  = "";
	var $record_user_id = gINVALID;


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
              $strSQL = "INSERT INTO memberdetails(user_id,first_name , last_name , past_clubposition_id , phf_id , classification_id , districtposition_id , dob , dow , blood_group , phone , mobile , website , office_address1 , office_address2 , office_address3 , office_city , office_pin , office_phone , residence_address1 , residence_address2 , residence_address3 , residence_city , residence_pin , image , created ,  record_user_id) ";
              $strSQL .= "VALUES ('".addslashes(trim($this->user_id))."','";
              $strSQL .= addslashes(trim($this->first_name))."','";
              $strSQL .= addslashes(trim($this->last_name))."','";
              $strSQL .= addslashes(trim($this->past_clubposition_id))."','";
              $strSQL .= addslashes(trim($this->phf_id))."','";
              $strSQL .= addslashes(trim($this->classification_id))."','";
              $strSQL .= addslashes(trim($this->districtposition_id))."','";
              $strSQL .= addslashes(trim(date('Y-m-d', strtotime($this->dob))))."','";
              $strSQL .= addslashes(trim(date('Y-m-d', strtotime($this->dow))))."','";
              $strSQL .= addslashes(trim($this->blood_group))."','";
              $strSQL .= addslashes(trim($this->phone))."','";
              $strSQL .= addslashes(trim($this->mobile))."','";
              $strSQL .= addslashes(trim($this->website))."','";
              $strSQL .= addslashes(trim($this->office_address1))."','";
              $strSQL .= addslashes(trim($this->office_address2))."','";
              $strSQL .= addslashes(trim($this->office_address3))."','";
              $strSQL .= addslashes(trim($this->office_city))."','";
              $strSQL .= addslashes(trim($this->office_pin))."','";
              $strSQL .= addslashes(trim($this->office_phone))."','";
              $strSQL .= addslashes(trim($this->residence_address1))."','";
              $strSQL .= addslashes(trim($this->residence_address2))."','";
              $strSQL .= addslashes(trim($this->residence_address3))."','";
              $strSQL .= addslashes(trim($this->residence_city))."','";
              $strSQL .= addslashes(trim($this->residence_pin))."','";
              $strSQL .= addslashes(trim($this->image))."',";
              $strSQL .=  "now(),'";
              $strSQL .= addslashes(trim($this->record_user_id))."')";
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

            $strSQL = "UPDATE memberdetails SET ";
            $strSQL .= "first_name = '".addslashes(trim($this->first_name))."',";
            $strSQL .= "last_name = '".addslashes(trim($this->last_name))."',";
            $strSQL .= "classification_id = '".addslashes(trim($this->classification_id))."',";
            $strSQL .= "dob = '".addslashes(trim(date('Y-m-d', strtotime($this->dob))))."',";
            $strSQL .= "dow = '".addslashes(trim(date('Y-m-d', strtotime($this->dow))))."',";
            $strSQL .= "blood_group = '".addslashes(trim($this->blood_group))."',";
            $strSQL .= "phone = '".addslashes(trim($this->phone))."',";
            $strSQL .= "mobile = '".addslashes(trim($this->mobile))."',";
            $strSQL .= "website = '".addslashes(trim($this->website))."',";
            $strSQL .= "office_address1 = '".addslashes(trim($this->office_address1))."',";
            $strSQL .= "office_address2 = '".addslashes(trim($this->office_address2))."',";
            $strSQL .= "office_address3 = '".addslashes(trim($this->office_address3))."',";
            $strSQL .= "office_city = '".addslashes(trim($this->office_city))."',";
            $strSQL .= "office_pin = '".addslashes(trim($this->office_pin))."',";
            $strSQL .= "office_phone = '".addslashes(trim($this->office_phone))."',";
            $strSQL .= "residence_address1 = '".addslashes(trim($this->residence_address1))."',";
            $strSQL .= "residence_address2 = '".addslashes(trim($this->residence_address2))."',";
            $strSQL .= "residence_address3 = '".addslashes(trim($this->residence_address3))."',";
            $strSQL .= "residence_city = '".addslashes(trim($this->residence_city))."',";
            $strSQL .= "residence_pin = '".addslashes(trim($this->residence_pin))."',";
            $strSQL .= "image = '".addslashes(trim($this->image))."',";
            $strSQL .= "record_user_id = '".addslashes(trim($this->record_user_id))."',";
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
        $strSQL = "DELETE FROM memberdetails WHERE id =".$this->id;
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
        $strSQL = "SELECT 1 FROM memberdetails WHERE user_id = '".$this->user_id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            return true;
        }
        else{
            return false;
        }
    }

    function get_detail(){
        $strSQL = "SELECT * FROM memberdetails WHERE user_id = ".$this->user_id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'id');
                $this->user_id = mysql_result($rsRES,0,'user_id');
                $this->first_name = mysql_result($rsRES,0,'first_name');
                $this->last_name = mysql_result($rsRES,0,'last_name');
                $this->past_clubposition_id = mysql_result($rsRES,0,'past_clubposition_id');
                $this->phf_id = mysql_result($rsRES,0,'phf_id');
                $this->classification_id = mysql_result($rsRES,0,'classification_id');
                $this->districtposition_id = mysql_result($rsRES,0,'districtposition_id');
                $this->dob = mysql_result($rsRES,0,'dob');
				$this->dob_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'dob')));
                $this->dow = mysql_result($rsRES,0,'dow');
				$this->dow_formatted = date('d-m-Y', strtotime(mysql_result($rsRES,0,'dow')));
                $this->blood_group = mysql_result($rsRES,0,'blood_group');
                $this->phone = mysql_result($rsRES,0,'phone');
                $this->mobile = mysql_result($rsRES,0,'mobile');
                $this->website = mysql_result($rsRES,0,'website');
                $this->office_address1 = mysql_result($rsRES,0,'office_address1');
                $this->office_address2 = mysql_result($rsRES,0,'office_address2');
                $this->office_address3 = mysql_result($rsRES,0,'office_address3');
                $this->office_city = mysql_result($rsRES,0,'office_city');
                $this->office_pin = mysql_result($rsRES,0,'office_pin');
                $this->office_phone = mysql_result($rsRES,0,'office_phone');
                $this->residence_address1 = mysql_result($rsRES,0,'residence_address1');
                $this->residence_address2 = mysql_result($rsRES,0,'residence_address2');
                $this->residence_address3 = mysql_result($rsRES,0,'residence_address3');
                $this->residence_city = mysql_result($rsRES,0,'residence_city');
                $this->residence_pin = mysql_result($rsRES,0,'residence_pin');
                $this->image = mysql_result($rsRES,0,'image');
                $this->created = mysql_result($rsRES,0,'created');
                $this->updated = mysql_result($rsRES,0,'updated');
                $this->record_user_id = mysql_result($rsRES,0,'record_user_id');

                return true;
        }
        else{
            return false;
        }
    }



    function delete_image(){
		$this->get_detail();
		$user_id = $this->user_id;
		$image = $this->image;
        $strSQL = "UPDATE memberdetails SET image='' WHERE user_id = ".$this->user_id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
			if ( $image != "" ) {
				$ext = explode('.', $image);
				$ext = $ext[count($ext)-1];
				$image_file = ROOT_PATH.MEMBER_DIR . $user_id . '.' . $ext;
				eval("\$image_file = \"$image_file\";");
				unlink($image_file);
			}
            return true;
        }else{
            return false;
            $this->error_description = "Image not deleted";
         }
    }



    function get_list_array_bylimit($search_string,$user_id = gINVALID, $classification_id = gINVALID, $past_clubposition_id = gINVALID, $districtposition_id = gINVALID,  $start_record = 0,$max_records = 25){
        $limited_data = array();$i=0;
        $strSQL = "SELECT M.* FROM memberdetails M, C.name as classification_name, CP.name as past_clubposition_name, D.name as districtposition_name   ";
        $strSQL .= " LEFT JOIN classifications C ON M.classification_id =C.id )";
        $strSQL .= " LEFT JOIN clubpositions CP ON M.past_clubposition_id = CP.id )";
        $strSQL .= " LEFT JOIN districtpositions D ON M.districtposition_id = D.id ) WHERE 1 ";

        if (trim($search_string) != "" ) {
                $str_condition = "AND CONCAT (first_name ,  ' ', last_name ,  ' ', blood_group ,  ' ', phone ,  ' ', mobile ,  ' ', website ,  ' ', office_address1 ,  ' ', office_address2 ,  ' ', office_address3 ,  ' ', office_city ,  ' ', office_pin ,  ' ', office_phone ,  ' ', residence_address1 ,  ' ', residence_address2 ,  ' ', residence_address3 ,  ' ', residence_city ,  ' ', residence_pin ) LIKE '%" . $search_string . "%'" ;
        }


        if ( $user_id != "" && $user_id != -1 ) {
                $str_condition .= " AND user_id = " . $user_id;
        }
        if ( $past_clubposition_id != "" && $past_clubposition_id != -1 ) {
                $str_condition .= " AND past_clubposition_id = " . $past_clubposition_id;
        }
        if ( $classification_id != "" && $classification_id != -1 ) {
                $str_condition .= " AND classification_id = " . $classification_id;
        }
        if ( $districtposition_id != "" && $districtposition_id != -1 ) {
                $str_condition .= " AND districtposition_id = " . $districtposition_id;
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

        while ( list ($id, $user_id, $first_name ,  $last_name ,  $past_clubposition_id ,  $phf_id ,  $classification_id ,  $districtposition_id ,  $dob ,  $dow ,  $blood_group ,  $phone ,  $mobile ,  $website ,  $office_address1 ,  $office_address2 ,  $office_address3 ,  $office_city ,  $office_pin ,  $office_phone ,  $residence_address1 ,  $residence_address2 ,  $residence_address3 ,  $residence_city ,  $residence_pin ,  $image ,  $created ,  $updated ,  $record_user_id, $classification_name, $past_clubposition_name, $districtposition_name) = mysql_fetch_row($rsRES) ){
              $limited_data[$i]["id"] = $id;
              $limited_data[$i]["user_id"] = $user_id;
              $limited_data[$i]["first_name"] = $first_name;
              $limited_data[$i]["last_name"] = $last_name;
              $limited_data[$i]["past_clubposition_id"] = $past_clubposition_id;
              $limited_data[$i]["past_clubposition_name"] = $past_clubposition_name;
              $limited_data[$i]["phf_id"] = $phf_id;
              $limited_data[$i]["classification_id"] = $classification_id;
              $limited_data[$i]["classification_name"] = $classification_name;
              $limited_data[$i]["districtposition_id"] = $districtposition_id;
              $limited_data[$i]["districtposition_name"] = $districtposition_name;
              $limited_data[$i]["dob"] = $dob;
              $limited_data[$i]["dob_formatted"] = date('d-m-Y', strtotime($dob));
              $limited_data[$i]["dow"] = $dow;
              $limited_data[$i]["dow_formatted"] = date('d-m-Y', strtotime($dow));

              $limited_data[$i]["blood_group"] = $blood_group;
              $limited_data[$i]["phone"] = $phone;
              $limited_data[$i]["mobile"] = $mobile;
              $limited_data[$i]["website"] = $website;
              $limited_data[$i]["office_address1"] = $office_address1;
              $limited_data[$i]["office_address2"] = $office_address2;
              $limited_data[$i]["office_address3"] = $office_address3;
              $limited_data[$i]["office_city"] = $office_city;
              $limited_data[$i]["office_pin"] = $office_pin;
              $limited_data[$i]["office_phone"] = $office_phone;
              $limited_data[$i]["residence_address1"] = $residence_address1;
              $limited_data[$i]["residence_address2"] = $residence_address2;
              $limited_data[$i]["residence_address3"] = $residence_address3;
              $limited_data[$i]["residence_city"] = $residence_city;
              $limited_data[$i]["residence_pin"] = $residence_pin;
              $limited_data[$i]["image"] = $image;
              $limited_data[$i]["created"] = $created;
              $limited_data[$i]["updated"] = $updated;
              $limited_data[$i]["record_user_id"] = $record_user_id;
              $i++;
        }
        return $limited_data;
        }
        else{
        return false;
        }
    }




	function current_week_attendance_all(){
		
		$from_date = date('Y/m/d', strtotime('previous Thursday'));
		$to_date = date('Y/m/d', strtotime($from_date.' + 7 days'));
		$limited_data = array();$i=0;
        $strSQL = "SELECT  U.id, M.first_name, M.last_name, U.username ,COUNT( DISTINCT DATE( UL.created ) ) AS attendance FROM users U, userloggedindetails UL, memberdetails M WHERE UL.user_id = U.id AND  M.user_id = U.id AND UL.created  BETWEEN '".$from_date."' AND '".$to_date."' GROUP BY U.id";
		$rsRES = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL);

		if ( mysql_num_rows($rsRES) > 0 ){
			while ( $row = mysql_fetch_assoc($rsRES)){
				$limited_data[$i]["id"] = $row["id"];
				$limited_data[$i]["username"] = $row["username"];
				$limited_data[$i]["first_name"] = $row["first_name"];
				$limited_data[$i]["last_name"] = $row["last_name"];
				$limited_data[$i]["attendance"] = $row["attendance"];
				$i++;
			}
			return $limited_data;
		}else{
        	return false;
        }




	}



	function attendance_all($from_date, $to_date, $user_id = gINVALID){
		$from_date = date('Y/m/d', strtotime($from_date));
		$to_date = date('Y/m/d', strtotime($to_date));
		$str_condition = "";
		
		if ($user_id != gINVALID && $user_id != "" ){
			$str_condition = " AND U.id = '".$user_id."'";
		}


		$limited_data = array();$i=0;
        $strSQL = "SELECT  U.id, M.first_name, M.last_name, U.username ,COUNT( DISTINCT DATE( UL.created ) ) AS attendance FROM users U, userloggedindetails UL, memberdetails M WHERE UL.user_id = U.id AND  M.user_id = U.id ".$str_condition." AND UL.created  BETWEEN '".$from_date."' AND '".$to_date."' GROUP BY U.id";
		$rsRES = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL);

		if ( mysql_num_rows($rsRES) > 0 ){
			while ( $row = mysql_fetch_assoc($rsRES)){
				$limited_data[$i]["id"] = $row["id"];
				$limited_data[$i]["username"] = $row["username"];
				$limited_data[$i]["first_name"] = $row["first_name"];
				$limited_data[$i]["last_name"] = $row["last_name"];
				$limited_data[$i]["attendance"] = $row["attendance"];
				$i++;
			}
			return $limited_data;
		}else{
        	return false;
        }




	}



	function member_current_week_loggedin_details($user_id){
		
		$from_date = date('Y/m/d', strtotime('previous Thursday'));
		$to_date = date('Y/m/d', strtotime($from_date.' + 7 days'));

		$str_condition = "";
		
		if ($user_id != gINVALID && $user_id != "" ){
			$str_condition = " AND U.id = '".$user_id."'";
		}


		$limited_data = array();$i=0;
        $strSQL = "SELECT  U.id, M.first_name, M.last_name, U.username , UL.created, UL.ip FROM users U, userloggedindetails UL, memberdetails M WHERE UL.user_id = U.id AND  M.user_id = U.id ".$str_condition." AND UL.created  BETWEEN '".$from_date."' AND '".$to_date."'";
		$rsRES = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL);

		if ( mysql_num_rows($rsRES) > 0 ){
			while ( $row = mysql_fetch_assoc($rsRES)){
				$limited_data[$i]["id"] = $row["id"];
				$limited_data[$i]["username"] = $row["username"];
				$limited_data[$i]["first_name"] = $row["first_name"];
				$limited_data[$i]["last_name"] = $row["last_name"];
				$limited_data[$i]["date"] = date('d/m/Y H:i A', strtotime($row["created"]));;
				$limited_data[$i]["ip"] = $row["ip"];
				$i++;
			}
			return $limited_data;
		}else{
        	return false;
        }




	}

	function loggedin_details_all($from_date, $to_date, $user_id = gINVALID){
		$from_date = date('Y/m/d', strtotime($from_date));
		$to_date = date('Y/m/d', strtotime($to_date));

		$str_condition = "";
		
		if ($user_id != gINVALID && $user_id != "" ){
			$str_condition = " AND U.id = '".$user_id."'";
		}


		$limited_data = array();$i=0;
        $strSQL = "SELECT  U.id, M.first_name, M.last_name, U.username , UL.created, UL.ip FROM users U, userloggedindetails UL, memberdetails M WHERE UL.user_id = U.id AND  M.user_id = U.id ".$str_condition." AND UL.created  BETWEEN '".$from_date."' AND '".$to_date."'";
		$rsRES = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL);

		if ( mysql_num_rows($rsRES) > 0 ){
			while ( $row = mysql_fetch_assoc($rsRES)){
				$limited_data[$i]["id"] = $row["id"];
				$limited_data[$i]["username"] = $row["username"];
				$limited_data[$i]["first_name"] = $row["first_name"];
				$limited_data[$i]["last_name"] = $row["last_name"];
				$limited_data[$i]["date"] = date('d/m/Y H:i A', strtotime($row["created"]));;
				$limited_data[$i]["ip"] = $row["ip"];
				$i++;
			}
			return $limited_data;
		}else{
        	return false;
        }




	}





}
?>
