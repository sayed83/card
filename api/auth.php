<?php
include '../conf/api_init.php';
$response = array();
$response['success'] = 0;

if(user::loggedin() == true){
	$response['success'] = 1;
}


echo json_encode($response);
?>