<?php
class product{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new product();
		}
		return self::$_instance;
	}
	public function get_stock(){
		$dpid = $_SESSION['dpid'];
		$stocks = query::g()->query('rows',array('`pid`,`stock`','stock','dpid','=',$dpid));
		
		return $stocks;
 
	}
	public function get_total_cart_amount(){
		$query_class = query::g();
		$total = 0;
		foreach($_SESSION['cart'] as $key => $cart){
			$price = $query_class->query('single_data',array('`price`','products','id','=',$key,'price'));
			
			$total = $total + ($price * $cart);
		}
		return $total;
	}
}

?>