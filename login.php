<?php
	include('include/head.php');
	include('include/header.php');
	
?>

	<section class="login">	
		<div class="login-inner">
			<div class="container">			
				<div class="row">			
					<div class="col-md-10 col-sm-12 col-xs-12">
						<div class="login-deatails">
							<div class="row">
								<div class="col-md-12">
									<div class="log-title">
										<h3>Sign In Your Account</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<form action="api/login.php" alert="yes" redirect="index" id="login_form" class="ez_form"    method="post"  >
								
										<div class="form-group">
											<input type="text" name="number" class="form-control" id="Mobile" aria-describedby="mobileHelp" required="" placeholder="Mobile Number*" >						
										</div>
										<div class="form-group">
											<input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password*">
										</div>
										<div class="form-group login_form" ></div>
										<P class="forget">
											<a href="#">Forgotten Password?</a>
										</P>
									  <button type="submit" class="btn btn-primary col">Sing In</button>
									</form>								
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="login-wrapper text-center">
										<p>
											<span>or</span>
											login with
										</p>
										<div class="login-social">
											<ul>
												<li>
													<a href="">
														<i class="fab fa-facebook-f"></i>
													</a>
												</li>
												<li>
													<a href="">
														<i class="fab fa-twitter"></i>
													</a>
												</li>
												<li>
													<a href="">
														<i class="fab fa-google"></i>
													</a>
												</li>
											</ul>
										
										</div>
									</div>
								
								</div>
							
							</div>	
							<div class="row">
								<div class="register-link col-md-12">
								<p>New to Easy Card?
									<a href="registration.php" class="link" rev="register">Register Now </a>
								</p>
							</div>
							
							</div>	
							
						</div>
					</div>				
				</div>			
			</div>	
		</div>
	</section>
	

<?php
	include('include/footer.php');
?>