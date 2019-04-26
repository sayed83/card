<?php
class query{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new query();
		}
		return self::$_instance;
	}
	public function query($type = true,$param = true){
		$type = sanetize($type);
		$db = DB::g()->connect();
		if($type == 'all_data'){
			$table = sanetize($param[0]);
			$sql = "SELECT * FROM `".$table."`";
			$query = mysqli_query($db,$sql);
			return $query;
		}else if($type == 'rows'){
			$what = $param[0];
			$table = $param[1];
			$field = $param[2];
			$compare = $param[3];
			$data = $param[4];
			
			$sql = "SELECT ".$what." FROM `".$table."` WHERE `".$field."`".$compare."'".$data."'";                 
			//return $sql;
			$query = mysqli_query($db,$sql);
			return $query;
			
		}else if($type == 'single_data'){
			$what = $param[0];
			$table = $param[1];
			$field = $param[2];
			$compare = $param[3];
			$data = $param[4];
			$return = $param[5];
			$sql = "SELECT ".$what." FROM `".$table."` WHERE `".$field."`".$compare."'".$data."' LIMIT 1";                 
			
			$query = mysqli_query($db,$sql);
			$fetch = mysqli_fetch_assoc($query);
			return $fetch[$return];
		}else if($type == 'all_data_inv'){
			$table = sanetize($param[0]);
			$colum = sanetize($param[1]);
			$sql = "SELECT * FROM `".$table."` ORDER BY `".$colum."` DESC";
			$query = mysqli_query($db,$sql);
			return $query;
		}else if($type == 'rows_inv'){
			$what = $param[0];
			$table = $param[1];
			$field = $param[2];
			$compare = $param[3];
			$data = $param[4];
			$colum = $param[5];
			$sql = "SELECT ".$what." FROM `".$table."` WHERE `".$field."`".$compare."'".$data."' ORDER BY `".$colum."` DESC";                 
			$query = mysqli_query($db,$sql);
			return $query;
		}else if($type == 'single_data'){
			$what = $param[0];
			$table = $param[1];
			$field = $param[2];
			$compare = $param[3];
			$data = $param[4];
			$return = $param[5];
			$sql = "SELECT ".$what." FROM `".$table."` WHERE `".$field."`".$compare."'".$data."'";                 
			$query = mysqli_query($db,$sql);
			$fetch = mysqli_fetch_assoc($query);
			return $fetch[$return];
		}
		
	}
	
	public function insert($table,$data){
		$db = DB::g()->connect();
		$keys = array();
		$values = array();
		foreach($data as $key => $value){
			$keys[] = $key;
			$values[] = $value;
		}
		$fields = '`'.implode("`,`",$keys).'`';
		$datas = "'".implode("','",$values)."'";
		$sql = "INSERT INTO `".$table."` (".$fields.")VALUES(".$datas.")";
		$query = mysqli_query($db, $sql);
		//return $sql;
		if($query == true){
			return true;
		}else if($query == false){
			return mysqli_error($db);
		}
	}
	public function update($table,$array_one,$array_two){
		$db = DB::g()->connect();
		$new_array = array();
		$keys = array();
		$values = array();
		foreach($array_one as $key => $value){
			$new_array[] = "`".$key."` = '".$value."'"; 
		}
		$fields = implode(",",$new_array);
		$match = "`".$array_two[0]."` ".$array_two[1]." '".$array_two[2]."'";
		
		
		$sql = "UPDATE `".$table."` SET ".$fields." WHERE ".$match;
		$query = mysqli_query($db, $sql);
		if($query == true){
			return true;
		}else if($query == false){
			return mysqli_error($db);
		}
		
	}
	public function dataDelete($table,$array){
		$field = $array[0];
		$compare = $array[1];
		$data = $array[2];
		$db = DB::g()->connect();
		$sql = "DELETE FROM  `".$table."` WHERE `".$field."` ".$compare." '".$data."'";
		
		$query = mysqli_query($db, $sql);
		if($query == true){
			return true;
		}else if($query == false){
			return false;
		}
		
	}
	public function milti_query($array_one, $array_two){
		$db = DB::g()->connect();
		$comparisons = implode(' AND ',$array_two);
		$sql = "SELECT ".$array_one[0]." FROM `".$array_one[1]."` WHERE ".$comparisons;
		$query = mysqli_query($db,$sql);
		if($query == true){
			return $query;
		}else{
			return mysqli_error($db);
		}
	}
	public function multi_query($array_one, $array_two){
		$db = DB::g()->connect();
		$comparisons = implode(' AND ',$array_two);
		$sql = "SELECT ".$array_one[0]." FROM `".$array_one[1]."` WHERE ".$comparisons;
		$query = mysqli_query($db,$sql);
		if($query == true){
			return $query;
		}else{
			return mysqli_error($db);
		}
	}
}





?>