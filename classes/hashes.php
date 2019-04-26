<?php
class hashes{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new hashes();
		}
		return self::$_instance;
	}
	
	public function hashes($type = true, $data = true){
		
		if($type == 'password'){
			$return = md5(sha1(md5($data)));
		}else if($type == 'pin'){
			$return = md5($data);
		}
		return $return;
	}
}


?>