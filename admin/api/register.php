<?php
include '../conf/conn.php';
include '../conf/common_function.php';
include '../conf/function.php';

$response = array();
$response['success'] = 0;
if(isset($_POST['reg_number'])){
	$name = sanetize($_POST['reg_name']);
	$number = sanetize($_POST['reg_number']);
	$password = sanetize($_POST['reg_password']);
	$conpass = sanetize($_POST['reg_conpass']);
	$email = sanetize($_POST['reg_email']);
	$passhash = md5(sha1(md5($password)));
	$nid = sanetize($_POST['reg_nid']);
	$ref = sanetize($_POST['reg_referer']);
	if(empty($ref)){
		$ref = '01813404900';
	}
	if(!empty($name) && !empty($number) && !empty($password) && !empty($conpass) && !empty($email)){
		if(checknumber($number) == true){
			if(get_table_data_specific('flc_users','nid',$nid)->num_rows == 0){
				if(get_table_data_specific('flc_users','number',$number)->num_rows == 0){
					if(get_table_data_specific('flc_users','number',$ref)->num_rows == 1){
						$referer = get_table_data_single_row('flc_users','number',$ref,'id');
						$pin = rand(100000,900000);
						$pinhash = md5($pin);
						$sql = mysqli_query($db, "INSERT INTO `flc_users` 
						(`number`,`password`,`pin`,`pinnormal`,`type`,`status`,`j_date`,`nid`,`ref`,`username`)
						VALUES
						('$number','$passhash','$pinhash','$pin','0','0',NOW(),'$nid','$referer','$name');
						");
						$message = "Congratulations, Your account successfully created, Your pin number is ".$pin;
						sendsms($number, $message);
						$response['success'] = 1;
						$sql2 = mysqli_query($db, "SELECT * FROM `flc_users` WHERE `number` = '$number' AND `password` = '$passhash'");
						$data = mysqli_fetch_assoc($sql2);
						$_SESSION['flc_logged'] = $data['id'];
					}else{
						$response['message'] = 'An user already exists along with this number';
					}
				}else{
					$response['message'] = 'An user already exists along with this number';
				}
			}else{
				$response['message'] = 'NID number already used';
			}
		}else{
			$response['message'] = 'Invalid Number';
		}
	}else{
		$response['message'] = 'All Fields Required';
	}
}


echo json_encode($response);
?>