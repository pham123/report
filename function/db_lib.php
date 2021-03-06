<?php


class db {
	public $dbh; // Create a database connection for use by all functions in this class
	public $lang="En";

	function __construct() {
		if($this->dbh = mysqli_connect(_DB_HOST_, _DB_USER_, _DB_PASS_, _DB_name_)) {

		} else {
			exit('Unable to connect to DB');
		}

		// Set every possible option to utf-8
		mysqli_query($this->dbh, 'SET NAMES utf8');
		mysqli_query($this->dbh, 'SET CHARACTER SET utf8');
		mysqli_query($this->dbh, 'SET character_set_results = utf8,' . 'character_set_client = utf8, character_set_connection = utf8,' . 'character_set_database = utf8, character_set_server = utf8'); 
	}

		// Create a standard data format for insertion of PHP dates into MySQL public
		function date($php_date) { return date('Y-m-d H:i:s', strtotime($php_date));	 }

		// All text added to the DB should be cleaned with mysqli_real_escape_string
		// to block attempted SQL insertion exploits
		public function escape($str) { 
			//return mysqli_real_escape_string($this->dbh,$str); 
			return $str;
		}

		// Test to see if a specific field value is already in the DB
		// Return false if no, true if yes
		public function in_table($table,$where) {
			$query = 'SELECT * FROM ' . _DB_PREFIX_ . $table . ' WHERE ' . $where;
			$result = mysqli_query($this->dbh,$query);
			return mysqli_num_rows($result) > 0;
		}
		public function sl_one($table,$where) {
			$query = 'SELECT * FROM ' . _DB_PREFIX_ . $table . ' WHERE ' . $where;
			$rs = mysqli_query($this->dbh,$query);
			$result = $rs->fetch_array();
			return $result;
		}
		// Perform a generic select and return a pointer to the result
		public function select($query) {
			$result = mysqli_query( $this->dbh, $query );
			return $result;
		}
		//Thực thi 1 query đến DB
		public function query($query) {
			mysqli_query($this->dbh,$query);
		}
		//Đếm
		public function countdb($query) {
			$result = mysqli_query( $this->dbh, $query );
			$count = $result-> num_rows;
			return $count;
		}
		// Add a row to any table
		public function insert($table,$field_values) {
			$query = 'INSERT INTO ' . _DB_PREFIX_ . $table . ' SET ' . $field_values;
			mysqli_query($this->dbh,$query);
		}

		// Update any row that matches a WHERE clause
		public function update($table,$field_values,$where) {
			$query = 'UPDATE ' . _DB_PREFIX_ . $table . ' SET ' . $field_values . ' WHERE ' . $where;
			mysqli_query($this->dbh,$query);
		}

		public function delete($table,$where) {
			$query = 'DELETE FROM ' . _DB_PREFIX_ . $table . ' WHERE ' . $where;
			mysqli_query($this->dbh,$query);
		}
		public function fetchOne($query){
			$rs = mysqli_query($this->dbh,$query);
			return mysqli_fetch_assoc($rs);
		}

		public function fetchAll($query){
			$rows = array();
			$rs = mysqli_query($this->dbh,$query);
			while ($row = mysqli_fetch_assoc($rs)){
				$rows[] = $row;
			}
			return $rows;
		}

		public function sl_all($table,$where) {
			$query = 'SELECT * FROM ' . _DB_PREFIX_ . $table . ' WHERE ' . $where;
			$rs = mysqli_query($this->dbh,$query);
			while ($row = mysqli_fetch_assoc($rs)){
				$rows[] = $row;
			}
			return $rows;
		}

		public function sl_col_all($colar,$table,$where) {
			$query = 'SELECT '.$table.'Id as id,' .$colar .' FROM ' . _DB_PREFIX_ . $table . ' WHERE ' . $where;
			$rs = mysqli_query($this->dbh,$query);
			while ($row = mysqli_fetch_assoc($rs)){
				$rows[] = $row;
			}
			return $rows;
		}

		//Kiểm tra nhanh thông tin
		public function getcol($table) {
			$query = "SHOW COLUMNS FROM ".$table."";
			$rs = mysqli_query($this->dbh,$query);
			$text = '';
			while ($row = mysqli_fetch_assoc($rs)){
				$text = $text." | ".$row['Field'];
			}
			//$arr = mysqli_fetch_assoc($rs);
			return $text;
			// return $rows;
			
		}

		//Lấy thông tin
		public function lang($key,$value=Null) {
			$ngongu = $this->lang;
			if ($value==Null) {
				$value = implode(" ",preg_split('/(?=[A-Z])/', $key, -1, PREG_SPLIT_NO_EMPTY));
			}
			$return = $value;
			$query = "SELECT Lang".$ngongu." FROM " . _DB_PREFIX_ . "lang WHERE LangName='".$key."'" ;
			$rs = mysqli_query($this->dbh,$query);
			$result = $rs->fetch_array();
			if (isset($result['Lang'.$ngongu])) {
				$return =  $result['Lang'.$ngongu];
			}else{
				$sql = "INSERT INTO Lang(`LangName`,`LangVi`,`LangEn`,`LangCn`,`LangKr`,`LangOption`)
				VALUES('".$key."','".$value."','".$value."','".$value."','".$value."',1)";
				$result = mysqli_query( $this->dbh, $sql );
			}
			return $return;
		}

