@php
use App\Functions\Helper;
@endphp

@extends('front.app')
@section('content')

<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold">Genius <span>Course Details.</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Details</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

        <section id="course-details" class="course-details-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="course-details-item">
							<div class="course-single-pic mb30">
								<img src="assets/img/course/cs-1.jpg" alt="">
							</div>
							<div class="course-single-text">
								<div class="course-title mt10 headline relative-position">
									<h3><a href="#">{{$course->title??''}}</b></a> @if($course->is_featured == 1) <span class="trend-badge text-uppercase bold-font"> <i class="fas fa-bolt"></i> TRENDING</span> @endif</h3>
								</div>
								<div class="course-details-content">
                                    {!!$course->description!!}
								</div>

								<!-- <div class="course-details-category ul-li">
									<span>Course <b>Section:</b></span>
									<ul>
										<li><a href="#">SEction 1 </a></li>
										<li><a href="#">SEction 2 </a></li>
										<li><a href="#">SEction 3 </a></li>
										<li><a href="#">SEction 4  </a></li>
										<li><a href="#">SEction 5  </a></li>
									</ul>
								</div> -->
							</div>
						</div>
						<!-- /course-details -->

						<!-- <div class="affiliate-market-guide mb65">
							<div class="section-title-2 mb20 headline text-left">
								<h2><span>Affiliate Marketing</span> A Begginer's Guide</h2>
							</div>

							<div class="affiliate-market-accordion">
								<div id="accordion" class="panel-group">
									<div class="panel">
										<div class="panel-title" id="headingOne">
											<div class="ac-head">
												
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													<span>01</span>	Designing Website Using Photoshop 
												</button>
												<div class="course-by">
													BY: <b>TONI KROSS</b> 
												</div>
												<div class="leanth-course">
													<span>60 Minuttes</span>
													<span>Adobe photoshop</span>
												</div>
											</div>
										</div>
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingTwo">
											<div class="ac-head">
												
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
													<span>02</span>	Designing Website Using Photoshop 
												</button>
												<div class="course-by">
													BY: <b>TONI KROSS</b> 
												</div>
												<div class="leanth-course">
													<span>60 Minuttes</span>
													<span>Adobe photoshop</span>
												</div>
											</div>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingThree">
											<div class="ac-head">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
													<span>03</span>	Designing Website Using Photoshop 
												</button>
												<div class="course-by">
													BY: <b>TONI KROSS</b> 
												</div>
												<div class="leanth-course">
													<span>60 Minuttes</span>
													<span>Adobe photoshop</span>
												</div>
											</div>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingFoure">
											<div class="ac-head">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFoure" aria-expanded="true" aria-controls="collapseFoure">
													<span>04</span>	Designing Website Using Photoshop 
												</button>
												<div class="course-by">
													BY: <b>TONI KROSS</b> 
												</div>
												<div class="leanth-course">
													<span>60 Minuttes</span>
													<span>Adobe photoshop</span>
												</div>
											</div>
										</div>
										<div id="collapseFoure" class="collapse" data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /market guide -->

						<!-- <div class="course-review">
							<div class="section-title-2 mb20 headline text-left">
								<h2>Course <span>Reviews:</span></h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="ratting-preview">
										<div class="row">
											<div class="col-md-4">
												<div class="avrg-rating ul-li">
													<b>Average Rating</b>
													<span class="avrg-rate">5.0</span>
													<ul>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<b>1.225 Ratings</b>
												</div>
											</div>
											<div class="col-md-8">
												<div class="avrg-rating ul-li">
													<span>Details</span>
													<div class="rating-overview">
														<span class="start-item">5 Starts</span>
														<span class="start-bar"></span>
														<span class="start-count">1.225</span>
													</div>
													<div class="rating-overview">
														<span class="start-item">4 Starts</span>
														<span class="start-bar"></span>
														<span class="start-count">0</span>
													</div>
													<div class="rating-overview">
														<span class="start-item">3 Starts</span>
														<span class="start-bar"></span>
														<span class="start-count">0</span>
													</div>
													<div class="rating-overview">
														<span class="start-item">2 Starts</span>
														<span class="start-bar"></span>
														<span class="start-count">0</span>
													</div>
													<div class="rating-overview">
														<span class="start-item">1 Starts</span>
														<span class="start-bar"></span>
														<span class="start-count">0</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /review overview -->

						<!-- <div class="couse-comment">
							<div class="blog-comment-area ul-li about-teacher-2">
								<ul class="comment-list">
									<li>
										<div class=" comment-avater">
											<img src="assets/img/blog/ath-2.jpg" alt="">
										</div>

										<div class="author-name-rate">
											<div class="author-name float-left">
												BY: <span>FRANK LAMPARD</span> 
											</div>
											<div class="comment-ratting float-right ul-li">
												<ul>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												</ul>
											</div>
											<div class="time-comment float-right">3 Days ago</div>
										</div>
										<div class="author-designation-comment">
											<h3>Great Course!! Recommended for Everyone</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
											</p>
										</div>
									</li>

									<li>
										<div class=" comment-avater">
											<img src="assets/img/blog/ath.jpg" alt="">
										</div>

										<div class="author-name-rate">
											<div class="author-name float-left">
												BY: <span>FRANK LAMPARD</span> 
											</div>
											<div class="comment-ratting float-right ul-li">
												<ul>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												</ul>
											</div>
											<div class="time-comment float-right">3 Days ago</div>
										</div>
										<div class="author-designation-comment">
											<h3>Great Course!! Recommended for Everyone</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
											</p>
										</div>
									</li>
								</ul>

								<div class="reply-comment-box">
									<div class="review-option">
										<div class="section-title-2  headline text-left float-left">
											<h2>Add  <span>Reviews.</span></h2>
										</div>
										<div class="review-stars-item float-right mt15">
											<span>Your Rating: </span>
											<form class="rating">
												<label>
													<input type="radio" name="stars" value="1">
													<span class="icon"><i class="fas fa-star"></i></span>
												</label>
												<label>
													<input type="radio" name="stars" value="2">
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
												</label>
												<label>
													<input type="radio" name="stars" value="3">
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>   
												</label>
												<label>
													<input type="radio" name="stars" value="4">
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
												</label>
												<label>
													<input type="radio" name="stars" value="5">
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
													<span class="icon"><i class="fas fa-star"></i></span>
												</label>
											</form>
										</div>
									</div>
									<div class="teacher-faq-form">
										<form method="POST" action="/no-form" data-lead="Residential">
											<div class="row">
												<div class="col-md-6">
													<label for="name">Your Name</label>
													<input type="text" name="name" id="name" required="required">
												</div>
												<div class="col-md-6">
													<label for="phone">Email Address</label>
													<input type="tel" name="phone" id="phone" required="required">
												</div>
											</div>
											<label for="comments">Message</label>
											<textarea name="comments" id="comments" rows="2" cols="20" required="required"></textarea>
											<div class="nws-button text-center  gradient-bg text-uppercase">
												<button type="submit" value="Submit">Send Message now</button> 
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>-->
					</div> 

					<div class="col-md-3">
						<div class="side-bar">
							<div class="course-side-bar-widget">
								<h3>Price <span>${{$course->price}}</span></h3>
								<div class="genius-btn gradient-bg text-center text-uppercase float-left bold-font">
									<a class="checkAuth" data-course="{{$course->id}}" href="javascript:void(0)">Enroll THis course <i class="fas fa-caret-right"></i></a>
									<input type="hidden" id="courseId" value="{{$course->id}}">
								</div>
								<div class="like-course">
									<a href="#"><i class="fas fa-heart"></i></a>
								</div>
							</div>
							<div class="enrolled-student">
								<div class="comment-ratting float-left ul-li">
									<ul>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									</ul>
								</div>
								
							</div>
							<div class="couse-feature ul-li-block">
								<ul>
									<li>Lectures <span>{{$course->lectures??''}} Lectures</span></li>
                                    <li>Language <span>
                                    @php
                                        $languages = json_decode($course->languages);
                                    @endphp
                                    
                                    @if (is_array($languages))
                                        @foreach ($languages as $language)
                                            {{ htmlspecialchars($language) }}
                                        @endforeach
                                    @else
                                        {{ htmlspecialchars($languages) }}
                                    @endif
                                    </span></li>

									<li>Video  <span>{{$course->video??''}} Hours</span></li>
									<li>Duration <span>{{$course->duration??''}} Days</span></li>
									<li>Includes  <span>
                                    @php
                                        $includes = json_decode($course->includes);
                                    @endphp
                                    
                                    @if (is_array($includes))
                                        @foreach ($includes as $language)
                                            {{ htmlspecialchars($language) }}
                                        @endforeach
                                    @else
                                        {{ htmlspecialchars($includes) }}
                                    @endif
                                    </span></li>
								</ul>
							</div>

							
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection