<?php
  include 'include/head.php';
 
  
?>

<div class="container-fluid" style="background-image:url('images/self-employed.jpg');background-size:cover;background-repeat:no-repeat;min-height:700px;background-color:#5C5751"  >
	<div class="container non_back" >
		<div class="panel panel-default col-md-4 col-md-offset-4 row" style="border:none;margin-top:15%;background-color: rgba(0,0,0,0.5);" >
			<div class="panel-heading row text-center" style="background-color:transparent;border:none;" >
				<h2 style="color:#fff;" >Administration</h2>
				
			</div>
			<div class="panel-body">
				<?php if(!isset($_SESSION['otp'])){?>
				<form action="login.php" method="post" id="login_form" >
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">+88 </span>
							<input name="login_number" type="text" placeholder="Number"  class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input  name="login_password"  type="password" placeholder="Password"  class="form-control" />
						</div>
					</div>
					<span id="login_form_error"></span>
					<div class="form-group">
						<input type="submit" value="Login" class="form-control btn btn-success" />
					</div>
					<div class="form-group">
						
						
						<a href="forgot.php" style="color:#fff;text-decoration:none;" >Forgot Password?</a>
						<br />
					</div>
				</form>
				<?php }else if(isset($_SESSION['otp'])){?>
				    <form action="login.php" method="post" id="otp_form" >
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock" ></i></span>
							<input name="login_otp" type="text" placeholder="INSERT OTP"  class="form-control" />
						</div>
					</div>
					<span id="otp_form_error"></span>
					<div class="form-group">
						<input type="submit" value="Login" class=" btn btn-success" />
						<a href="logout.php" class=" btn btn-danger" >Cancel</a>
					</div>
					<div class="form-group">
						<a href="forgot.php" style="color:#fff;text-decoration:none;" >Forgot Password?</a>
						<br />
					</div>
				</form>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<?php
  include 'include/footer.php';
?>