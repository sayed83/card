<?php
class user{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new user();
		}
		return self::$_instance;
	}
	
	public function register_user($first_name,$last_name,$email,$mobile,$password,$confirm_password,$activation_pin){
		$hash = hashes::g()->hashes('password',$password);
		$query = query::g()->insert(
			'bariwala',
			array(
				'username' => $mobile,
				'password' => $hash,
				'full_name' => $first_name.' '.$last_name,
				'email' => $email,
				'j_date' => other::g()->dates(),
			)
		);
		if($query == true){
			return true;
		}else{
			return false;
		}
	}
	public function userinfoByNumber($number){
		$query = query::g()->query(
			'rows',
			array(
				'*',
				'bariwala',
				'username',
				'=',
				$number,
			)
		);
		return $query;
	}
	public function pinupdate($pinid,$uid){
		$query = query::g()->update(
			'pins',
			array(
				'status' => '1',
				'userid' => $uid
			),
			array(
				0 => 'id',
				1 => $pinid
			)
		);
	}
	public static function loggedin(){
		if(isset($_SESSION['login'])){
			return true;
		}else{
			return false;
		}
	}
	public function login_check($number, $password){
		$query = query::g()->milti_query(
			array(
				'*',
				'bariwala'
			),
			array(
				"`username` = '".$number."'",
				"`password` = '".$password."'",
			)
		);
		return $query->num_rows; 
	}
	public static function balance($uid){
		$balance = query::g()->query('single_data',array('`balance`','users','id','=',$uid,'balance'));
		return $balance;
	}
	public function update_balance($uid,$balance){
		$update = query::g()->update('users',array('balance'=>$balance),array('id','=',$uid));
		
	}
	public function userinfo($uid,$field){
		$data =  query::g()->query('single_data',array('`'.$field.'`','users','id','=',$uid,$field));
		return $data;
	}
	public function get_balance_others($from,$uid){
		$query_class = query::g();
		
		if($from == 'CW'){
			$old_balance = $query_class->query('single_data',array('`cw`','users','id','=',$uid,'cw'));
			return $old_balance;
		}else if($from == 'PW'){
			$old_balance = $query_class->query('single_data',array('`pw`','users','id','=',$uid,'pw'));
			return $old_balance;
		}else if($from == 'SCW'){
			$old_balance = $query_class->query('single_data',array('`scw`','users','id','=',$uid,'scw'));
			return $old_balance;
		}else if($from == 'SPW'){
			$old_balance = $query_class->query('single_data',array('`spw`','users','id','=',$uid,'spw'));
			return $old_balance;
		}else if($from == 'DCW'){
			$old_balance = $query_class->query('single_data',array('`dcw`','users','id','=',$uid,'dcw'));
			return $old_balance;
		}else if($from == 'DPW'){
			$old_balance = $query_class->query('single_data',array('`dpw`','users','id','=',$uid,'dpw'));
			return $old_balance;
		}
	}
	public function update_balance_others($from,$amount,$update_type,$uid){
		$query_class = query::g();
		//$uid = $_SESSION[config::get('session/session_name')];
		if($from == 'CW'){
			$old_balance = $query_class->query('single_data',array('`cw`','users','id','=',$uid,'cw'));
			if($update_type == 'cut'){
				$new_balance = $old_balance - $amount;
			}else if($update_type == 'add'){
				$new_balance = $old_balance + $amount;
			}
			$update = $query_class->update('users',array('cw'=>$new_balance),array('id','=',$uid));
		}else if($from == 'PW'){
			$old_balance = $query_class->query('single_data',array('`pw`','users','id','=',$uid,'pw'));
			if($update_type == 'cut'){
				$new_balance = $old_balance - $amount;
			}else if($update_type == 'add'){
				$new_balance = $old_balance + $amount;
			}
			$update = $query_class->update('users',array('pw'=>$new_balance),array('id','=',$uid));
		}else if($from == 'SCW'){
			$old_balance = $query_class->query('single_data',array('`scw`','users','id','=',$uid,'scw'));
			if($update_type == 'cut'){
				$new_balance = $old_balance - $amount;
			}else if($update_type == 'add'){
				$new_balance = $old_balance + $amount;
			}
			$update = $query_class->update('users',array('scw'=>$new_balance),array('id','=',$uid));
		}else if($from == 'SPW'){
			$old_balance = $query_class->query('single_data',array('`spw`','users','id','=',$uid,'spw'));
			if($update_type == 'cut'){
				$new_balance = $old_balance - $amount;
			}else if($update_type == 'add'){
				$new_balance = $old_balance + $amount;
			}
			$update = $query_class->update('users',array('spw'=>$new_balance),array('id','=',$uid));
		}else if($from == 'DCW'){
			$old_balance = $query_class->query('single_data',array('`dcw`','users','id','=',$uid,'dcw'));
			if($update_type == 'cut'){
				$new_balance = $old_balance - $amount;
			}else if($update_type == 'add'){
				$new_balance = $old_balance + $amount;
			}
			$update = $query_class->update('users',array('dcw'=>$new_balance),array('id','=',$uid));
		}else if($from == 'DPW'){
			$old_balance = $query_class->query('single_data',array('`dpw`','users','id','=',$uid,'dpw'));
			if($update_type == 'cut'){
				$new_balance = $old_balance - $amount;
			}else if($update_type == 'add'){
				$new_balance = $old_balance + $amount;
			}
			$update = $query_class->update('users',array('dpw'=>$new_balance),array('id','=',$uid));
		}
	}
	public function get_order_status($status){
		if($status == '0'){
			echo 'Order Placed';
		}else if($status == '1'){
			echo 'Paid';
		}else if($status == '1'){
			echo 'Payment Canceled';
		}else if($status == '2'){
			echo 'Accepted by stockiest';
		}else if($status == '3'){
			echo 'Canceled by stockiest';
		}else if($status == '4'){
			echo 'Accepted by dealer';
		}else if($status == '5'){
			echo 'Canceled by dealer';
		}else if($status == '6'){
			echo 'Confirmed by Company';
		}else if($status == '7'){
			echo 'Canceled by Company';
		}
	}
	public function get_total_amount($invoice){
		$query_class = query::g();
		$search = $query_class->query('rows',array('*','order_details','invid','=',$invoice));
		$total_sum = 0;
		foreach($search as $details){
			$price = $query_class->query('single_data',array('`price`','products','id','=',$details['pid'],'price'));
			$total_single_price = $price * $details['qnty'];
			$total_sum = $total_sum + $total_single_price;
		}
		return $total_sum;
	}
}


?>