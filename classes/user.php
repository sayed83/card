<?php
class user{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new user();
		}
		return self::$_instance;
	}
	public static function loggedin(){
		if(isset($_SESSION[config::get('session/session_name')])){
			return true;
		}else{
			return false;
		}
	}
	public function check_placement($placement,$side){
		$query_class = query::g();
		$placement_id = $query_class->query('single_data',array('`id`','users','username','=',$placement,'id'));
		$query = $query_class->multi_query(array('*','binary_tree'),array("`uid` = '$placement_id'"));
		$fetch = mysqli_fetch_assoc($query);
		return $fetch[$side];
	}
	public function calculate_pv(){
		$query_class = query::g();
		$total_pv = 0;
		foreach($_SESSION['cart'] as $pid => $qnty){
			$pv = $query_class->query('single_data',array('`pv`','products','id','=',$pid,'pv'));
			$sum_pv = $qnty * $pv;
			$total_pv = $total_pv + $sum_pv;
		}
		return $total_pv;
	}
	public function check_account($account_type){
		if($_SESSION['purchase_type'] == 'fromCompany'){
			if($account_type == '4'){
				return true;
			}else{
				return false;
			}
		}else if($_SESSION['purchase_type'] == 'fromDealer'){
			if($account_type == '3'){
				return true;
			}else{
				return false;
			}
		}else if($_SESSION['purchase_type'] == 'fromStockiest'){
			if($account_type == '2'){
				return true;
			}else if($account_type == '1'){
				return true;
			}else{
				return false;
			}
		}
	}
	public function transection_permission($from,$to,$trtype,$user){
		$query_class = query::g();
		if($trtype == 'others'){
			if($from == 'CW' && $to == 'CW'){
				return true;
			}else if($from == 'CW' && $to == 'PW'){
				return true;
			}else if($from == 'PW' && $to == 'PW'){
				return true;
			}else if($from == 'DPW' && $to == 'SPW'){
				return true;
			}else{
				return false;
			}
		}else if($trtype == 'self'){
			if($from == 'CW' && $to == 'PW'){
				return true;
			}else if($from == 'SCW' && $to == 'SPW'){
				return true;
			}else if($from == 'DCW' && $to == 'DPW'){
				return true;
			}else{
				return false;
			}
		}else if($trtype == 'stockiest'){
			$user_type = $query_class->query('single_data',array('`acc_type`','users','username','=',$user,'acc_type'));
			if($user_type == '3'){
				if($from == 'CW' && $to == 'SCW'){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
			
		}
	}
	public function transfer_check_balance($from,$amount){
		$query_class = query::g();
		$uid = $_SESSION[config::get('session/session_name')];
		if($from == 'CW'){
			$old_balance = $query_class->query('single_data',array('`cw`','users','id','=',$uid,'cw'));
			if($old_balance > $amount){
				return true;
			}
		}else if($from == 'PW'){
			$old_balance = $query_class->query('single_data',array('`pw`','users','id','=',$uid,'pw'));
			if($old_balance > $amount){
				return true;
			}
		}else if($from == 'SCW'){
			$old_balance = $query_class->query('single_data',array('`scw`','users','id','=',$uid,'scw'));
			if($old_balance > $amount){
				return true;
			}
		}else if($from == 'SPW'){
			$old_balance = $query_class->query('single_data',array('`spw`','users','id','=',$uid,'spw'));
			if($old_balance > $amount){
				return true;
			}
		}else if($from == 'DCW'){
			$old_balance = $query_class->query('single_data',array('`dcw`','users','id','=',$uid,'dcw'));
			if($old_balance > $amount){
				return true;
			}
		}else if($from == 'DPW'){
			$old_balance = $query_class->query('single_data',array('`dpw`','users','id','=',$uid,'dpw'));
			if($old_balance > $amount){
				return true;
			}
		}
	}
	public function get_balance($from){
		$query_class = query::g();
		$uid = $_SESSION[config::get('session/session_name')];
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
	public function update_balance($from,$amount,$update_type){
		$query_class = query::g();
		$uid = $_SESSION[config::get('session/session_name')];
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
}


?>