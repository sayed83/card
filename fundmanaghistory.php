<?php
	include('include/head.php');
	include('include/header.php');
	if(!isset($_SESSION[config::get('session/session_name')])){
		head::to('index');
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
					Fund Request History
				</div>
				<div class="card-body table-responsive">
					
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Amount</th>
								<th>Sender Number</th>
								<th>Trxid</th>
								
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$uid = $_SESSION[config::get('session/session_name')];
							$histories = mysqli_query(DB::g()->connect(),"SELECT * FROM `fund_request` WHERE `uid` = '$uid'");
							foreach($histories as $history){?>
								<tr>
									<td><?php echo $history['id'];?></td>
									<td><?php echo $history['amount'];?></td>
									<td><?php echo $history['sender'];?></td>
									<td><?php echo $history['trxid'];?></td>
									<td><?php if($history['status'] == '0'){
										echo 'Pending';
									}else if($history['status'] == '1'){
										echo 'Accepted';
									}else if($history['status'] == '2'){
										echo 'Canceled';
									}?></td>
									
								</tr>
							<?php }
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>						
</div>
	

<?php
	include('include/footer.php');
?>