		public function getqty($type,$lineid,$times){
			$sql = "Select * from sanluong where SanLuongType='".$type."' AND date(SanLuongCreateDate)='".date('Y-m-d')."'AND LineId=".$lineid." AND SanLuongTimes=".$times;
			$rs = mysqli_query($this->dbh,$sql);
			$result = $rs->fetch_array();
			if (isset($result)) {
				return $result['SanluongQty'];
			}else{
				return "";
			}
			
		}

		public function getlineqty($type,$lineid){
			$sql = "Select SUM(SanluongQty) AS SanluongQty from sanluong where SanLuongType='".$type."' AND date(SanLuongCreateDate)='".date('Y-m-d')."'AND LineId=".$lineid." GROUP BY LineId";
			$rs = mysqli_query($this->dbh,$sql);
			$result = $rs->fetch_array();
			if (isset($result)) {
				return $result['SanluongQty'];
			}else{
				return 0;
			}
			
		}

		
		public function getplan($lineid){
			$sql = "Select * from kehoach where date(KeHoachCreateDate)='".date('Y-m-d')."'AND LineId=".$lineid;
			$rs = mysqli_query($this->dbh,$sql);
			$result = $rs->fetch_array();
			if (isset($result)) {
				return $result['KeHoachQty'];
			}else{
				return "";
			}
			
		}

		public function getarget($lineid,$time){
			$sql = "Select * from TargetQuantity where TargetQuantityTimes=".$time." AND LineId=".$lineid;
			$rs = mysqli_query($this->dbh,$sql);
			$result = $rs->fetch_array();
			if (isset($result)) {
				return $result['TargetQuantityQty'];
			}else{
				return "";
			}
			
		}


		public function getremark($lineid){
			$sql = "Select * from remark where date(RemarkCreateDate)='".date('Y-m-d')."'AND LineId=".$lineid;
			$rs = mysqli_query($this->dbh,$sql);
			$result = $rs->fetch_array();
			if (isset($result)) {
				return $result['RemarkContent'];
			}else{
				return "";
			}
			
		}
}


class products extends db{
	public $id;
	public $name;
	public $number;
	public function get($id) {
		$result = $this->sl_one('products','ProductsId='.$id);
		$this->name = $result['ProductsName'];
		$this->number = $result['ProductsNumber'];
	}
}




function safe($x){
$rv= addslashes($x);
$rv = strip_tags($rv);
     return $rv;
}

function w_logs($dir,$content){
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$name = date("Y-m-d");
	$now = date("Y-m-d H:i:s");
	$text = $now."\t".$content.PHP_EOL;
	if (!file_exists ($dir.$name.".txt")) {
		$myfile = fopen($dir.$name.".txt", "w") or die("Unable to open file!");
		file_put_contents ($dir.$name.".txt",$text ,FILE_APPEND);
	}else{
		file_put_contents ($dir.$name.".txt",$text ,FILE_APPEND);
	
	}
}





function getStartAndEndDate($week, $year)
{
	$week = $week-1;
    $time = strtotime("1 January $year", time());
    $day = date('w', $time);
    $time += ((7*$week)+1-$day)*24*3600;
    $return[0] = date('Y-m-d', $time);
    $time += 6*24*3600;
    $return[1] = date('Y-m-d', $time);
    return $return;
}

function rangeMonth($datestr) {
    date_default_timezone_set(date_default_timezone_get());
    $dt = strtotime($datestr);
    $res[0] = date('Y-m-d', strtotime('first day of this month', $dt));
    $res[1] = date('Y-m-d', strtotime('last day of this month', $dt));
    return $res;
	}

function viewprice($price){
	$number = $price;
	 $arrfloat = explode('.',$number);
	 $a = $arrfloat[0];
	 $arr = str_split($a);
	 $c=array_reverse($arr);
	 $k=1;
	 $text = '';
	 for ($i=0; $i < strlen($a); $i++) { 
		 if ($k<3) {
			  $text = $text.$c[$i];
		 }elseif($k=3){
			 $text = $text.$c[$i].',';
			 $k=0;
		 }
		$k++;
	 }
	$dr = str_split($text);
	if($dr[(count($dr)-1)]==","){
	  unset($dr[(count($dr)-1)]);
	}
	$d = array_reverse($dr);
	$text2 = '';
	foreach ($d as $key => $value) {
	   $text2=$text2.$value;
	}
	$retVal = (isset($arrfloat[1])) ? $text2.'.'.$arrfloat[1] : $text2 ;
	return $retVal;
	}
?>