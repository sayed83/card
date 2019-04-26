<?php
session_start();
ob_start();
$GLOBALS['config'] = array(
	'mysqli' => array(
		/*'host' => 'localhost', 
		'user' => 'thealina_user', 
		'password' => 'l$j71[NM(,TM', 
		'db' => 'thealina_data', 
		'host' => 'localhost', 
		'user' => 'itechino_iuser', 
		'password' => 'wxdGjBsAlr.{', 
		'db' => 'itechino_imanager', 
		*/
		'host' => 'localhost', 
		'user' => 'root', 
		'password' => '', 
		'db' => 'easycard', 
	),
	'session' => array(
		'session_id' => null,
		'session_name' => 'i_login',
		'session_name_customer' => 'c_login',
		'session_name_portal' => 'p_login',
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
$query_class = query::g();
?>