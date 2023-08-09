<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Author -->
    <meta name="author" content="RHMC">
    <!-- description -->
    <meta name="description" content="{{$meta_description??''}}">
    <!-- keywords -->
    <meta name="keywords" content="Genius">
    <!-- Page Title -->
    <title>{{ env('APP_NAME') }}  | {{$page_title??''}}</title>
    <!-- Favicon -->
    <link href="<?= asset('genius/img/fav.png') ?>" rel="icon"> 
    <!-- Bundle -->
    
	<link rel="stylesheet" href="<?= asset('genius/css/owl.carousel.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/fontawesome-all.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/flaticon.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= asset('genius/css/meanmenu.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/video.min.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/animate.min.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/lightbox.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/progess.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/style.css') ?>">
	<link rel="stylesheet" href="<?= asset('genius/css/responsive.css') ?>">

	<link rel="stylesheet"  href="<?= asset('genius/css/colors/switch.css') ?>">
	<link href="<?= asset('genius/css/colors/color-2.css') ?>" rel="alternate stylesheet" type="text/css" title="color-2">
	<link href="<?= asset('genius/css/colors/color-3.css') ?>" rel="alternate stylesheet" type="text/css" title="color-3">
	<link href="<?= asset('genius/css/colors/color-4.css') ?>" rel="alternate stylesheet" type="text/css" title="color-4">
	<link href="<?= asset('genius/css/colors/color-5.css') ?>" rel="alternate stylesheet" type="text/css" title="color-5">
	<link href="<?= asset('genius/css/colors/color-6.css') ?>" rel="alternate stylesheet" type="text/css" title="color-6">
	<link href="<?= asset('genius/css/colors/color-7.css') ?>" rel="alternate stylesheet" type="text/css" title="color-7">
	<link href="<?= asset('genius/css/colors/color-8.css') ?>" rel="alternate stylesheet" type="text/css" title="color-8">
	<link href="<?= asset('genius/css/colors/color-9.css') ?>" rel="alternate stylesheet" type="text/css" title="color-9">
    @yield('styles')
</head>

<div id="preloader"></div>


	{{-- <div id="switch-color" class="color-switcher">
		<div class="open"><i class="fas fa-cog fa-spin"></i></div>
		<h4>COLOR OPTION</h4>
		<ul>
			<li><a class="color-2" onclick="setActiveStyleSheet('color-2'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-3" onclick="setActiveStyleSheet('color-3'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-4" onclick="setActiveStyleSheet('color-4'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-5" onclick="setActiveStyleSheet('color-5'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-6" onclick="setActiveStyleSheet('color-6'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-7" onclick="setActiveStyleSheet('color-7'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-8" onclick="setActiveStyleSheet('color-8'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-9" onclick="setActiveStyleSheet('color-9'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
		</ul>
		<button class="switcher-light">WIDE </button>
		<button class="switcher-dark">BOX </button>
		<a class="rtl-v" href="RTL_Genius/index.html">RTL </a>
	</div> --}}

