<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		
    	<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	
        <link rel="icon" href="img/favicon.png" type="image/png">
		<title>Eventure Multi</title>
		
			<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}">
		<link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}">
		<link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}">

			<!-- main css -->
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
		@include('inc.navbar')
				
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="banner_content">
						<h2>International Digital <br />Business Event</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
						<a class="banner_btn" href="#">View More Details</a>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Event Time Area =================-->
        <section class="event_time_area">
        	<div class="container">
        		<div class="event_time_inner">
        			<div class="row">

							<?php
								$tarray = array();
								$tarray = \App\Http\Controllers\PagesController::get_min_date();
								$id = $tarray[3];
								
							?>
        				<div class="col-lg-6">
        					<div class="event_text">
        						<h3>Next Event will Start in </h3>
								<a href="{{ url("/eventDetails/$tarray[3]") }}"><h4>{{\App\Http\Controllers\PagesController::singleEventTitle($tarray[3])}}  </h4></a>
							
        					</div>
        				</div>
        				<div class="col-lg-6">
        					<div class="timer_inner">
								<div  class="timer countdown" data-date="Feb 02 2020 20:20:22">
									<div class="timer__section days">
										
										<div class="timer__number" id="days" value="{{$tarray[0]}}">{{$tarray[0]}}</div>
										<div class="timer__label">days</div>
									</div>
									<div class="timer__section hours">
										<div class="timer__number" id="hours" value="{{$tarray[1]}}">{{$tarray[1]}}</div>
										<div class="timer__label">hours</div>
									</div>
									<div class="timer__section minutes" >
										<div class="timer__number" id="minutes" value="{{$tarray[2]}}">{{$tarray[2]}}</div>
										<div class="timer__label">Minutes</div>
									</div>
									<div class="timer__section seconds">
										<div class="timer__number" id="seconds" value="00">00</div>
										<div class="timer__label">seconds</div>
									</div>
									<input type="hidden" id="hiddenDate" value="{{$tarray[4]}}">
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Event Time Area =================-->
        
		<!--================Welcome Area =================-->
		
        <section class="welcome_area pad_btm">
        	<div class="container">
				<div class="row">
						@foreach ($eventRegistrations as $eventRegistration)

						
						<div class="col-md-4">
								<div class="welcome_img">
									
									<a href="{{ url("/eventDetails/$eventRegistration->id") }}" id="eventDetails" name="event_data[]"><img class="img-fluid" src={{asset("storage/eventImage/$eventRegistration->event_image")}} alt=""></a>
								</div>
								<a href="{{ url("/eventDetails/$eventRegistration->id") }}" style="color:black">
								<div class="welcome_text" style="margin-top:10px;">
										<div class="date-thumbnail eds-text--center eds-l-mar-top-1" data-reactid="317" style="width:20%; float:left;margin-bottom:10px;">
											<p class="date-thumbnail__month eds-text-color--ui-orange eds-text-bs" data-spec="date-thumbnail-month">{{ date('M', strtotime($eventRegistration->date))}}</p>
											<p class="date-thumbnail__day eds-text-bl eds-text-color--grey-600" data-spec="date-thumbnail-day">{{ date('d', strtotime($eventRegistration->date))}}</p>
										</div>
									<div style="width:80%; float: right;">
											<div>
												<h4 style="margin-bottom:12px">{{ $eventRegistration->event_title }}</h4>
												<span id="convert" name="convert" style="margin-bottom:5px">{{ date('D, M d', strtotime($eventRegistration->date))}} ,{{$eventRegistration->from}}</span>
											</div>
											<div>
												<span id="location" name="location">{{ \App\Http\Controllers\PagesController::get_country_name($eventRegistration->country) }},{{ $eventRegistration->state }},{{ $eventRegistration->city}} </span>
											</div>
									</div>
									
								</div>
							</a>
						</div>
						@endforeach

						
				</div>
				<div class="row" style="width:20%; margin:0 auto;">
					<h5>See More Events</h5>
					{{ $eventRegistrations->links() }}
				</div>
				
					

        	</div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================Team Area =================-->
        <section class="team_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Meet Head Speakers</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="row team_inner">
        			<div class="col-lg-3 col-sm-6">
        				<div class="team_item">
        					<div class="team_img">
        						<img class="img-fluid" src="img/team/team-1.jpg" alt="">
        						<div class="hover">
        							<a href="#"><i class="fa fa-facebook"></i></a>
        							<a href="#"><i class="fa fa-twitter"></i></a>
        							<a href="#"><i class="fa fa-linkedin"></i></a>
        						</div>
        					</div>
        					<div class="team_name">
        						<h4>Ethel Davis</h4>
        						<p>Managing Director (Sales)</p>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-sm-6">
        				<div class="team_item">
        					<div class="team_img">
        						<img class="img-fluid" src="img/team/team-2.jpg" alt="">
        						<div class="hover">
        							<a href="#"><i class="fa fa-facebook"></i></a>
        							<a href="#"><i class="fa fa-twitter"></i></a>
        							<a href="#"><i class="fa fa-linkedin"></i></a>
        						</div>
        					</div>
        					<div class="team_name">
        						<h4>Ethel Davis</h4>
        						<p>Managing Director (Sales)</p>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-sm-6">
        				<div class="team_item">
        					<div class="team_img">
        						<img class="img-fluid" src="img/team/team-3.jpg" alt="">
        						<div class="hover">
        							<a href="#"><i class="fa fa-facebook"></i></a>
        							<a href="#"><i class="fa fa-twitter"></i></a>
        							<a href="#"><i class="fa fa-linkedin"></i></a>
        						</div>
        					</div>
        					<div class="team_name">
        						<h4>Ethel Davis</h4>
        						<p>Managing Director (Sales)</p>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-sm-6">
        				<div class="team_item">
        					<div class="team_img">
        						<img class="img-fluid" src="img/team/team-4.jpg" alt="">
        						<div class="hover">
        							<a href="#"><i class="fa fa-facebook"></i></a>
        							<a href="#"><i class="fa fa-twitter"></i></a>
        							<a href="#"><i class="fa fa-linkedin"></i></a>
        						</div>
        					</div>
        					<div class="team_name">
        						<h4>Ethel Davis</h4>
        						<p>Managing Director (Sales)</p>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Team Area =================-->
        
        <!--================Event Schedule Area =================-->
        <section class="event_schedule_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Event Schedule</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="event_schedule_inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Day 01</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Day 02</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Day 03</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
							<div class="media">
								<div class="d-flex">
									<img src="img/schedule-1.jpg" alt="">
								</div>
								<div class="media-body">
									<h5>09.00 am</h5>
									<h4>Opening Ceremony</h4>
									<p>Speech by: Mark weins</p>
								</div>
							</div>
						</div>
					</div>
        		</div>
        	</div>
        </section>
        <!--================End Event Schedule Area =================-->
        
        <!--================End Event Schedule Area =================-->
        <section class="home_map_area">
        	<div id="mapBox2" class="mapBox2" 
				data-lat="40.701083" 
				data-lon="-74.1522848" 
				data-zoom="13" 
				data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
				data-mlat="40.701083"
				data-mlon="-74.1522848">
			</div>
			
       		<div class="home_details">
				<div class="container">
					<div class="box_home_details">
						<div class="media">
							<div class="d-flex">
								<i class="lnr lnr-home"></i>
							</div>
							<div class="media-body">
								<h4>California, United States</h4>
								<p>Santa monica bullevard</p>
							</div>
						</div>
						<div class="media">
							<div class="d-flex">
								<i class="lnr lnr-clock"></i>
							</div>
							<div class="media-body">
								<h4>Monday to Wednesday</h4>
								<p>17-19 June, 218</p>
							</div>
						</div>
						<div class="media">
							<div class="d-flex">
								<i class="lnr lnr-envelope"></i>
							</div>
							<div class="media-body">
								<h4>support@colorlib.com</h4>
								<p>Send us your query anytime!</p>
							</div>
						</div>
					</div>
				</div>
       		</div>
        </section>
        <!--================End Event Schedule Area =================-->
        
        <!--================Price Area =================-->
        <section class="price_area p_120">
        	<div class="container">	
        		<div class="main_title">
        			<h2>Ticket Pricing</h2>
        			<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.</p>
        		</div>
        		<div class="price_inner row m0">
        			<div class="col-lg-3 col-sm-6 p0">
        				<div class="price_item">
        					<div class="price_text">
        						<h3>Basic</h3>
								<h5>Individuals/Freelancers</h5>
								<h2>£39<span>/mo</span></h2>
								<ul class="list">
									<li><a href="#">RAM 1 GB</a></li>
									<li><a href="#">Core CPU 1</a></li>
									<li><a href="#">SSD Storage 20 GB</a></li>
									<li><a href="#">Transfer 1 TB</a></li>
									<li><a href="#">Network In 40 Gb</a></li>
								</ul>
        					</div>
        					<a class="price_btn" href="#">Get Started</a>
        				</div>
        			</div>
        			<div class="col-lg-3 col-sm-6 p0">
        				<div class="price_item">
        					<div class="price_text">
        						<h3>Starter</h3>
								<h5>Small Companies</h5>
								<h2>£59<span>/mo</span></h2>
								<ul class="list">
									<li><a href="#">RAM 2 GB</a></li>
									<li><a href="#">Core CPU 2</a></li>
									<li><a href="#">SSD Storage 50 GB</a></li>
									<li><a href="#">Transfer 1 TB</a></li>
									<li><a href="#">Network In 40 Gb</a></li>
								</ul>
        					</div>
        					<a class="price_btn" href="#">Get Started</a>
        				</div>
        			</div>
        			<div class="col-lg-3 col-sm-6 p0">
        				<div class="price_item">
        					<div class="price_text">
        						<h3>Business</h3>
								<h5>Medium Companies</h5>
								<h2>£79<span>/mo</span></h2>
								<ul class="list">
									<li><a href="#">RAM 4 GB</a></li>
									<li><a href="#">Core CPU 4</a></li>
									<li><a href="#">SSD Storage 75 GB</a></li>
									<li><a href="#">Transfer 2 TB</a></li>
									<li><a href="#">Network In 80 Gb</a></li>
								</ul>
        					</div>
        					<a class="price_btn" href="#">Get Started</a>
        				</div>
        			</div>
        			<div class="col-lg-3 col-sm-6 p0">
        				<div class="price_item">
        					<div class="price_text">
        						<h3>Enterprise</h3>
								<h5>Large Companies</h5>
								<h2>£99<span>/mo</span></h2>
								<ul class="list">
									<li><a href="#">RAM 8 GB</a></li>
									<li><a href="#">Core CPU 8</a></li>
									<li><a href="#">SSD Storage 100 GB</a></li>
									<li><a href="#">Transfer 2 TB</a></li>
									<li><a href="#">Network In 100 Gb</a></li>
								</ul>
        					</div>
        					<a class="price_btn" href="#">Get Started</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Price Area =================-->
        
        <!--================ start footer Area  =================-->	
        <footer class="footer-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                           <h6 class="footer_title">Top Products</h6>
                            <ul class="list">
                            	<li><a href="#">Managed Website</a></li>
                            	<li><a href="#">Manage Reputation</a></li>
                            	<li><a href="#">Power Tools</a></li>
                            	<li><a href="#">Marketing Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget news_widgets">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>You can trust us. we only send promo offers, not a single spam.</p>		
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn">Subscribe</button>		
                                    </div>									
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">Instagram Feed</h6>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="img/instagram/Image-01.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-02.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-03.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-04.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-07.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-08.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>	
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->


	
		
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/popper.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/stellar.js')}}"></script>



        <script src="{{asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
        <script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('vendors/isotope/isotope-min.js')}}"></script>
        <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
        {{-- <script src="{{asset('vendors/flipclock/timer.js')}}"></script> --}}
        <script src="{{asset('vendors/counter-up/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('vendors/counter-up/jquery.counterup.js')}}"></script>
		<script src="{{asset('js/mail-script.js')}}"></script>
        {{-- gmaps Js --}}
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{asset('js/gmaps.min.js')}}"></script>
		<script src="{{asset('js/theme.js')}}"></script>


		
	


		{{-- countdown js --}}

	

		{{-- end of countdown js --}}

		<script>


			
				function countdown(endDate) {
				let days, hours, minutes, seconds;
				
				endDate = new Date(endDate).getTime();
				
				if (isNaN(endDate)) {
					return;
				}
				
				setInterval(calculate, 1000);
				
				function calculate() {
					let startDate = new Date();
					startDate = startDate.getTime();
					
					let timeRemaining = parseInt((endDate - startDate) / 1000);
					
					if (timeRemaining >= 0) {
					days = parseInt(timeRemaining / 86400);
					timeRemaining = (timeRemaining % 86400);
					
					hours = parseInt(timeRemaining / 3600);
					timeRemaining = (timeRemaining % 3600);
					
					minutes = parseInt(timeRemaining / 60);
					timeRemaining = (timeRemaining % 60);
					
					seconds = parseInt(timeRemaining);
					
					document.getElementById("days").innerHTML = parseInt(days, 10);
					document.getElementById("hours").innerHTML = ("0" + hours).slice(-2);
					document.getElementById("minutes").innerHTML = ("0" + minutes).slice(-2);
					document.getElementById("seconds").innerHTML = ("0" + seconds).slice(-2);
					} else {
					return;
					}
				}
				}

				(function () {

					vdays =document.getElementById('days').getAttribute('value');
					vhour =document.getElementById('hours').getAttribute('value');
					vminute =document.getElementById('minutes').getAttribute('value');
					vsecond = document.getElementById('seconds').getAttribute('value');
					vdate = document.getElementById('hiddenDate').getAttribute('value');
					
					
					 fullDate = vdate+" "+vhour+":"+vminute+":"+vsecond;
					 console.log(fullDate);
					
					countdown(fullDate); 

				}());
		</script>



		

		
    </body>
</html>
