<?php 
class page{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new page();
		}
		return self::$_instance;
	}
	public function get_ten_data($table_name,$field,$data){
		$db = DB::g()->connect();
		$field = null;
		$data = null;
		$sql = mysqli_query($db, "SELECT * FROM `".$table_name."` WHERE `".$field."` = '$data' ORDER BY `id` DESC LIMIT 10");
		if($sql == true){
			return $sql;
		}else{
			return mysqli_error($db);
		}
	}
	public function paginationed($coun,$table_name,$field,$data){
		$db = DB::g()->connect();
		
        $count = sanetize($coun);
		$counts = $count.'0';
		
		$sql = mysqli_query($db, "SELECT * FROM `".$table_name."` WHERE `".$field."` = '$data' ORDER BY `id` DESC LIMIT $counts, 10");
		return $sql;
	}
	public function pagination_list($table_name,$field,$data){
		$db = DB::g()->connect();
		
		$sql = mysqli_query($db, "SELECT `id` FROM `".$table_name."` WHERE `".$field."` = '$data' ORDER BY `id` DESC LIMIT 300");
		$num_rows = mysqli_num_rows($sql);
		
		if($num_rows > 10){
			$rowscount = ($num_rows / 10);
			$count_total = ceil($rowscount);
			return $count_total;
		}else{
			return 1;
		}
	}
	public function get_ten_data_all($table_name){
		$db = DB::g()->connect();
		$field = null;
		$data = null;
		$sql = mysqli_query($db, "SELECT * FROM `".$table_name."`  ORDER BY `id` DESC LIMIT 10");
		if($sql == true){
			return $sql;
		}else{
			return mysqli_error($db);
		}
	}
	public function paginationed_all($coun,$table_name){
		$db = DB::g()->connect();
		
        $count = sanetize($coun);
		$counts = $count.'0';
		
		$sql = mysqli_query($db, "SELECT * FROM `".$table_name."` ORDER BY `id` DESC LIMIT $counts, 10");
		return $sql;
	}
	public function pagination_list_all($table_name){
		$db = DB::g()->connect();
		
		$sql = mysqli_query($db, "SELECT `id` FROM `".$table_name."` ORDER BY `id` DESC");
		$num_rows = mysqli_num_rows($sql);
		
		if($num_rows > 10){
			$rowscount = ($num_rows / 10);
			$count_total = ceil($rowscount);
			return $count_total;
		}else{
			return 1;
		}
	}
	public function get_ten_data_all_dealers($table_name){
		$db = DB::g()->connect();
		$field = null;
		$data = null;
		$sql = mysqli_query($db, "SELECT * FROM `".$table_name."` WHERE `stocker` = 'company'  ORDER BY `id` DESC LIMIT 10");
		if($sql == true){
			return $sql;
		}else{
			return mysqli_error($db);
		}
	}
	public function paginationed_all_dealers($coun,$table_name){
		$db = DB::g()->connect();
		
        $count = sanetize($coun);
		$counts = $count.'0';
		
		$sql = mysqli_query($db, "SELECT * FROM `".$table_name."` WHERE `stocker` = 'company'   ORDER BY `id` DESC LIMIT $counts, 10");
		return $sql;
	}
	public function pagination_list_all_dealers($table_name){
		$db = DB::g()->connect();
		
		$sql = mysqli_query($db, "SELECT `id` FROM `".$table_name."`  WHERE `stocker` = 'company'   ORDER BY `id` DESC LIMIT 300");
		$num_rows = mysqli_num_rows($sql);
		
		if($num_rows > 10){
			$rowscount = ($num_rows / 10);
			$count_total = ceil($rowscount);
			return $count_total;
		}else{
			return 1;
		}
	}

}


?>