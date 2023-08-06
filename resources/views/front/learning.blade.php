

@php
use App\Functions\Helper;
@endphp

@extends('front.app')
@section('content')


	<!-- Start of breadcrumb section
		============================================= -->
		<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold">RHMC <span>Learning</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Learning</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	<!-- End of breadcrumb section
		============================================= -->


	<!-- Start of course section
		============================================= -->
		<section id="course-page" class="course-page-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="short-filter-tab">
							
							<div class="tab-button blog-button ul-li text-center float-right">
								<ul class="product-tab">
									<li class="active" rel="tab1"><i class="fas fa-th"></i></li>
									<li rel="tab2"> <i class="fas fa-list"></i></li>
								</ul>
							</div>
						</div>

						<div class="genius-post-item">
							<div class="tab-container">
								<div id="tab1" class="tab-content-1 pt35">
									<div class="best-course-area best-course-v2">
										<div class="row">

											@if(!empty($courses))
											@foreach($courses as $key => $value)

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="<?= asset($value->media)?>" alt="">
														@if($value->is_featured == 1)
														<div class="trend-badge-2 text-center text-uppercase">
															<i class="fas fa-bolt"></i>
															<span>Featured</span>
														</div>
														@endif
														{{-- <div class="course-price text-center gradient-bg">
															<span>${{$value->price??''}}</span>
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
														{{-- <div class="course-meta">
															<span class="course-category"><a href="{{ route('learning.detail', ['id' => $value->id]) }}">Web Design</a></span>
														</div> --}}
													</div>
												</div>
											</div>
											<!-- /course -->

											@endforeach
											@endif
										</div>
									</div>
								</div><!-- /tab-1 -->

								<div id="tab2" class="tab-content-1">
									<div class="course-list-view">
										<table>
											<tr class="list-head">
												<th>COURSE NAME</th>
												<th>COURSE TYPE</th>
												<th>PUBLISHED</th>
												<th>LENGTH</th>
											</tr>
											@if(!empty($courses))
											@foreach($courses as $key => $value)
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="<?= asset($value->media)?>" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="{{ route('learning.detail', ['id' => $value->id]) }}">{{$value->title??''}}</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="{{ route('learning.detail', ['id' => $value->id]) }}">${{$value->price??''}}</a></span>
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
														</div>
													</div>
												</td>
												<td>
													<div class="course-type-list">
														@foreach($value->categories as $cat)
														<span>{{$cat->category->name??''}}</span>
														@endforeach
													</div>
												</td>
												<td>{{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}</td>
												<td>{{$value->duration??''}} Months</td>
											</tr>
											
											@endforeach
											@endif
										</table>
									</div>
								</div><!-- /tab-2 -->
							</div>
						</div>

						<div class="couse-pagination text-center ul-li">
							<ul>
								<li class="pg-text"><a href="#">PREV</a></li>
								<li><a href="#">01</a></li>
								<li><a href="#">02</a></li>
								<li class="active"><a href="#">03</a></li>
								<li><a href="#">04</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">15</a></li>
								<li class="pg-text"><a href="#">NEXT</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3">
						<div class="side-bar">

							<div class="side-bar-widget  first-widget">
								<h2 class="widget-title text-capitalize"><span>Find </span>Your Course.</h2>
								<div class="listing-filter-form pb30">
									<form id="filterForm" action="{{ route('learning') }}" method="get">
										<div class="filter-select mb20">
											<label>COURSE TYPE</label>
											<select name="category" required>
											@if(!empty($categories))
											<option value="" selected="">All Categories </option>
                                            @foreach ($categories as $key => $category)
												<option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                            @endif
											</select>
										</div>
										<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
											<a href="#" onclick="event.preventDefault(); document.getElementById('filterForm').submit();">FIND COURSES <i class="fas fa-caret-right"></i></a>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End of course section
		============================================= -->


		{{-- <section id="best-course" class="best-course-section">
			<div class="container">
				<div class="section-title mb45 headline text-center">
					<span class="subtitle text-uppercase">SEARCH OUR COURSES</span>
					<h2>You<span> Recently View.</span></h2>
				</div>
				<div class="best-course-area mb45">
					<div class="row">

					@if (auth()->check())
					@foreach (session('recently_viewed_courses', []) as $courseId)
						<li>{{ $courseId }}</li> 
					@endforeach
					@else
						@foreach (request()->cookie('recently_viewed_courses', []) as $courseId)
							<li>{{ $courseId }}</li> 
						@endforeach
					@endif
						<div class="col-md-3">
							<div class="best-course-pic-text relative-position">
								<div class="best-course-pic relative-position">
									<img src="<?= asset('genius/img/course/bc-1.jpg')?>" alt="">
									@if($value->is_featured == 1)
														<div class="trend-badge-2 text-center text-uppercase">
															<i class="fas fa-bolt"></i>
															<span>Featured</span>
														</div>
														@endif
									<div class="course-price text-center gradient-bg">
										<span>$99.00</span>
									</div>
									<div class="course-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div>
									<div class="course-details-btn">
										<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
									</div>
									<div class="blakish-overlay"></div>
								</div>
								<div class="best-course-text">
									<div class="course-title mb20 headline relative-position">
										<h3><a href="#">Fully Responsive Web Design &amp; Development.</a></h3>
									</div>
									<div class="course-meta">
										<span class="course-category"><a href="#">Web Design</a></span>
										<span class="course-author"><a href="#">250 Students</a></span>
									</div>
								</div>
							</div>
						</div>
						<!-- /course -->

						
						

						
					</div>
				</div>
			</div>
		</section> --}}


@endsection