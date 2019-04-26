<?php
class admin{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new admin();
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
		if(isset($_SESSION[config::get('session/session_name')])){
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
	public function checkaccess($id, $page){
		
		$sql = query::g()->query('rows',array('*','admin','id','=',$id));
		$data = mysqli_fetch_assoc($sql);
		
		if($data[$page] == '0'){
			return false;
		}else if($data[$page] == '1'){
			return true;
		}
	}
}


?>