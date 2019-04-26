<?php
class validation{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new validation();
		}
		return self::$_instance;
	}
	
	public function userexists($number){
		$num_rows = query::g()->query(
			'rows',
			array(
				'*',
				'bariwala',
				'username',
				'=',
				$number
			)
			
		)->num_rows;
		if($num_rows > 0){
			return true;
		}else if($num_rows == 0){
			return false;
		}
	}
	public function pincheck($pin){
		$query = query::g()->query(
			'rows',
			array(
				'*',
				'pins',
				'pin',
				'=',
				$pin
			)
			
		);
		if($query->num_rows > 0){
			$result = mysqli_fetch_assoc($query);
			if($result['status'] == '0'){
				return true;
			}else if($result['status'] == '1'){
				return false;
			}
		}else{
			return false;
		}
		
	}
}
?>