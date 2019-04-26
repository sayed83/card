<?php
if(admin::loggedin() == false){
	header("Location:login.php");
}else{
	$adminid = $_SESSION[config::get('session/session_name')];
}
?>
