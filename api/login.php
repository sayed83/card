<?php
	include '../conf/api_init.php';
	$response = array();
	$response['success']=0;
	$query_class = query::g();
	if(isset($_POST['number'])){
		$number = sanetize($_POST['number']);
		$password =sanetize($_POST['password']);
		$passhash = hashes::g()->hashes('password',$password);
		if(!empty($number) && !empty($password)){
			$check_user = $query_class->multi_query(array('*','registration'),array("`mobile` = '$number'","`password` = '$passhash' ORDER BY `id` DESC LIMIT 1"));
			
			
			if($check_user->num_rows==1){
				$fetch = mysqli_fetch_assoc($check_user);
				$id = $fetch['id'];
				$_SESSION[config::get('session/session_name')] = $id;
				$response['success'] = 1;
			}else{
				$response['message']= 'Number or password worng!';
			}
		}else{
			$response['message'] = 'All Fields Required!';
		}
	}
	echo json_encode($response)
?>