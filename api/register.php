<?php
include '../conf/api_init.php';
$response = array();
$response['success'] = 0;
$query_class = query::g();
if(isset($_POST['name'])){
	$name = sanetize($_POST['name']);
	$number = sanetize($_POST['number']);
	$ref = sanetize($_POST['ref']);
	$nid = sanetize($_POST['nid']);
	$password = sanetize($_POST['password']);
	$gender = sanetize($_POST['gender']);
	$passhash = hashes::g()->hashes('password',$password);
	if(!empty($name) && !empty($number) && !empty($ref) && !empty($password)&& !empty($nid) && !empty($gender) ){
		$check_user = $query_class->multi_query(array('`id`','registration'),array("`mobile` = '$number' ORDER BY `id` DESC LIMIT 1"));
		if($check_user->num_rows == 0){
			$check_ref = $query_class->multi_query(array('`id`','registration'),array("`mobile` = '$ref' ORDER BY `id` DESC LIMIT 1"));
			if($check_ref->num_rows == 1){
					$sql = $query_class->insert('registration',array(
					'name'=>$name,
					'mobile'=>$number,
					'nid'=>$nid,
					'rf_card'=>$ref,
					'password'=>$passhash,
					'gender'=>$gender,
				));
				
				if($sql == true){
					$query = $query_class->multi_query(array('`id`','registration'),array("`name` = '$name'","`mobile` = '$number' ORDER BY `id` DESC LIMIT 1"));
					$fetch = mysqli_fetch_assoc($query);
					$last_id = $fetch['id'];
					$_SESSION[config::get('session/session_name')] = $last_id;
					$response['success'] =  1;
					$message = 'Congratulations. Dear '.$name.' your easycard account has been created successfully. Thanks for joining.';
					other::g()->sendsms($number,$message);
					$response['message'] = 'Registration Successful';
				}
			}else{
				$response['message'] = 'Referer doesn\'t exists.';
			}
		}else{
			$response['message'] = 'Number Already Used!';
		}
	}else{
		$response['message'] =  'All fields Required';
	}
}
echo json_encode($response);
?>