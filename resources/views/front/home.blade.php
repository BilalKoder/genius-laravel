@php
use App\Functions\Helper;
    use Carbon\Carbon;
@endphp

@extends('front.app')

@section('content')
   	<!-- Start of slider section
		============================================= -->
		<section id="slide" class="slider-section">
			<div id="slider-item" class="slider-item-details">
				<div  class="slider-area slider-bg-1 relative-position">
					<div class="slider-text">
						<div class="section-title mb20 headline text-center">
							
							<div class="layer-1-1">
								{{-- <span class="subtitle text-uppercase">EDUCATION & TRAINING ORGANIZATION</span> --}}
							</div>
							<div class="layer-1-3">
								<h2><span>Inventive Solution <br> for Education</span></h2>
							</div>

						</div>
						<div class="layer-1-4">
							
							<div id="course-btn">
								<div class="genius-btn  text-center text-uppercase ul-li-block bold-font">
									<div class="input-group rounded-pill">
										<input type="text" placeholder="What're you searching for?" aria-describedby="button-addon4" class="typeahead search-home-course form-control bg-none border-0">
										<div class="input-group-append border-0">
											<button id="button-addon3" type="button" class="search-home-course-btn btn btn-link text-success"><i class="fa fa-search"></i></button>
										  </div>
									  </div>
									{{-- <a href="{{route('learning')}}">Best Courses <i class="fas fa-caret-right"></i></a> --}}
								</div>
								{{-- <div class="genius-btn  text-center text-uppercase ul-li-block bold-font">
									<a href="{{route('learning')}}">Our Courses <i class="fas fa-caret-right"></i></a>
								</div> --}}
							</div>
						</div>
					</div>

				</div>
				<div class="slider-area slider-bg-4 relative-position">
					<div class="slider-text">
						<div class="section-title mb20 headline text-center">
							<div class="layer-1-1">
								{{-- <span class="subtitle text-uppercase">EDUCATION & TRAINING ORGANIZATION</span> --}}
							</div>
							<div class="layer-1-2">
								<h2 class="secoud-title"><span> Browse The Best Courses.</span></h2>
							</div>
						</div>
						<div class="layer-1-3">
						
							<div class="layer-1-4">
								<div id="course-btn">
									<div class="genius-btn  text-center text-uppercase ul-li-block bold-font">
										<div class="input-group rounded-pill">
											<input type="text" placeholder="What're you searching for?" aria-describedby="button-addon4" class="typeahead search-home-course form-control bg-none border-0">
											<div class="input-group-append border-0">
												<button id="button-addon3" type="button" class="search-home-course-btn btn btn-link text-success"><i class="fa fa-search"></i></button>
											  </div>
										  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End of slider section
		============================================= -->


	<!-- Start of Search Courses
		============================================= -->
		{{-- <section id="search-course" class="search-course-section search-course-third">
			<div class="container">
				<div class="search-counter-up">
					<div class="version-four">
						<div class="row">
							<div class="col-md-3">
								<div class="counter-icon-number">
									<div class="counter-icon">
										<i class="text-gradiant flaticon-graduation-hat"></i>
									</div>
									<div class="counter-number">
										<span class="counter-count bold-font">5 </span><span>M+</span>
										<p>Students Enrolled</p>
									</div>
								</div>
							</div>
							<!-- /counter -->

							<div class="col-md-3">
								<div class="counter-icon-number">
									<div class="counter-icon">
										<i class="text-gradiant flaticon-book"></i>
									</div>
									<div class="counter-number">
										<span class="counter-count bold-font">122</span><span>.500+</span>
										<p>Online Available Courses</p>
									</div>
								</div>
							</div>
							<!-- /counter -->

							<div class="col-md-3">
								<div class="counter-icon-number">
									<div class="counter-icon">
										<i class="text-gradiant flaticon-favorites-button"></i>
									</div>
									<div class="counter-number">
										<span class="counter-count bold-font">15</span><span>.000+</span>
										<p>Premium Quality Products</p>
									</div>
								</div>
							</div>
							<!-- /counter -->

							<div class="col-md-3">
								<div class="counter-icon-number">
									<div class="counter-icon">
										<i class="text-gradiant flaticon-group"></i>
									</div>
									<div class="counter-number">
										<span class="counter-count bold-font">7</span><span>.500+</span>
										<p>Teachers Registered</p>
									</div>
								</div>
							</div>
							<!-- /counter -->
						</div>
					</div>
				</div>
			</div>
		</section> --}}
	<!-- End of Search Courses
		============================================= -->


	<!-- Start popular course
		============================================= -->
		<section id="popular-course" class="popular-course-section popular-three">
			<div class="container">
				<div class="section-title mb30 headline text-center">
					<span class="subtitle text-uppercase">LEARN NEW SKILLS</span>
					<h2><span>Popular</span> Courses.</h2>
				</div>
				<div id="course-slide-item" class="course-slide">

				@php
				$counter = 0;
				@endphp
				@if(!empty($popularCourses))
				@foreach($popularCourses as $key => $course)
				
					<div class="course-item-pic-text">
						<div class="course-pic relative-position mb25">
							<img src="<?= asset($course->media??'')?>" alt="">
							<div class="course-price text-center gradient-bg">
								<span style="text-decoration: line-through;">${{$course->price??'0'}}</span>
							</div>
							<div style="margin-left:100px" class="course-price text-center gradient-bg">
								<span id="sale-price">${{$course->sale_price??'0'}}</span>
							</div>
							
							<div class="course-details-btn">
								<a href="{{ route('learning.detail', ['id' => $course->id]) }}">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
						<div class="course-item-text">
							<div class="course-meta">
								<span class="course-category bold-font"><a href="{{ route('learning.detail', ['id' => $course->id]) }}">@foreach($course->categories as $cat)
														{{$cat->category->name??''}}
														@endforeach</a></span>
								<span class="course-author bold-font"><a href="{{ route('learning.detail', ['id' => $course->id]) }}">{{$course->user->name??''}}</a></span>
								<div class="course-rate ul-li">
									<ul>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									</ul>
								</div>
							</div>
							<div class="course-title mt10 headline pb45 relative-position">
								<h3><a href="{{ route('learning.detail', ['id' => $course->id]) }}">{{$course->title??''}}</a>
								@if($course->best_seller == 1) <span class="trend-badge text-uppercase bold-font"><i class="fas fa-bolt"></i> BEST SELLER</span>@endif</h3>
							</div>
							<!-- <div class="course-viewer ul-li">
								<ul>
									<li><a href=""><i class="fas fa-user"></i> 1.220</a></li>
									<li><a href=""><i class="fas fa-comment-dots"></i> 1.015</a></li>
									<li><a href="">125k Unrolled</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<!-- /item -->

					

					@endforeach
				@endif
					
				</div>
			</div>
		</section>
	<!-- End popular course
		============================================= -->


	<!-- Start why choose section
		============================================= -->
		<section id="why-choose-1" class="why-choose-section version-four backgroud-style-heading">
			<div class="container">
				<div class="section-title mb20 headline text-center">
					<span class="subtitle text-uppercase">Advantages of Choosing RHMC</span>
					<h2>RHMC <span class="text-green"> Redefining Higher Education Worldwide</span></h2>
				</div>
			</div>
		</section>
		<section id="why-choose" class="why-choose-section green-custom-background version-four backgroud-style">
			<div class="container">
				{{-- <div class="section-title mb20 headline text-center">
					<span class="subtitle text-uppercase">Advantages of Choosing RHMC</span>
					<h2>RHMC <span> Redefining Higher Education Worldwide</span></h2>
				</div> --}}
				<div class="extra-features-content">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="extra-left">
								<div class="extra-left-content">
									<div class="extra-icon-text text-justify">
										<div class="features-icon gradient-bg text-center">
											<i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i>
											<div class="feat-tag">
												<span>01</span>
											</div>
										</div>
										<div class="features-text">
											<div class="features-text-title">
												<h3>Unparalleled Global Network</h3>
											</div>
											<div class="features-text-dec">
												<span>RHMC is a leading education platform that has established strong partnerships with renowned universities and institutions worldwide. We offer a vast network of prestigious academic programs and courses from top-tier educational providers around the globe.</span>
											</div>
										</div>
									</div>
								</div>
								<!-- // extra-left-content --> 

								<div class="extra-left-content">
									<div class="extra-icon-text text-justify">
										<div class="features-icon gradient-bg text-center">
											<i class=" flaticon-clipboard-with-pencil"></i>
											<div class="feat-tag">
												<span>02</span>
											</div>
										</div>
										<div class="features-text pt25">
											<div class="features-text-title">
												<h3>Diverse Range of Courses</h3>
											</div>
											<div class="features-text-dec">
												<span>Whether you seek undergraduate, graduate, or professional development programs, RHMC offers an extensive range of courses in various disciplines. From business and technology to arts and sciences, we ensure learners find the perfect fit for their educational aspirations.</span>
											</div>
										</div>
									</div>
								</div>
								<!-- // extra-left-content -->

								<div class="extra-left-content">
									<div class="extra-icon-text text-justify">
										<div class="features-icon gradient-bg text-center">
											<i class="flaticon-list"></i>
											<div class="feat-tag">
												<span>03</span>
											</div>
										</div>
										<div class="features-text pt25">
											<div class="features-text-title">
												<h3>Flexible Learning Options</h3>
											</div>
											<div class="features-text-dec">
												<span>RHMC understands the value of flexibility in today's fast-paced world. With our online and blended learning options, students can tailor their study schedules to accommodate personal and professional commitments, making education accessible to all.</span>
											</div>
										</div>
									</div>
								</div>
								<!-- // extra-left-content -->
							</div><!-- /extra-left -->
						</div>
						<!-- /col-sm-3 -->

						{{-- <div class="col-sm-4">
							<div class="extra-pic text-center">
								<img src="<?= asset('genius/img/banner/wc-2.png')?>" alt="img">
							</div>
						</div> --}}
						<!-- /col-sm-6 -->

						<div class="col-md-6 col-sm-6">
							<div class="extra-left">
								<div class="extra-left-content">
									<div class="extra-icon-text text-justify text-right">
										<div class="features-icon gradient-bg text-center">
											<i class="flaticon-ruler-and-pencil"></i>
											<div class="feat-tag">
												<span>04</span>
											</div>
										</div>
										<div class="features-text pt25">
											<div class="features-text-title text-left">
												<h3>Expert Guidance and Support</h3>
											</div>
											<div class="features-text-dec text-justify">
												<span>Our dedicated team of educational advisors and counselors work closely with learners to understand their unique needs and guide them through the entire admission process. From selecting the right program to assisting with visa applications, RHMC provides comprehensive support at every step.</span>
											</div>
										</div>
									</div>
								</div>
								<!-- // extra-left-content -->

								<div class="extra-left-content">
									<div class="extra-icon-text text-justify text-right">
										<div class="features-icon gradient-bg text-center">
											<i class="flaticon-clipboards"></i>
											<div class="feat-tag">
												<span>05</span>
											</div>
										</div>
										<div class="features-text pt25">
											<div class="features-text-title text-left">
												<h3>Scholarships and Financial Aid</h3>
											</div>
											<div class="features-text-dec text-justify">
												<span>We believe in making quality education affordable. RHMC strives to connect learners with various scholarship opportunities and financial aid options, ensuring that finances are not a barrier to achieving academic excellence.</span>
											</div>
										</div>
									</div>
								</div>
								<!-- // extra-left-content -->

								<div class="extra-left-content">
									<div class="extra-icon-text text-justify text-right">
										<div class="features-icon gradient-bg text-center">
											<i class="flaticon-pie-chart"></i>
											<div class="feat-tag">
												<span>06</span>
											</div>
										</div>
										<div class="features-text pt25">
											<div class="features-text-title text-left">
												<h3>Eholistic Student Experience</h3>
											</div>
											<div class="features-text-dec text-justify">
												<span>RHMC is committed to offering a holistic learning experience beyond academics. We foster a supportive learning community where students can participate in cultural exchanges, and develop essential skills for personal and professional growth.</span>
											</div>
										</div>
									</div>
								</div>
								<!-- // extra-left-content -->
							</div><!-- /extra-left -->
						</div>
						<!-- /col-sm-3 -->
					</div><!-- /row -->
				</div>
			</div>
		</section>
	<!-- End why choose section
		============================================= -->


	<!-- Start of about us section
		============================================= -->
		<section id="about-us" class="about-us-section home-secound home-third">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="about-resigter-form backgroud-style relative-position">
							<div class="register-content">
								<div class="register-fomr-title text-center">
									<h3 class="bold-font"><span>Get a</span> Free Registration.</h3>
									<p>More Than 122K Online Available Courses</p>
								</div>
								<div class="register-form-area">
									<form class="contact_form" action="{{route('submit.request')}}" method="POST" enctype="multipart/form-data">
									@csrf
										<div class="contact-info">
											<input class="name" name="name" type="text" placeholder="Your Name." required>
										</div>
										<div class="contact-info">
											<input class="nbm" name="nbm" type="number" placeholder="Your Number" required>
										</div>
										<div class="contact-info">
											<input class="email" name="email" type="email" placeholder="Email Address." required>
										</div>
										<select name="course_id" required>
											@if(!empty($courses))
											<option value="0" selected="">Select Course.</option>
											@foreach($courses as $course)
											<option value="{{$course->id}}" >{{$course->title??''}}</option>
											@endforeach
											@endif
										</select>
										<div class="contact-info">
											<input name="date" type="text" id="datepicker" placeholder="Date." required>
										</div>
										<textarea name="message" placeholder="Message."></textarea>
										<div class="nws-button text-uppercase text-center white text-capitalize">
											<button type="submit" value="Submit">SUBMIT REQUEST </button> 
										</div> 
									</form>
								</div>
							</div>
						</div>
						<div class="bg-mockup">
							<img src="<?= asset('genius/img/about/abt.jpg')?>" alt="">
						</div>
					</div>
					<!-- /form -->

					<div class="col-md-7">
						<div class="about-us-text">
							<div class="section-title relative-position mb20 headline text-left">
								<span class="subtitle text-uppercase">SORT ABOUT US</span>
								<h2>We are <span>RHMC Course</span>
								work since 1980.</h2>
								<p>At RHMC, our mission is to revolutionize the way education is accessed and experienced worldwide. As a pioneering education platform, we bridge the gap between learners and leading universities, opening doors to endless possibilities for academic and career advancement. With a firm belief in the transformative power of education, we strive to create a global learning ecosystem that nurtures curiosity, promotes inclusivity, and empowers individuals to reach their full potential.</p>
							</div>
							<div class="about-content-text">
								{{-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam. magna aliquam volutpat. Ut wisi enim ad minim veniam.</p> --}}
								<div class="about-list mb65 ul-li-block">
									<ul>
										<li>Connect learner from diverse backgrounds to top-notch educational institutions.</li>
										<li>RHMC partners exclusively with accredited universities and institutions.</li>
										<li>We ensure the highest standards of education and academic excellence.</li>
										<li>RHMC constantly seeks to keep pace with the ever-evolving educational landscape.</li>
										<li>RHMC offers opportunities for continuous skill development.</li>
										<li>RHMC celebrates diversity and inclusivity.</li>
										
									</ul>
								</div>
								<div class="about-btn">
									{{-- <div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
										<a href="#">About Us <i class="fas fa-caret-right"></i></a>
									</div> --}}
									{{-- <div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
										<a href="mailto:info.rhmc.ae">contact us <i class="fas fa-caret-right"></i></a>
									</div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End of about us section
		============================================= -->


	<!-- Start of best course
		============================================= -->
		<section id="best-course" class="best-course-section">
			<div class="container">
				<div class="section-title mb45 headline text-center">
					<span class="subtitle text-uppercase">SEARCH OUR COURSES</span>
					<h2>Browse Our<span> Best Course.</span></h2>
				</div>
				<div class="best-course-area mb45">
					<div class="row">

					@php
					$countert = 0;
					@endphp
					@if(!empty($courses))
					@foreach($courses as $key => $value)

						<div class="col-md-3">
							<div class="best-course-pic-text relative-position">
								<div class="best-course-pic relative-position">
									<img src="<?= asset($value->media??'')?>" alt="">
									@if($value->is_featured == 1)
									<div class="trend-badge-2 text-center text-uppercase">
										<i class="fas fa-bolt"></i>
										<span>FEATURED</span>
									</div>
									@endif
									{{-- <div class="course-price text-center gradient-bg">
										<span>${{$value->price??'0'}}</span>
									</div> --}}
									<div class="course-price text-center gradient-bg">
										<span style="text-decoration: line-through;">${{$value->price??'0'}}</span>
									</div>
									<div style="margin-left:100px" class="course-price text-center gradient-bg">
										<span id="sale-price">${{$value->sale_price??'0'}}</span>
									</div>
									{{-- <div class="course-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div> --}}
									<div class="course-details-btn">
										<a href="{{ route('learning.detail', ['id' => $value->id]) }}"> <i class="fas fa-arrow-right"></i></a>
									</div>
									<div class="blakish-overlay"></div>
								</div>
								<div class="best-course-text">
									<div class="course-title mb20 headline relative-position">
										<h3><a href="{{ route('learning.detail', ['id' => $value->id]) }}">{{$value->title??''}}</a>
											@if($value->best_seller == 1) <span style="top:0px !important;" class="trend-badge text-uppercase bold-font"><i class="fas fa-bolt"></i> BEST SELLER</span>@endif
										</h3>
									</div>
									<div class="course-meta">
										<span class="course-category"><a href="{{ route('learning.detail', ['id' => $value->id]) }}">	
														@foreach($value->categories as $cat)
															{{$cat->category->name??''}}
														@endforeach
													</a></span>
									</div>
								</div>
							</div>
						</div>
						<!-- /course -->
					
						@endforeach
					@endif
					</div>
				</div>
				
			</div>
		</section>
		{{-- <div class="about-course-categori one-page-category about-teacher-2">
			<div class="container">
				<div class="category-slide text-center">
					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-technology"></i>
						</div>
						<div class="category-title">
							<h4>Responsive Website</h4>
						</div>
					</div>

					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-app-store"></i>
						</div>
						<div class="category-title">
							<h4>IOS Applications</h4>
						</div>
					</div>

					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-artist-tools"></i>
						</div>
						<div class="category-title">
							<h4>Graphic Design</h4>
						</div>
					</div>

					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-business"></i>
						</div>
						<div class="category-title">
							<h4>Marketing</h4>
						</div>
					</div>

					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-dna"></i>
						</div>
						<div class="category-title">
							<h4>Science</h4>
						</div>
					</div>

					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-cogwheel"></i>
						</div>
						<div class="category-title">
							<h4>Enginering</h4>
						</div>
					</div>

					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-technology-1"></i>
						</div>
						<div class="category-title">
							<h4>Photography</h4>
						</div>
					</div>

					<div class="category-icon-title text-center">
						<div class="category-icon">
							<i class="text-gradiant flaticon-technology-2"></i>
						</div>
						<div class="category-title">
							<h4>Mobile Application</h4>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- /course-categori -->
	<!-- End of best course
		============================================= -->


	<!-- Start of genius teacher v2
		============================================= -->
		{{-- <section id="genius-teacher-2" class="genius-teacher-section-2 one-page-teacher backgroud-style">
			<div class="container">
				<div class="section-title mb20  headline text-center">
					<span class="subtitle text-uppercase">LEARN NEW SKILLS</span>
					<h2><span>Popular</span> Teachers.</h2>
				</div>
				<div class="teacher-third-slide">
					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-4.jpg')?>" alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>

					</div>

					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-5.jpg')?>" alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>

					
					</div>

					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-4.jpg')?>" alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>

					</div>

					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-6.jpg')?>" alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>
					
					</div>

					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-5.jpg')?>"alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>

					</div>

					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-5.jpg')?>" alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>

						
					</div>

					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-4.jpg')?>" alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>

						
					</div>

					<div class="teacher-double">
						<div class="teacher-img-content relative-position">
							<img src="<?= asset('genius/img/teacher/ts-6.jpg')?>" alt="">
							<div class="teacher-cntent">
								<div class="teacher-social-name ul-li-block">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
									<div class="teacher-name">
										<span>Daniel
										Alvares</span>
									</div>
								</div>
							</div>
							<div class="teacher-category float-right">
								<span class="st-name">Mobile Apps </span>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</section> --}}
	<!-- End of genius teacher v2
		============================================= -->





	<!-- Start latest section
		============================================= -->
		<section id="latest-area" class="latest-area-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="latest-area-content">
							<div class="section-title-2 mb65 headline text-left">
								<h2>Latest <span>News.</span></h2>
							</div>
							<div class="latest-news-posts">

							@php
							$counter3 = 0;
							@endphp

							@if(!empty($blogs))
							@foreach($blogs as $key => $blog)

								<div class="latest-news-area">
									<div class="latest-news-thumbnile relative-position">
										<img src="<?= asset($blog->media??'')?>" alt="">
										<div class="hover-search">
											<i class="fas fa-search"></i>
										</div>
										<div class="blakish-overlay"></div>
									</div>
									<div class="date-meta">
										<i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}
									</div>
									<h3 class="latest-title bold-font"><a href="{{route('front.blogs.solo', $blog->id)}}">{{$blog->name??''}}</a></h3>
									<!-- <div class="course-viewer ul-li">
										<ul>
											<li><a href=""><i class="fas fa-user"></i> 1.220</a></li>
											<li><a href=""><i class="fas fa-comment-dots"></i> 1.015</a></li>
										</ul>
									</div> -->
								</div>
								<!-- /post -->

								
								@endforeach
							@endif

								<div class="view-all-btn bold-font">
									<a href="{{route('front.blogs')}}">View All News <i class="fas fa-chevron-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /latest-news -->
					<div class="col-md-4">
						<div class="latest-area-content">
							<div class="section-title-2 mb65 headline text-left">
								<h2>Upcoming <span>Events.</span></h2>
							</div>

							@if(!empty($events))
							@foreach($events as $event)
							<div class="latest-events">
								<div class="latest-event-item">
									<div class="events-date  relative-position text-center">
										<div class="gradient-bdr"></div>
										<span class="event-date bold-font">{{ Carbon::parse($event->event_date)->format('d') }}</span>
										{{ Carbon::parse($event->event_date)->format('F Y') }}
									</div>
									<div class="event-text">
										<h3 class="latest-title bold-font"><a href="#">{{$event->title??''}}</a></h3>
										<div class="course-meta">
											<span class="course-category"><a href="#">{{$event->category->name??''}}</a></span>
											<span class="course-author"><a href="#">{{$event->user->name??''}}</a></span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							@endif
							<div class="view-all-btn bold-font">
								<a  href="{{route('front.events')}}">Show All Events<i class="fas fa-chevron-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /events -->

					<div class="col-md-4">
						<div class="latest-area-content">
							<div class="section-title-2 mb65 headline text-left">
								<h2>Latest <span>Webinars.</span></h2>
							</div>
							<div class="latest-video-poster relative-position mb20">
								<img src="<?= asset($webinar->media??'')?>" alt="">
								<div class="video-play-btn text-center gradient-bg">
									<a class="popup-with-zoom-anim" href="{{$webinar->video_url??''}}"><i class="fas fa-play"></i></a>
								</div>
							</div>
							<h3 class="latest-title bold-font"><a href="#">{{$webinar->title??'' }}</a></h3>
							<p class="mb25">{{ Illuminate\Support\Str::limit($webinar->description??'', $limit = 100, $end = '...') }}							</p>
							<div class="view-all-btn bold-font">
								<a href="{{route('front.webinars')}}">Show All Webinars <i class="fas fa-chevron-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /. -->
				</div>
			</div>
		</section>
	<!-- End latest section
		============================================= -->


	<!-- Start of best product section
		============================================= -->
		<!-- <section id="best-product" class="best-product-section home-third-best-product">
			<div class="container">
				<div class="section-title-2 mb65 headline text-left">
					<h2>Genius <span>Best Products.</span></h2>
				</div>
				<div id="best-product-slide-item" class="best-product-slide">
					<div class="product-img-text">
						<div class="product-img text-center mb20">
							<img src="<?= asset('genius/img/product/bp-1.png')?>" alt="">
						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="#">Mobile Apps Books.</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>$55.25</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>

					<div class="product-img-text">
						<div class="product-img text-center mb20">
							<img src="<?= asset('genius/img/product/bp-4.png')?>"alt="">
						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="#">Mobile Apps Books.</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>$55.25</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>
					<div class="product-img-text">
						<div class="product-img text-center mb20">
							<img src="<?= asset('genius/img/product/bp-2.png')?>"alt="">
						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="#">Mobile Apps Books.</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>$55.25</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>
					<div class="product-img-text">
						<div class="product-img text-center mb20">
							<img src="<?= asset('genius/img/product/bp-3.png')?>" alt="">
						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="#">Mobile Apps Books.</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>$55.25</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>
					<div class="product-img-text">
						<div class="product-img text-center mb20">
							<img src="<?= asset('genius/img/product/bp-4.png')?>"alt="">
						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="#">Mobile Apps Books.</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>$55.25</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>
					<div class="product-img-text">
						<div class="product-img text-center mb20">
							<img src="<?= asset('genius/img/product/bp-1.png')?>" alt="">
						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="#">Mobile Apps Books.</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>$55.25</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>
					<div class="product-img-text">
						<div class="product-img text-center mb20">
							<img src="<?= asset('genius/img/product/bp-2.png')?>" alt="">
						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="#">Mobile Apps Books.</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>$55.25</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
	<!-- End  of best product section
		============================================= -->


	<!-- Start of Search Courses
		============================================= -->
		{{-- <section id="search-course-2" class="search-course-section home-third-course-search backgroud-style">
			<div class="container">
				<div class="section-title mb20 headline text-center">
					<span class="subtitle text-uppercase">LEARN NEW SKILLS</span>
					<h2><span>Search</span> RHMC Courses.</h2>
				</div>
				<div class="search-course mb30 relative-position">
					<form action="#" method="post">
						<input class="course" name="course" type="text" placeholder="Type what do you want to learn today?">
						<div class="nws-button text-center  gradient-bg text-capitalize">
							<button type="submit" value="Submit">Search Course</button> 
						</div>
					</form>
				</div>

				<div class="search-app">
					<div class="row">
						<div class="col-md-6">
							<div class="app-mock-up">
								<img src="<?= asset('genius/img/about/ab-2.png')?>" alt="">
							</div>
						</div>

						<div class="col-md-6">
							<div class="about-us-text search-app-content">
								<div class="section-title relative-position mb20 headline text-left">
									<h2><span>Download</span> Genius Application on <span>PlayStore.</span></h2>
								</div>

								<div class="app-details-content">
									<p>Introduction Genius Mobile Application on Play Store lorem ipsum dolor sit amet consectuerer adipiscing.</p>

									<div class="about-list mb30 ul-li-block">
										<ul>
											<li>Professional And Experienced Since 1980</li>
											<li>Our Mission Increasing Global Access To Quality Aducation</li>
											<li>100K Online Available Courses</li>
										</ul>
									</div>
									<div class="about-btn">
										<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
											<a href="#">GET THE APP NOW <i class="fas fa-caret-right"></i></a>
										</div>

										<div class="app-stor ul-li">
											<ul>
												<li><a href="#"><i class="fab fa-android"></i></a></li>
												<li><a href="#"><i class="fab fa-apple"></i></a></li>
												<li><a href="#"><i class="fab fa-windows"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
	<!-- End of Search Courses
		============================================= -->


	<!-- Start FAQ section
		============================================= -->
		<section id="faq" class="faq-section green-custom-background faq-secound-home-version backgroud-style">
			<div class="container">
				<div class="section-title headline text-left">
					{{-- <span class="subtitle text-uppercase">GENIUS COURSE FAQ</span> --}}
					<h2>Frequently Asked Questions (FAQs)</span></h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="faq-tab">
							<div class="faq-tab-ques  ul-li">
								<div class="tab-button text-center mb65">
									<ul class="product-tab">
										{{-- <li class="active" rel="tab1">GENERAL </li> --}}
									</ul>
								</div>
								<!-- /tab-head -->

								<!-- tab content -->
								<div class="tab-container">

									<!-- 1st tab -->
									<div id="tab1" class="tab-content-1 pt35">
										<div id="accordion" class="panel-group">
										
											@if(!empty($faqs))
											@foreach($faqs as $key => $faq)
												@php
												// Generate a unique identifier for the FAQ item
												$uniqueId = uniqid();
											@endphp
												<div class="panel">
													<div class="panel-title" id="heading{{$uniqueId}}">
														<h3 class="mb-0">
															<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$uniqueId}}" aria-expanded="false" aria-controls="collapse{{$uniqueId}}">
																{{$faq->question ?? ''}}
															</button>
														</h3>
													</div>
													<div id="collapse{{$uniqueId}}" class="collapse" aria-labelledby="heading{{$uniqueId}}" data-parent="#accordion">
														<div class="panel-body">
															{{$faq->answer ?? ''}}
														</div>
													</div>
												</div>
												@endforeach
											@endif
										</div>
										<!-- end of #accordion -->
									</div>
									<!-- #tab1 -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<img src="{{asset('genius/img/banner/faq.png')}}" alt="Picture" style=" position: absolute;">
					</div>
				</div>

				{{-- <div class="about-btn text-center">
					<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
						<a href="#">contact us <i class="fas fa-caret-right"></i></a>
					</div>
				</div> --}}
			</div>
		</section>
	<!-- End FAQ section
		============================================= -->


	<!-- Start of testimonial secound section
		============================================= -->
		{{-- <section id="testimonial_2" class="testimonial_2_section">
			<div class="container">
				<div class="testimonial-slide">
					<div class="section-title-2 mb65 headline text-left">
						<h2>Students <span>Testimonial.</span></h2>
					</div>

					<div  id="testimonial-slide-item" class="testimonial-slide-area">
						<div class="student-qoute">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>

						<div class="student-qoute">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>

						<div class="student-qoute">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>

						<div class="student-qoute">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
	<!-- End  of testimonial secound section
		============================================= -->


	<!-- Start of sponsor section
		============================================= -->
		<!-- <section id="sponsor" class="sponsor-section">
			<div class="container">
				<div class="section-title-2 mb65 headline text-left">
					<h2>Genius <span>Sponsors.</span></h2>
				</div>
				<div class="sponsor-item sponsor-1">
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-1.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-2.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-3.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-4.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-5.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-6.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-6.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-6.jpg')?>" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="<?= asset('genius/img/sponsor/s-6.jpg')?>" alt="">
					</div>
				</div>
			</div>
		</section> -->
	<!-- End of sponsor section
		============================================= -->



	<!-- Start of contact area form
		============================================= -->
		<section id="contact-form" class="contact-form-area_3">
			<div class="container">
				<div class="section-title mb45 headline text-center">
					<span class="subtitle text-uppercase">Send us a message</span>
					<h2>Send Us A<span> Message.</span></h2>
				</div>
				
				<div class="contact_third_form">
					<form class="contact_form" id="myForm" action="#" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4">
								<div class="contact-info">
									<input class="name" name="name" type="text" placeholder="Your Name.">
								</div>
							</div>
							<div class="col-md-4">
								<div class="contact-info">
									<input class="email" name="email" type="email" placeholder="Your Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="contact-info">
									<input class="number" name="number" type="number" placeholder="Phone Number">
								</div>
							</div>
						</div>
						<textarea  placeholder="Message."></textarea>
						<div class="nws-button text-center  gradient-bg text-uppercase">
							{{-- <button type="submit" value="Submit">SEND EMAIL <i class="fas fa-caret-right"></i></button>  --}}
							<a href="#" id="submitForm">SEND EMAIL <i class="fas fa-caret-right"></i></a>
						</div>
						{{-- <div class="about-btn text-center">
							<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
								<a href="#" id="submitForm">SEND EMAIL <i class="fas fa-caret-right"></i></a>
								<button type="submit" value="Submit">SEND EMAIL <i class="fas fa-caret-right"></i></button> 
							</div>
						</div> --}}
					</form>
				</div>
			</div>
		</section>
	<!-- End of contact area form
		============================================= -->



	<!-- Start of contact area
		============================================= -->
		<section id="contact-area" class="contact-area-section backgroud-style">
			<div class="container">
				<div class="contact-area-content">
					<div class="row">
						<div class="col-md-8">
							<div class="contact-left-content">
								<div class="section-title  mb45 headline text-left">
									<span class="subtitle ml42  text-uppercase">CONTACT US</span>
									<h2><span>Get in Touch</span></h2>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet  ipsum dolor sit amet, consectetuer adipiscing elit.
									</p>
								</div>

								<div class="contact-address">
									<div class="contact-address-details">
										<div class="address-icon relative-position text-center float-left">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<div class="address-details ul-li-block">
											<ul>
												<li><span>Location: </span>Last Vegas, 120 Graphic Street, US</li>
												{{-- <li><span>Second: </span>Califorinia, 88 Design Street, US</li> --}}
											</ul>
										</div>
									</div>

									<div class="contact-address-details">
										<div class="address-icon relative-position text-center float-left">
											<i class="fas fa-phone"></i>
										</div>
										<div class="address-details ul-li-block">
											<ul>
												<li><span>Primary: </span>+97143967462</li>
												{{-- <li><span>Second: </span>(20) 3434 9999</li> --}}
											</ul>
										</div>
									</div>

									<div class="contact-address-details">
										<div class="address-icon relative-position text-center float-left">
											<i class="fas fa-envelope"></i>
										</div>
										<div class="address-details ul-li-block">
											<ul>
												<li><span>Primary: </span>info.rhmc.ae</li>
												{{-- <li><span>Second: </span>mail@genius.info</li> --}}
											</ul>
										</div>
									</div>
								</div>
							</div>
							{{-- <div class="genius-btn mt60 gradient-bg text-center text-uppercase ul-li-block bold-font">
								<a href="mailto:info.rhmc.ae">Contact Us <i class="fas fa-caret-right"></i></a>
							</div> --}}
						</div>
						<div class="col-md-4">
							{{-- <img src="{{asset('genius/img/banner/home-contactus.png')}}" alt="Picture" style=" position: absolute; margin-top: 30px;"> --}}
						</div>

						{{-- <div class="col-md-6">
							<div id="contact-map" class="contact-map-section">
								<div id="google-map">
									<div id="googleMaps" class="google-map-container"></div>
								</div><!-- /#google-map-->
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</section>
	<!-- End of contact area
		============================================= -->

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (text, process) {
        return $.get(path, { text: text }, function (data) {
			console.log(data);
                return process(data);
            });
        }
    });

	$('.search-home-course-btn').on('click',function(){
		var search = $('.search-home-course').val();
		// console.log('search',search);
		window.location.href = "{{route('learning')}}"+"?search="+search;
	});
</script>
@endsection