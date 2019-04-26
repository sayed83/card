	<header>
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-6">
						<div class="logo">
							<a href="index.php">
								<img src="img/easycard.png" alt="EasyCard" class="img-responsive">
							</a>					
						</div>				
					</div>		
					<div class="col-md-4"></div>				
					<div class="col-md-5 col-sm-6 col-xs-5 pull-right">
						<div class="header-top-search">
							<div class="coupon-submit-btn">
								<a class="btn" href="">
									<div class=" hidden-xs">Join as a Vendor</div>
									<div class=" hidden-md  hidden-lg hidden-sm">
										<i class="fa fa-plus"></i>
									</div>
								</a>
							</div>
							
							<div class="cbx-search">
								<a id="showSearchBar" class="btn btn-default btn-lg btn-brand" role="button" data-toggle="collapse" href="">
									<i class="fas fa-search"></i>
								</a>

							</div>
						
						</div>
					</div>				
				</div>	
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<nav class="navbar navbar-expand-lg navbar-light  col-md-8 col-sm-8">
					  <a class="navbar-brand" href="#"></a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						  <li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="">About</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="">Policy</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="">Benefits</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="">Opportunities</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="">Vendor's</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						  </li>
						 
						</ul>
					  </div>
					</nav>
					
					<div class="login-register col-md-4 col-sm-4" style="width: 100%;float: right; padding: 14px;">
				    
						<?php
							if(isset($_SESSION[config::get('session/session_name')])){
								?>
							
							<ul class="nav navbar-nav navbar-right hidden-xs">								
								<li>
									<a href="myaccount.php" class="btn btn-primary btn-sm">
										My Account
									</a>
								
								
									<a href="logout.php" class="btn btn-primary btn-sm"><i class="fas fa-sign-in-alt" style="color:#F6B41F;"></i> Logout</a>
								</li>
							</ul>
								
								<?php
							}else{
								?>
						<ul>
							<li>
								<a href="login.php" class="btn btn-brand">Login/Signup
								</a>
							</li>
							<!--<li>
								<a href="registration.php" class="btn btn-brand"><i class="fas fa-sign-in-alt" style="color:#F6B41F;"></i> Register</a>
							</li>-->
						</ul>
							<?php
							}
								?>
					</div>					
				</div>
			</div>			
		</div>	 
	</header>
