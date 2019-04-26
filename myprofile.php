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
					<h5 class="text-center"> My Profile </h5>
				</div>
				<div class="card-body">					
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<img src="img/profile/demo.png" width="100%"  alt="" />
						</div>
						<div class="col-md-6 ">
							<div class="row">
								<table>
									<tr>
										<th>
											Name: <br>
										</th>
										<td>
											Sayed
										</td>
									</tr>
									<tr>
										<th>
											Mobile: <br>
										</th>
										<td>
											01829321883
										</td>
									</tr>
									<tr>
										<th>
											National ID: <br>
										</th>
										<td>
											2019254781245
										</td>
									</tr>
									<tr>
										<th>
											Reference Card: <br>
										</th>
										<td>
											Sayed Hossain
										</td>
									</tr>
									<tr>
										<th>
											Gender: <br>
										</th>
										<td>
											Male
										</td>
									</tr>										
								</table>
							</div>			
						</div>								
					</div>					
				</div>
			</div>
		</div>
	</div>						
</div>
	

<?php
	include('include/footer.php');
?>