<?php
include '../conf/api_init.php';

$query_class = query::g();
$response = array();
$response['success'] = 0;

if(isset($_POST['sender_number'])){
	$id = input::get('cashout_id'); 
	$sender = input::get('sender_number'); 
    $trxid = input::get('trxid');
	if(!empty($sender) && !empty($trxid)){
		$update = $query_class->update('mbank_withdraw',array('status' => '1','sender'=>$sender,'trxid'=>$trxid),array('id','=',$id));
		if($update == true){
			$response['success'] = 1;
			$response['message'] = 'Successfully Done.';
		}
	}else{
		$response['message'] = 'All Fields Required';
	}
}
if(isset($_POST['bank_cashout_id'])){
	$id = input::get('bank_cashout_id');
    $trxid = input::get('bank_trxid');
	if(!empty($trxid)){
		$update = $query_class->update('bank_withdraw',array('status' => '1','trxid'=>$trxid),array('id','=',$id));
		if($update == true){
			$response['success'] = 1;
			$response['message'] = 'Successfully Done.';
		}
	}else{
		$response['message'] = 'All Fields Required';
	}
}
if(isset($_POST['cancel_id'])){
	$id = input::get('cancel_id');
	$reqinfo = $query_class->multi_query(array('*','mbank_withdraw'),array("`id` = '$id' ORDER BY `id` DESC LIMIT 1"));
	$reqinfo = mysqli_fetch_assoc($reqinfo);
	$uid = $reqinfo['uid'];
	$amount = $reqinfo['amount'];
	$utype = $query_class->query('single_data',array('`acc_type`','users','id','=',$uid,'acc_type'));
	if($utype == '1'){
		$old_balance = user::g()->get_balance_others('CW',$uid);
		$update = user::g()->update_balance_others('CW',$amount,'add',$uid);
	}else if($utype == '2'){
		$old_balance = user::g()->get_balance_others('CW',$uid);
		$update = user::g()->update_balance_others('CW',$amount,'add',$uid);
	}else if($utype == '3'){
		$old_balance = user::g()->get_balance_others('SCW',$uid);
		$update = user::g()->update_balance_others('SCW',$amount,'add',$uid);
	}else if($utype == '4'){
		$old_balance = user::g()->get_balance_others('DCW',$uid);
		$update = user::g()->update_balance_others('DCW',$amount,'add',$uid);
	}
	
	//other::g()->accounts_update($requester,$amount,'Cashout request canceled and refunded on balance','cashout cancel',$old_balance,$new_balance,other::dates(),other::times());
	$update_status = $query_class->update('mbank_withdraw',array('status'=>2),array('id','=',$id));
	$response['success'] = 1;
	$response['message'] = 'Canceled';
	
}
if(isset($_POST['bank_cancel_id'])){
	$id = input::get('bank_cancel_id');
	$reqinfo = $query_class->multi_query(array('*','bank_withdraw'),array("`id` = '$id' ORDER BY `id` DESC LIMIT 1"));
	$reqinfo = mysqli_fetch_assoc($reqinfo);
	$uid = $reqinfo['uid'];
	$amount = $reqinfo['amount'];
	$utype = $query_class->query('single_data',array('`acc_type`','users','id','=',$uid,'acc_type'));
	if($utype == '1'){
		$old_balance = user::g()->get_balance_others('CW',$uid);
		$update = user::g()->update_balance_others('CW',$amount,'add',$uid);
	}else if($utype == '2'){
		$old_balance = user::g()->get_balance_others('CW',$uid);
		$update = user::g()->update_balance_others('CW',$amount,'add',$uid);
	}else if($utype == '3'){
		$old_balance = user::g()->get_balance_others('SCW',$uid);
		$update = user::g()->update_balance_others('SCW',$amount,'add',$uid);
	}else if($utype == '4'){
		$old_balance = user::g()->get_balance_others('DCW',$uid);
		$update = user::g()->update_balance_others('DCW',$amount,'add',$uid);
	}
	
	//other::g()->accounts_update($requester,$amount,'Cashout request canceled and refunded on balance','cashout cancel',$old_balance,$new_balance,other::dates(),other::times());
	$update_status = $query_class->update('bank_withdraw',array('status'=>2),array('id','=',$id));
	$response['success'] = 1;
	$response['message'] = 'Canceled';
	
}

echo json_encode($response);
?>
