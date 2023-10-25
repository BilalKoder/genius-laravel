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
						<h2 class="breadcrumb-head black bold"> <span> {{$course->title??'Course Details'}}</span>  </h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
								<img src="{{asset($course->media??'')}}" alt="{{$course->title??'Course Image'}}">
							</div>
							<div class="course-single-text">
								<div class="course-title mt10 headline relative-position">
									<h3><a href="#">{{$course->title??''}}</b></a> @if($course->is_featured == 1) <span class="trend-badge text-uppercase bold-font"> <i class="fas fa-bolt"></i> TRENDING</span> @endif</h3>
								</div>
								<div class="course-details-content">
                                    {!!$course->description!!}
								</div>
							</div>
						</div>
						
					</div> 

					<div class="col-md-3">
						<div class="side-bar">
							<div class="course-side-bar-widget">
								<h3>Price <span>${{$course->sale_price}}</span></h3>
								
								{{-- <div class="genius-btn gradient-bg text-center text-uppercase float-left bold-font"> --}}
								<div class="genius-btn text-left text-uppercase">
									<a class="checkAuth" data-course="{{$course->id}}" href="javascript:void(0)">
										Enroll This course 
										{{-- <i class="fas fa-caret-right"></i> --}}
									</a>
									<input type="hidden" id="courseId" value="{{$course->id}}">
								</div>
								{{-- <div class="like-course">
									<a href="#"><i class="fas fa-heart"></i></a>
								</div> --}}
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


@section('scripts')


<script>
    $(document).ready(function() {
        $('.Loader-wrap').hide();
    });


    var stripe = Stripe('{{env("STRIPE_PUBLIC_KEY")}}');
    console.log(stripe);
    var elements = stripe.elements()
    var style = {
    base: {
        color: "#32325d",
    }
    };

    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.on('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {

        displayError.textContent = '';
    }
    });


	function processPayments (){
		$('.enrollForm').prop('disabled',true);
		var courseId = "{{isset($course) ? $course->id : '0'}}";
		stripe.createPaymentMethod({
			type: 'card',
			card: card,
			billing_details: {
				name: '{{auth()->user()->name??"user"}}',
			},
		})
		.then(function(result) {
			console.log('res',result.paymentMethod.id);
			if(result.paymentMethod.id != "" || result.paymentMethod.id != null){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

            	$.ajax({
                    type: 'POST',
                    url: '/admin/enroll-course',
                    dataType: "JSON",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "courseId": courseId,
						"payment_method" : result.paymentMethod.id 
                    },

                    success: function (data) {
                        toastr.success('Enrolled Successfully! You`ll be redirected to dashboard!', 'Success Alert', {timeOut: 5000});
                        setTimeout(() => {
                        	window.location.href = '/admin/dashboard';
                        }, 2000);
                    },
                    error: function(e){
						$('.enrollForm').prop('disabled',false);
                        console.log(e);
                        toastr.error("Something went wrong", 'Inconceivable!', {timeOut: 5000});

                    },
                })

			}
		});
	
	}
  

</script>





@endsection