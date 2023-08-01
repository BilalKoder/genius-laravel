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
						<h2 class="breadcrumb-head black bold">RHMC <span>Webinar Details</span></h2>
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
								<img src="{{asset($course->media)}}" alt="">
							</div>
							<div class="course-single-text">
								<div class="course-title mt10 headline relative-position">
									<h3><a href="#">{{$course->title??''}}</b></a> </h3>
								</div>
								<div class="course-details-content">
                                    {!!$course->description!!}
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</section>

@endsection