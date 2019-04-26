<?php
if(isset($_POST['orderid'])){
	$orderid = input::get('orderid');
	$orderinfo = $query_class->query('rows',array('*','invoice','id','=',$orderid));
	$orderinfo = mysqli_fetch_assoc($orderinfo);
	$paytype = $orderinfo['paytype'];
	$uid = $orderinfo['uid'];
	$adminid = $_SESSION[config::get('session/session_name')];
	$adminNumber = $query_class->query('single_data',array('`number`','admin','id','=',$adminid,'number'));
	//$update = $query_class->update('invoice',array('status' => '1','accept' => $adminNumber),array('id','=',$orderinfo['id']));
	$token = $orderinfo['token'];
	$products = $query_class->query('rows',array('*','orders','token','=',$token));
	foreach($products as $product){
		$pid = $product['pid'];
	}
	//head::to('orders');
}
if(isset($_GET['cancel'])){
	$orderid = sanetize($_GET['cancel']);
	$orderinfo = $query_class->query('rows',array('*','invoice','id','=',$orderid));
	$orderinfo = mysqli_fetch_assoc($orderinfo);
	$paytype = $orderinfo['paytype'];
	if($paytype == 'bkash'){
		$update = $query_class->update('invoice',array('status' => '3'),array('id','=',$orderinfo['id']));
		head::to('orders');
	}else if($paytype == 'balance'){
		$uid  = $orderinfo['uid'];
		$old_balance = user::g()->balance($uid);
		$amount = $orderinfo['amount'];
		$new_balance = $old_balance + $amount;
		$update_balance = user::g()->update_balance($uid,$new_balance);
		other::g()->accounts_update('user',$uid,'Balance amount returned for order cancelation.',$amount,'cr');
		$update = $query_class->update('invoice',array('status' => '3'),array('id','=',$orderinfo['id']));
		head::to('orders');
	}
}
/*
if($paytype == 'bkash'){
		$update = $query_class->update('invoice',array('status' => '1'),array('id','=',$orderinfo['id']));
		head::to('orders');
	}else if($paytype == 'balance'){
		$uid  = $orderinfo['uid'];
		$old_balance = user::g()->balance($uid);
		$new_balance = $old_balance + $orderinfo['amount'];
		$update_balance = user::g()->update_balance($uid,$new_balance);
	}
*/
?>