<?php
class validation{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new validation();
		}
		return self::$_instance;
	}

}
?>