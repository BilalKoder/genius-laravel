

@php
use App\Functions\Helper;
@endphp

@extends('front.app')
<style>
	.breadcrumb-section{
		background-image: url(../genius/img/banner/webinar-1.jpg) !important;
	}

</style>
@section('content')


	<!-- Start of breadcrumb section
		============================================= -->
		<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold">RHMC <span>Webinars</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Webinars</li>
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
					<div class="col-md-12">
						<div class="short-filter-tab">
							<div class="tab-button blog-button ul-li text-center float-right">
								<ul class="product-tab">
									<li class="active" rel="tab1"><i class="fas fa-th"></i></li>
								</ul>
							</div>
						</div>
						<div class="genius-post-item">
							<div class="tab-container">
								<div id="tab1" class="tab-content-1 pt35">
									<div class="best-course-area best-course-v2">
										<div class="row">
											@if(!empty($webinars))
											@foreach($webinars as $key => $value)
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
														<div class="course-price text-center gradient-bg">
															<span>{{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}</span>
														</div>
														<div class="course-rate ul-li">
														</div>
														<div class="course-details-btn">
															<a href="javscript:void(0)"> DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
													</div>
													<div class="best-course-text">
														<div class="course-title mb20 headline relative-position">
															<h3><a href="javscript:void(0)">{{$value->title??''}}</a></h3>
														</div>
														<div class="course-meta">
															<span class="course-category"><a href="javscript:void(0)">{{$value->user->name??''}}</a></span>
														</div>
													</div>
												</div>
											</div>
											<!-- /course -->

											@endforeach
											@endif
										</div>
									</div>
								</div><!-- /tab-1 -->
							</div>
						</div>

						{{-- <div class="couse-pagination text-center ul-li">
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
						</div> --}}
					</div>
				</div>
			</div>
		</section>
	<!-- End of course section
		============================================= -->
@endsection