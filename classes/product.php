<?php
class product{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new product();
		}
		return self::$_instance;
	}
	public function cart_exists($pid){
		if(!isset($_SESSION['cart'])){
			return false;
		}else if(isset($_SESSION['cart'])){
			$found = 0;
			foreach($_SESSION['cart'] as $key => $value){
				if($key == $pid){
					
					$found = 1;
				}
				
			}
			if($found == 0){
				return false;
			}else if($found == 1){
				return true;
			}
		}
	}
	public function cart_count(){
		if(!isset($_SESSION['cart'])){
			return 0;
		}else{
			return count($_SESSION['cart']);
		}
	}
	public function get_total_amount(){
		$total = 0;
		foreach($_SESSION['cart'] as $pid => $qnty){
			$price = query::g()->query('single_data',array('`price`','products','id','=',$pid,'price'));
			$single_total = $price * $qnty;
			$total = $total + $single_total;
		}
		return $total;
	}
	public function get_purchase_type(){
		if(isset($_SESSION['signup'])){
			return 0;
		}else if(!isset($_SESSION['signup'])){
			$uid = $_SESSION[config::get('session/session_name')];
			$check_purchase = query::g()->multi_query(array('*','orders'),array("`uid` = '$uid'","`status` = '1' ORDER BY `id` DESC LIMIT 1"));
			if($check_purchase->num_rows == 1){
				return 1;
			}else{
				return 0;
			}
		}
	}
	public function details_insert($uid,$invid){
		foreach($_SESSION['cart'] as $pid => $qnty){
			$insert = query::g()->insert('order_details',array('uid'=>$uid,'pid'=>$pid,'qnty'=>$qnty,'invid'=>$invid));
		}
	}
	public function unset_all_sessions(){
		foreach($_SESSION as $key => $sessions){
			if($key !== 'i_login'){
				unset($_SESSION[$key]);
			}
		}
	}
	
}


?>