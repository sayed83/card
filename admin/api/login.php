<?php
include '../conf/api_init.php';

$query_class = query::g();
$response = array();
$response['success'] = 0;

if(isset($_POST['login_number'])){
	$number = input::get('login_number');
	$password = input::get('login_password');
	$passhash = hashes::g()->hashes('password',$password);
	if(!empty($number) && !empty($password)){
		$sql2 = $query_class->multi_query(array('*','admin'),array("`number` = '$number'","`password`= '$passhash'"));
		if($sql2->num_rows == 1){
			$data = mysqli_fetch_assoc($sql2);
			$rand = rand(100000,900000);
			$_SESSION[config::get('session/session_name')] = $data['id'];
			//$_SESSION['otp']['otp_number'] = $rand;
			//$_SESSION['otp']['admin_id'] = $data['id'];
			//sendsms($number,'Your SELF EMPLOYMENTS OTP is '.$rand);
			$response['success'] = 1;
		}else{
			$response['message'] = ' Number or password wrong';
		}
	}else{
		$response['message'] = 'Number and password required';
	}
}
if(isset($_POST['login_otp'])){
    $otp = sanetize($_POST['login_otp']);
    if(!empty($otp)){
        if($otp == $_SESSION['otp']['otp_number']){
            $id = $_SESSION['otp']['admin_id'];
            $_SESSION['flc_admin'] = $id;
            $response['success'] = 1;
        }else{
            $response['message'] = 'Wrong OTP!';
        }
    }else{
        $response['message'] = 'OTP Required';
    }
}

echo json_encode($response);
?>
