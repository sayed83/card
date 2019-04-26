<?php
	include('include/head.php');
	include('include/header.php');
?>
	
	<section class="registration">	
		<div class="reg-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">					
						<div class="reg-deatails">
							<div class="row">
								<div class="reg-title col-md-10 col-sm-12 col-xs-12">
									<h3 class="text-center">Create Your Account</h3>
								</div>
							</div>
							<div class="row">			
								<div class="col-md-6 col-sm-6">
									<form 
									action="api/register.php"
									alert="no"
									redirect="index"
									id="registration_form"
									class="ez_form" 
									action="#" 
									
	
									>
										<div class="form-group">
											<label for="Name">Name</label>
											<input type="text" name="name"  class="form-control" id="Name" aria-describedby="nameHelp" placeholder="Name" >						
										</div>
										<div class="form-group">
											<label for="Mobile">Mobile Number</label>
											<input type="text" name="number" class="form-control" id="Mobile" aria-describedby="mobileHelp" placeholder="Mobile Number" >						
										</div>
										<div class="form-group">
											<label for="NID">NID</label>
											<input type="text" name="nid"  class="form-control" id="NID" aria-describedby="nidHelp" placeholder="NID">						
										</div>
										<div class="form-group">
											<label for="CardNumber">Reference Card Number</label>
											<input type="text" name="ref"  class="form-control" id="CardNumber" aria-describedby="cardHelp" placeholder="Reference card number">						
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
										</div>
										<div class="form-group col-md-6">
										  <label for="inputState">Gender</label>
										  <select name="gender"  id="inputState" class="form-control">
											<option selected>Choose...</option>
											<option>Male</option>
											<option>Female</option>
										  </select>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="gridCheck"/>
											<label class="form-check-label" for="gridCheck">i agree to the <a href="">terms and conditions</a> 
											</label>
										</div>
										<div class="form-group registration_form" ></div>
									  <input type="submit" class="btn btn-primary col"  value="SIGN UP"  />
									</form>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="login-wrapper text-center">
										<p>
											<span>or</span>
											Connect with
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
									<p>Already have an account?
										<a href="login.php" class="link" rev="register">Login Now </a>
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