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
					My Account
				</div>
				<div class="card-body">
					
					<div class="">
						
					</div>
				</div>
			</div>
		</div>
	</div>						
</div>
	

<?php
	include('include/footer.php');
?>