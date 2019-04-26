<?php
	include('include/head.php');
	include('include/header.php');
	//print_r($_SESSION);
?>
	<section class="slider">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-xs-12 slide">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
							  <img src="img/slide/banner.jpg" class="d-block w-100" alt="...">
								 
							</div>
							<div class="carousel-item">
							  <img src="img/slide/BlogBanners.jpg" class="d-block w-100" alt="...">					  
							</div>
							<div class="carousel-item">
							  <img src="img/slide/financial.jpg" class="d-block w-100" alt="...">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						 </a>
					</div>
				
				</div>
				
				<div class="col-md-4 col-xs-12 slide-right">
					<div class="row">
						<div class="col-md-12 col-xs-6">
							<div class="banner-wrapper">
								<a href="">
									<img src="img/slide/banner1.jpg" alt="" />
								</a>							
							</div>
						
						</div>
						<div class="col-md-12 col-xs-6">
							<div class="banner-wrapper">
								<a href="">
									<img src="img/slide/banner2.jpg" alt="" />
								</a>							
							</div>						
						</div>				
					</div>			
				</div>			
			</div>
			
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="banner-wrapper">
						<a href="">
							<img src="img/banner3.jpg" alt="" />
						</a>							
					</div>						
				</div>			
			</div>		
		</div>
	
	</section>

	<section class="col-lg-10 col-md-10">		
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Special Flash</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="coupon-modal-content">
						<div class="row">
							<div class="col-md-5 col-sm-5">
								<div class="single-coupon-thumb">
									<img src="img/deal/deal12.jpg" alt="Coupon" class="img-thumbnail img-responsive">
								</div>							
							</div>						
							<div class="col-md-7 col-sm-7">
								<p>DEAL ACTIVATED, NO COUPON CODE REQUIRED!</p>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Go To Store</button>
							
							</div>
						
						</div>
					</div>
				</div>
			  <div class="modal-footer">
				<img src="img/banner3.jpg" alt="" />
			  </div>
			</div>
		  </div>
		</div>	
	</section>
	
	<section class="new-deal">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-xs-12">
					<h3 class="heading">New Deal</h3>				
				</div>
				
				<div class="col-md-2 col-xs-12">
					<div class="viewall">
						<a href="">View All</a>
					
					</div>				
				</div>
			
			</div>
			<div class="new-deal-offer">
				<div class="row">
					<div class="new-deal-post col-sm-6 col-md-3">
						<div class="new-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal1.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">75%</div>
									</div>
								  </div>
								</div>
							</div>							
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="new-deal-post col-sm-6 col-md-3">
						<div class="new-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal2.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">25%</div>
									</div>
								  </div>
								</div>
							</div>
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>								
							</div>
						</div>
					</div>
					<div class="new-deal-post col-sm-6 col-md-3">
						<div class="new-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal3.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">35%</div>
									</div>
								  </div>
								</div>
							</div>
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>								
							</div>
						</div>
					</div>
					<div class="new-deal-post col-sm-6 col-md-3">
						<div class="new-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal4.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">45%</div>
									</div>
								  </div>
								</div>
							</div>
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>
								
							</div>
						</div>
					</div>				
				</div>			
			</div>		
		</div>	
	</section>
	
	<section class="popular-deal">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-xs-12">
					<h3 class="heading">Popular Deal</h3>				
				</div>
				
				<div class="col-md-2 col-xs-12">
					<div class="viewall">
						<a href="">View All</a>
					
					</div>				
				</div>
			
			</div>
			<div class="popular-deal-offer">
				<div class="row">
					<div class="popular-deal-post col-sm-6 col-md-3">
						<div class="popular-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal5.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">75%</div>
									</div>
								  </div>
								</div>
							</div>							
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="popular-deal-post col-sm-6 col-md-3">
						<div class="popular-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal6.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">25%</div>
									</div>
								  </div>
								</div>
							</div>
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>								
							</div>
						</div>
					</div>
					<div class="popular-deal-post col-sm-6 col-md-3">
						<div class="popular-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal7.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">35%</div>
									</div>
								  </div>
								</div>
							</div>
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>								
							</div>
						</div>
					</div>
					<div class="popular-deal-post col-sm-6 col-md-3">
						<div class="popular-deal-inner">
							<div class="thumbnail">
								<a href="">
									<img src="img/deal/deal8.jpg" alt="">
								</a>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
									<div class="tooltip fade top in" role="tooltip" id="tooltip644310" style="top: -26px; left: 0px; display: block;">
										<div class="tooltip-arrow"></div>
										<div class="tooltip-inner">45%</div>
									</div>
								  </div>
								</div>
							</div>
							<div class="services-content">
								<span class="content-title">Spacial</span>
								<p>Get 87% discount, on every single categories, so hurry up..</p>
								<div class="category">
									<a href="#" class="btn btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Get It</a>
								</div>
								
							</div>
						</div>
					</div>				
				</div>			
			</div>		
		</div>	
	</section>
	
	<section class="our-service">
		<div class="container">		
			<div class="empty-space"></div>
			<div class="row">
				<div class="justify-content-center">
					<div class="col-lg-10 text-center">
						<div class="section-title section">
							<span class="subtitle"></span>
							<h2 class="title">Card <span>Services</span></h2>
							<span class="separator"></span>
							<p>Gay regret eat looked Prospect at me wandered on extended wondered thoughts appetite to. Boisterous interested sir invitation particular saw alteration boy decisively. </p>
						</div>
					</div>
				</div>
			</div>		
			<div class="services">
				<div class="row">
					<div class="post col-sm-6 col-md-3 col-xs-6">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href=""><img src="img/service/1.jpg" alt=""></a>
							</div>
							<div class="inner-content">
								<span class="services-content-title">Use as a Health Card</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
								
							</div>
						</div>
					</div>
					<div class="post col-sm-6 col-md-3 col-xs-6">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href="">
									<img src="img/service/2.jpg" alt="">
								</a>
							</div>
							<div class="inner-content">
								<span class="services-content-title">Education</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
								
							</div>
						</div>
					</div>
					<div class="post col-sm-6 col-md-3">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href=""><img src="img/service/3.jpg" alt=""></a>
							</div>
							<div class="inner-content">
								<span class="services-content-title">Information Technology</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
								
							</div>
						</div>
					</div>
					<div class="post col-sm-6 col-md-3">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href=""><img src="img/service/4.png" alt=""></a>
							</div>
							<div class="inner-content">
								<span class="services-content-title">Online Shopping</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
								
							</div>
						</div>
					</div>
					<div class="post col-sm-6 col-md-3">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href=""><img src="img/service/5.jpg" alt=""></a>
							</div>
							<div class="inner-content">
								<span class="services-content-title">Tours & Travel</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
							</div>
						</div>
					</div>
					<div class="post col-sm-6 col-md-3">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href=""><img src="img/service/6.jpg" alt=""></a>
							</div>
							<div class="inner-content">
								<span class="services-content-title"> Event Management</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
							</div>
						</div>
					</div>
					<div class="post col-sm-6 col-md-3">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href=""><img src="img/service/7.jpg" alt=""></a>
							</div>
							<div class="inner-content">
								<span class="services-content-title">Use as a Discount Card</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
							</div>
						</div>
					</div>
					<div class="post col-sm-6 col-md-3">
						<div class="inner">
							<div class="inner-thumbnail">
								<a href=""><img src="img/service/8.jpg" alt=""></a>
							</div>
							<div class="inner-content">
								<span class="services-content-title"> Use as a Payment Get way</span>
								<div class="services-category"><a href="#">Enjoy Now</a></div>
								
							</div>
						</div>
					</div>
				</div>	
			
			</div>
		</div>
	</section>
	<section class="down-app">
		<div class="container">
			<div class="row">			
				<div class="col-xs-12 col-md-12">
					<div class="app-content text-center">
					
						<p>Download
							<a href="">easycard</a> 
							Apps For <br />

                        Get Vendoer Everywhere!							
							
						</p>				
					
					</div>	
				
				</div>
			
			</div>
			<div class="row">			
				<div class="col-xs-12 col-md-12">
					<div class="app-down text-center">
						<ul>
							<li class="apple">
								<a href="">
									<i class="fab fa-apple"></i>
									<div class="cta-btn-content">
										Download <span>From App Store</span>
									</div>
								
								</a>
							</li>
							<li class="andriod">
								<a href="">
									<i class="fab fa-android"></i>
									<div class="cta-btn-content">
										Download <span>From Play Store</span>
									</div>
								
								</a>
							</li>
						</ul>
					
					</div>	
				
				</div>
			
			</div>	
		</div>	
	</section>
	
	<section class="client-brand">
		<div class="container">
		
			<div class="row">
				<div class="justify-content-center">
					<div class="col-lg-10 text-center">
						<div class="section-title section">
							<span class="subtitle"></span>
							<h2 class="title">Our <span> Clients</span></h2>
							<span class="separator"></span>
							<p>Gay regret eat looked Prospect at me wandered on extended wondered thoughts appetite to. Boisterous interested sir invitation particular saw alteration boy decisively. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="clinets">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/1.png" alt="" />
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/1.png" alt="" />
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/1.png" alt="" />
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/2.png" alt="" />
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/3.png" alt="" />
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/4.png" alt="" />
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/5.png" alt="" />
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="client-img">
									<a href="">
										<img src="img/client/6.png" alt="" />
									</a>
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