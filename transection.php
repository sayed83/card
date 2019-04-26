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
					My Transections
				</div>
				<div class="card-body table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Remarks</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
							<tr>
								<td>1</td>
								<td>sdfsdf</td>
								<td>2514</td>
								<td>15/2/5</td>
								<td>sdf</td>
							</tr>
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