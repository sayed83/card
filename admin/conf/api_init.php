<?php
session_start();
ob_start();
$GLOBALS['config'] = array(
	'mysqli' => array(
		'host' => '127.0.0.1', 
		'user' => 'root', 
		'password' => '', 
		'db' => 'easycard', 
	),
	'session' => array(
		'session_id' => null,
		'session_name' => 'admin'
	),
);

spl_autoload_register(function($class){
	require_once '../classes/'.$class.'.php';
});
function sanetize($data){
	$mysqli = DB::g()->connect();
	$data = $mysqli->real_escape_string(htmlentities(htmlspecialchars($data),ENT_QUOTES, "UTF-8"));
	return $data;
}
?>