<?php
	include('include/head.php');
	include('include/header.php');
	if(!isset($_SESSION[config::get('session/session_name')])){
		head::to('index');
	}
	if(isset($_POST['amount'])){
		$uid = $_SESSION[config::get('session/session_name')];
		$amount = sanetize($_POST['amount']); 
		$sender = sanetize($_POST['sender']); 
		$trxid = sanetize($_POST['trxid']); 
		if(!empty($amount) && !empty($sender) && !empty($trxid)){
			$insert = mysqli_query(DB::g()->connect(),"INSERT INTO `fund_request` (`uid`,`amount`,`sender`,`trxid`)VALUES('$uid','$amount','$sender','$trxid')");
			
		}else{
			echo 'All Fields Required';
		}
	}
	
	
?>
<div class="container ">
	<div class="row mt-5 mb-5">
		<div class="col-md-3">
		<?php
			include('include/nav.php');
		?>					
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-header">
					My Account
				</div>
				<div class="card-body ">
					<form action="fundmanagement.php" method="post">
					<div class="row">
					<div class="col-md-12">
						<div class="form-group col-md-4">
							<input type="text" placeholder="Amount" name="amount"  class="form-control" />
						</div>
						<div class="form-group col-md-4">
							<input type="text" placeholder="Sender" name="sender"   class="form-control" />
						</div>
						<div class="form-group col-md-4">
							<input type="text" placeholder="Trx ID" name="trxid"   class="form-control" />
						</div>
						<div class="form-group col-md-12">
							<input type="submit" value="ADD FUND"  class="btn btn-primary col" />
						</div>
					</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>						
</div>
	

<?php
	include('include/footer.php');
?>