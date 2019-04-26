<?php
include '../conf/api_init.php';
$response = array();
$response['success'] = 0;

if(isset($_POST['old_num_val'])){
	//$method = input::get('methods');
	$_SESSION['old_val'] = input::get('old_num_val');
	$_SESSION['method'] = input::get('methods');
}
if(isset($_POST['new_num_val'])){
	$old_num = $_SESSION['old_val'];
	$new_val = input::get('new_num_val');
	$method = $_SESSION['method'];
	if($method == '+'){
		$result = $old_num + $new_val;
	}else if($method == '-'){
		$result = $old_num - $new_val;
	}else if($method == '*'){
		$result = $old_num * $new_val;
	}else if($method == '/'){
		$result = $old_num / $new_val;
	}
	$response['message'] = $result;
}

echo json_encode($response);
?>