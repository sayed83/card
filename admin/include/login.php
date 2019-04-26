<?php
include '../conf/conn.php';
include '../conf/common_function.php';
include '../conf/function.php';

$response = array();
$response['success'] = 0;
if(isset($_POST['login_number'])){
	$number = sanetize($_POST['login_number']);
	$password = sanetize($_POST['login_password']);
	
	$passhash = md5(sha1(md5($password)));
	if(!empty($number) && !empty($password)){
		$sql2 = mysqli_query($db, "SELECT * FROM `admin` WHERE `number` = '$number' AND `password` = '$passhash'");
		if($sql2->num_rows == 1){
			$data = mysqli_fetch_assoc($sql2);
			$rand = rand(100000,900000);
			$_SESSION['otp']['otp_number'] = $rand;
			$_SESSION['otp']['admin_id'] = $data['id'];
			sendsms($number,'Your SELF EMPLOYMENTS OTP is '.$rand);
			$response['success'] = 1;
		}else{
			$response['message'] = 'Number or Password Wrong';
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
