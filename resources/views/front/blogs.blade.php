

@php
use App\Functions\Helper;
use Illuminate\Support\Str;
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
						<h2 class="breadcrumb-head black bold">RHMC <span>Blog</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">blog</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	<!-- End of breadcrumb section
		============================================= -->

	<!-- Start of blog content
		============================================= -->
		<section id="blog-item" class="blog-item-post">
			<div class="container">
				<div class="blog-content-details">
					<div class="row">
						<div class="col-md-9">
							<div class="blog-post-content">
								<div class="short-filter-tab">
									<div class="shorting-filter  float-left">
										<span><b>Sort</b> By</span>
										<select>
											<option value="9" selected="">Popularity</option>
											<option value="10">Most Read</option>
											<option value="11">Most View</option>
											<option value="12">Most Shared</option>
										</select>
									</div>
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
											<div class="row">
                                                
                                                @if(!empty($blogs))
                                                @foreach($blogs as $blog)
												<div class="col-md-6">
													<div class="blog-post-img-content">
														<div class="blog-img-date relative-position">
															<div class="blog-thumnile">
																<img src="{{asset($blog->media)}}" alt="">
															</div>
															<div class="course-price text-center gradient-bg">
																<span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</span>
															</div>
														</div>
														<div class="blog-title-content headline">
															<h3><a href="{{route('front.blogs.solo', $blog->id)}}">{{$blog->name??''}}</a></h3>
															<div class="blog-content">
                                                                {!! $blog->description !!}
                                                            </div>

															<div class="view-all-btn bold-font">
																<a href="{{route('front.blogs.solo', $blog->id)}}">Read More <i class="fas fa-chevron-circle-right"></i></a>
															</div>
														</div>
													</div>
												</div>
                                                    @endforeach
                                                @endif
											</div>
										</div><!-- 1st tab -->

										<div id="tab2" class="tab-content-1 pt35">
											<div class="blog-list-view">
                                                  
                                            @if(!empty($blogs))
                                                @foreach($blogs as $blog)
												<div class="list-blog-item">
													<div class="row">
														<div class="col-md-6">
															<div class="blog-post-img-content">
																<div class="blog-img-date relative-position">
																	<div class="blog-thumnile">
																		<img src="{{asset($blog->media)}}" alt="">
																	</div>
																	<div class="course-price text-center gradient-bg">
                                                                    <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</span>

																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="blog-title-content headline">
																<h3><a href="{{route('front.blogs.solo', $blog->id)}}">{{$blog->name??''}}</a></h3>
																<div class="blog-content">
                                                                {!! $blog->description !!}
                                                                </div>

																<div class="view-all-btn bold-font">
																	<a href="{{route('front.blogs.solo', $blog->id)}}">Read More <i class="fas fa-chevron-circle-right"></i></a>
																</div>
															</div>
														</div>
													</div>
												</div>
                                                @endforeach
                                                @endif
											</div>
										</div><!-- 2nd tab -->
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

						<div class="col-md-3">
							<div class="side-bar">
								<div class="side-bar-search">
                                <form action="{{ route('front.blogs') }}" method="get">
                                    <input type="text" name="search" class="" placeholder="Search">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
								</div>

								<div class="side-bar-widget">
									<h2 class="widget-title text-capitalize">blog <span>Categories.</span></h2>
									<div class="post-categori ul-li-block">
										<ul>
                                            @if(!empty($categories))
                                            @foreach ($categories as $key => $category)
											<li class="cat-item"><a href="{{ route('front.blogs', ['category' => $category->id]) }}">{{ $category->name ?? '' }}</a></li>
                                            @endforeach
                                            @endif
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End of blog content
		============================================= -->

@endsection