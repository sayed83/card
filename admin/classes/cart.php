<?php
class cart{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new cart();
		}
		return self::$_instance;
	}
	public function is_in_cart($id){
		if(isset($_SESSION['cart'])){
			$found = 0;
			foreach($_SESSION['cart'] as $key => $value){
				if($key == $id){
					$found = 1;
				}
			}
			if($found == 0){
				return false;
			}else if($found == 1){
				return true;
			}
		}else{
			return false;
		}
	}
}

?>