<!-- Start of Header section
		============================================= -->
		<header class="header_3 gradient-bg">
			<div class="container">
				<div class="navbar-default">
					<div class="navbar-header float-left">
						<a class="navbar-brand text-uppercase" href="{{route('home')}}"><img src="<?= asset('genius/img/logo/RHMC-logo.png')?>" alt="logo"></a>
					</div><!-- /.navbar-header -->
					<div class="header-info ul-li">
						<ul>
							<li>
								<div class="mail-phone">
									<div class="info-icon">
										<i class="fas fa-envelope" style="color: #fff;"></i>
									</div>
									<div class="info-content">
										<span class="info-id">info.rhmc.ae</span>
										<span class="info-text">Email Us For Free Registration</span>
									</div>
								</div>
							</li>
							<li>
								<div class="mail-phone">
									<div class="info-icon">
										<i class="fas fa-phone-square"  style="color: #fff;"></i>
									</div>
									<div class="info-content">
										<span class="info-id">+97143967462</span>
										<span class="info-text">Call Us For Free Registration</span>
									</div>
								</div>
							</li>
							<li>
								<a href="#">
									<div class="info-social">
										<i class="fab fa-facebook-f"></i>
									</div>
									<span class="info-text">Facebook</span>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="info-social">
										<i class="fab fa-twitter"></i>
									</div>
									<span class="info-text">Twitter</span>
								</a>
							</li>
						</ul>
					</div>

					<div class="nav-menu-4">
						<div class="login-cart-lang float-right ul-li">
							{{-- <ul class="search_cart">
								<li>
									<div class="cart_search">
										<a href="#">
											<i class="fas fa-shopping-bag"></i>
										</a>
									</div>
								</li>
								<li>
									<div  class="cart_search">
										<button type="button" class="toggle-overlay search-btn">
											<i class="fas fa-search"></i>
										</button>
									</div>
									<div class="search-body">
										<div class="search-form">
											<form action="#">
												<input class="search-input" type="search" placeholder="Search Here">
												<div class="outer-close toggle-overlay">
													<button type="button" class="search-close">
														<i class="fas fa-times"></i>
													</button>
												</div>
											</form>
										</div>
									</div>
								</li>
							</ul> --}}
							<ul class="lang-login">
								
								<li>
									<div class="login">
										<!-- <a data-toggle="modal" data-target="#myModal" href="#">LogIn</a> -->
										@auth
										<a href="{{url('/admin/dashboard')}}">Dashboard</a>
										@else
										<a href="{{url('/login')}}">Login | </a> 
										<a href="{{url('/register')}}">Register</a> 
										@endauth
									</div>
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">

												<!-- Modal Header -->
												<div class="modal-header backgroud-style" style="background:#000;">
													<!-- <div class="gradient-bg"></div> -->
													<!-- <div class="popup-logo">
														<img src="<?= asset('genius/img/logo/RHMC-logo.png')?>" alt="">
													</div> -->
													<div class="popup-text text-center">
														<h2> <span>Login</span> Your Account.</h2>
														<p>Login to our website, or <span class="signupModal">REGISTER</span></p>
													</div>
												</div>

												<!-- Modal body -->
												<div class="modal-body">
													
													<!-- <div class="alt-text text-center"><a href="#">OR SIGN IN</a> </div> -->
													<form class="contact_form" method="POST" enctype="multipart/form-data">
														<div class="contact-info">
															<input class="name" name="Email" id="formEmail" type="email" placeholder="Your@email.com*">
														</div>
														<div class="contact-info">
															<input class="password" name="name" id="formPassword" type="password" placeholder="Your Password*">
														</div>
														<div class="nws-button text-center white text-capitalize">
															<button type="submit" class="submitLoginForm" value="Submit" style="color: #000 !important;background-color: #009051 !important;">Log in Now</button> 
														</div> 
													</form>
													<div class="log-in-footer text-center">
														<p>* Denotes mandatory field.</p>
													
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" id="myModalSignup" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">

												<!-- Modal Header -->
												<div class="modal-header backgroud-style" style="background:#000;">
													<!-- <div class="gradient-bg"></div> -->
													<!-- <div class="popup-logo">
														<img src="<?= asset('genius/img/logo/RHMC-logo.png')?>" alt="">
													</div> -->
													<div class="popup-text text-center">
														<h2> <span>Signup</span> Your Account.</h2>
														<p>Already Signed Up?  <span class="alreadySigned">LOGIN</span></p>
													</div>
												</div>

												<!-- Modal body -->
												<div class="modal-body">
													
													<!-- <div class="alt-text text-center"><a href="#">OR SIGN IN</a> </div> -->
													<form class="contact_form" method="POST" enctype="multipart/form-data">
														<div class="contact-info">
															<label>Full Name </label>
															<input class="name" name="Full Name" id="formName" type="text" placeholder="e.g John Doe*">
														</div>
														<div class="contact-info">
															<label>Email</label>
															<input class="name" name="Email" id="formEmailReg" type="email" placeholder="Your@email.com*">
														</div>
														<div class="contact-info">
															<label>Password</label>
															<input class="password" name="name" id="formPasswordReg" type="password" placeholder="Your Password*">
														</div>
														<div class="contact-info">
															<label>Phone </label>
															<input class="name" name="Email" id="formPhone" type="text" placeholder="+6689128812*">
														</div>
														<div class="contact-info">
															<label>Emirates ID</label>
															<input class="emrirates_id" name="emrirates_id" id="formEmrirates" type="text" placeholder="Emirates ID">
														</div>
														<div class="contact-info">
															<label>Upload Passport</label>
															<input class="passport" name="passport" id="formPassport" type="file" placeholder="Passport">
														</div>
														<div class="nws-button text-center white text-capitalize">
															<button type="submit" class="registerForm" value="Submit" style="color: #000 !important;background-color: #009051 !important;">Sign Up Now</button> 
														</div> 
													</form>
													<div class="log-in-footer text-center">
														<p>* Denotes mandatory field.</p>
													
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" id="myModalEnroll" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">

												<!-- Modal Header -->
												<div class="modal-header backgroud-style" style="background:#000;">
													<!-- <div class="gradient-bg"></div> -->
													<!-- <div class="popup-logo">
														<img src="<?= asset('genius/img/logo/RHMC-logo.png')?>" alt="">
													</div> -->
													<div class="popup-text text-center">
														<h2> <span>Enroll</span> Course.</h2>
														<p>Please Fill the form blow to get enrolled!</p>
													</div>
												</div>

												<!-- Modal body -->
												<div class="modal-body">
													
													<!-- <div class="alt-text text-center"><a href="#">OR SIGN IN</a> </div> -->
													<form class="contact_form" method="POST" enctype="multipart/form-data">
														<div class="contact-info">
															<input class="name" name="Full Name" id="formNameEnroll" type="text" placeholder="e.g John Doe*">
														</div>
														<div class="contact-info">
															<input class="name" name="Email" id="formEmailEnroll" type="email" placeholder="Your@email.com*">
														</div>
														<div class="contact-info">
															<input class="name" name="Email" id="formPhoneEnroll" type="text" placeholder="+6689128812*">
														</div>
														<div class="contact-info">
															<input class="name" name="Email" id="formAdressEnroll" type="text" placeholder="Business Bay ,Dubai,UAE*">
														</div>
														<div class="nws-button text-center white text-capitalize">
															<button type="submit" class="enrollForm" value="Submit" style="color: #000 !important;background-color: #009051 !important;">Enroll Now</button> 
														</div> 
													</form>
													<div class="log-in-footer text-center">
														<p>* Denotes mandatory field.</p>
													
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								
							</ul>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<nav class="navbar-menu float-left">
							<div class="nav-menu ul-li">
								<ul class="quick-menu">
									<li><a  href="{{url('/')}}">Home</a></li>
									<li><a  href="{{route('learning')}}">Learning</a></li>
									<li><a  href="{{route('front.webinars')}}">Webinar</a></li>
									<li><a  href="{{route('front.faqs')}}">FAQ</a></li>
									<li><a  href="{{route('front.blogs')}}">Blogs</a></li>
									<li><a  href="{{route('front.events')}}">Events</a></li>
									<!-- <li><a  href="#latest-area">BLOG</a></li>
									<li><a  href="#contact-form">Contact Us</a></li> -->
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<div class="altranative-header ul-li-block">
			<div id="menu-container">

				<div class="menu-wrapper">
					<div class="row">

						<button type="button" class="alt-menu-btn float-left">
							<span class="hamburger-menu"></span>
						</button>

						<div class="logo-area">
							<a href="index-1.html">
								<img src="<?= asset('genius/img/logo/RHMC-logo.png')?>" alt="Logo_not_found">
							</a>
						</div>

						<div class="cart-btn pulse  ul-li float-right">
							<ul>
								{{-- <li><a data-toggle="modal" data-target="#myModal-2"  href="#"><i class="fas fa-user"></i></a> --}}
								<li><a href="{{url('/login')}}"><i class="fas fa-user"></i></a>
								</li>
								{{-- <li><a href="#"><i class="fas fa-shopping-bag"></i></a></li> --}}
							</ul>
							<div class="modal fade" id="myModal-2" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header backgroud-style">
											<div class="gradient-bg"></div>
											<div class="popup-logo">
												<img src="<?= asset('genius/img/logo/p-logo.jpg')?>" alt="">
											</div>
											<div class="popup-text text-center">
												<h2> <span>Login</span> Your Account.</h2>
												<p>Login to our website, or <span>REGISTER</span></p>
											</div>
										</div>

										<!-- Modal body -->
										<div class="modal-body">
											<div class="facebook-login">
												<a href="#">
													<div class="log-in-icon">
														<i class="fab fa-facebook-f"></i>
													</div>
													<div class="log-in-text text-center">
														Login with Facebook
													</div>
												</a>
											</div>
											<div class="alt-text text-center"><a href="#">OR SIGN IN</a> </div>
											<form class="contact_form" action="#" method="POST" enctype="multipart/form-data">
												<div class="contact-info">
													<input class="name" name="Email" type="email" placeholder="Your@email.com*">
												</div>
												<div class="contact-info">
													<input class="email" name="name" type="text" placeholder="Your name*">
												</div>
												<div class="nws-button text-center white text-capitalize">
													<button type="submit" value="Submit">LOg in Now</button> 
												</div> 
											</form>
											<div class="log-in-footer text-center">
												<p>* Denotes mandatory field.</p>
												<p>** At least one telephone number is required.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<ul class="menu-list accordion" style="left: -100%;">
					{{-- <li class="alt-search">
						<form action="#">
							<input type="search" placeholder="search">
						</form>
					</li> --}}
					<li class="card"><a class="menu-link" href="{{url('/')}}">Home</a></li>
					<li class="card"><a class="menu-link" href="{{route('learning')}}">Learning</a></li>
					<li class="card"><a class="menu-link" href="{{route('front.webinars')}}">Webinar</a></li>
					<li class="card"><a class="menu-link" href="{{route('front.faqs')}}">FAQ</a></li>
					<li class="card"><a class="menu-link" href="{{route('front.blogs')}}">Blogs</a></li>
					<li class="card"><a class="menu-link" href="{{route('front.events')}}">Events</a></li>
					
					{{-- <li class="card">
						<a class="menu-link" href="index-1.html">Home</a>
					</li>
					
					<li class="card">
						<a class="menu-link" href="about.html">About Us</a>
					</li> --}}

					<!-- services - start -->
					{{-- <li class="card active">
						<div class="card-header" id="heading1">
							<button class="menu-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
								Service
							</button>
						</div>
						<ul id="collapse1" class="submenu collapse show" aria-labelledby="heading1" data-parent="#accordion" style="">
							<li class="active"><a href="service.html">Service</a></li>
							<li><a href="service-details.html">Service Details</a></li>
						</ul>
					</li> --}}
					<!-- services - end -->

					<!-- team - start -->
					{{-- <li class="card">
						<div class="card-header" id="headingtwo">
							<button class="menu-link" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
								Team
							</button>
						</div>
						<ul id="collapsetwo" class="submenu collapse" aria-labelledby="headingtwo" data-parent="#accordion">
							<li><a href="team.html">Team</a></li>
							<li><a href="team-details.html">Team Details</a></li>
						</ul>
					</li> --}}
					<!-- team - end -->

					<!-- shop - start -->
					{{-- <li class="card">
						<div class="card-header" id="headingthree">
							<button class="menu-link" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
								Shop
							</button>
						</div>
						<ul id="collapsethree" class="submenu collapse show" aria-labelledby="headingthree" data-parent="#accordion" style="">
							<li><a href="shop.html">Shop</a></li>
							<li><a href="checkout.html">Checkout</a></li>
							<li><a href="product-details.html">Product Details</a></li>
						</ul>
					</li> --}}
					<!-- shop - end -->

					<!-- newses - start -->
					{{-- <li class="card">
						<div class="card-header" id="headingfour">
							<button class="menu-link" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
								Newses
							</button>
						</div>
						<ul id="collapsefour" class="submenu collapse" aria-labelledby="headingfour" data-parent="#accordion">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="blog-details.html">Blog Details</a></li>
						</ul>
					</li> --}}
					<!-- newses - end -->

					<!-- contact - start -->
					{{-- <li class="card">
						<div class="card-header" id="headingfive">
							<button class="menu-link" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
								Contact
							</button>
						</div>
						<ul id="collapsefive" class="submenu collapse" aria-labelledby="headingfive" data-parent="#accordion">
							<li><a href="contact.html">Contact</a></li>
							<li><a href="contactv2.html">Contact V2</a></li>
						</ul>
					</li> --}}
					<!-- contact - end -->

					<!-- pages - start -->
					{{-- <li class="card">
						<div class="card-header" id="headingsix">
							<button class="menu-link" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
								Pages
							</button>
						</div>
						<ul id="collapsesix" class="submenu collapse" aria-labelledby="headingsix" data-parent="#accordion">
							<li><a href="error.html">error</a></li>
							<li><a href="errorv2.html">error V2</a></li>
							<li><a href="work-process.html">work process</a></li>
							<li><a href="register.html">Register</a></li>
						</ul>
					</li> --}}
					<!-- pages - end -->

				</ul>
			</div>
		</div>
 	<!-- Start of Header section
 		============================================= -->

