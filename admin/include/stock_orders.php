<?php
if(isset($_POST['orderid'])){
	$orderid = input::get('orderid');
	$orderinfo = $query_class->query('rows',array('*','dp_invoice','id','=',$orderid));
	$orderinfo = mysqli_fetch_assoc($orderinfo);
	$uid = $orderinfo['uid'];
	$token = $orderinfo['token'];
	$adminid = $_SESSION[config::get('session/session_name')];
	$adminNumber = $query_class->query('single_data',array('`number`','admin','id','=',$adminid,'number'));
	$details = $query_class->query('rows',array('*','dp_orders','token','=',$token));
	foreach($details as $pddetails){
		$pid  = $pddetails['pid'];
		$qnty  = $pddetails['qnty'];
		$check = $query_class->multi_query(array('*','stock'),array("`dpid` = '$uid'","`pid` = '$pid'"));
		if($check->num_rows == 0){
			$query_class->insert('stock',array(
			'dpid' => $uid,
			'pid' => $pid,
			'stock' => $qnty,
			'dp_name' => user::g()->userinfo($uid,'username')
			)
			);
		}else if($check->num_rows > 0){
			$stockdata = mysqli_fetch_assoc($check);
			$stockID = $stockdata['id'];
			$old_stock = $stockdata['stock'];
			$new_stock = $old_stock + $qnty;
			$update = $query_class->update('stock',array('stock' => $new_stock),array('id','=',$stockID));
			
		}
	}
	
	$update = $query_class->update('dp_invoice',array('status' => '1','accept' => $adminNumber),array('id','=',$orderinfo['id']));
	head::to('stock_orders');
}
if(isset($_GET['cancel'])){
	$orderid = sanetize($_GET['cancel']);
	$orderinfo = $query_class->query('rows',array('*','dp_invoice','id','=',$orderid));
	$orderinfo = mysqli_fetch_assoc($orderinfo);
	$paytype = $orderinfo['paytype'];
	$update = $query_class->update('dp_invoice',array('status' => '2'),array('id','=',$orderinfo['id']));
		head::to('stock_orders');
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