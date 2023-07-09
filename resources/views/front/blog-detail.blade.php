

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
						<h2 class="breadcrumb-head black bold">Genius <span>Blog</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">blog Single</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	<!-- End of breadcrumb section
		============================================= -->


	<!-- Start of Blog single content
		============================================= -->
		<section id="blog-detail" class="blog-details-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="blog-details-content">
							<div class="post-content-details">
								<div class="blog-detail-thumbnile mb35">
									<img src="{{asset($blog->media)}}" alt="">
								</div>
								<h2>{{$blog->name??''}}</h2>

								<div class="date-meta text-uppercase">
									<span><i class="fas fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</span>
									<span><i class="fas fa-user"></i> {{$blog->user->name}}</span>
								</div>
								{!! $blog->description !!}
							</div>
							
							<!-- <div class="author-comment">
								<div class="author-img">
									<img src="{{asset('genius/img/blog/ath.jpg')}}" alt="">
								</div>
								<div class="author-designation-comment">
									BY: <span>FRANK LAMPARD</span> 
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
									</p>
								</div>
							</div> -->
							<div class="next-prev-post">
								<div class="next-post-item float-left">
								@if($previousBlog)	<a href="{{route('front.blogs.solo', $previousBlog->id)}}"><i class="fas fa-arrow-circle-left"></i>Previous Post</a>@endif
								</div>

								<div class="next-post-item float-right">
									@if($nextBlog)<a href="{{route('front.blogs.solo', $nextBlog->id)}}">Next Post<i class="fas fa-arrow-circle-right"></i></a> @endif
								</div>
							</div>
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
		</section>
	<!-- End of Blog single content
		============================================= -->
@endsection