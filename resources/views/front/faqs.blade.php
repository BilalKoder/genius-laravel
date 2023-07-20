

@php
use App\Functions\Helper;
use Illuminate\Support\Str;
$index = 0;
@endphp

@extends('front.app')
@section('content')


<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold">Frequently <span>Ask &amp; Questions</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">FAQ</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

        <section id="faq-page" class="faq-page-section">
			<div class="container">
				<div class="faq-element">
					<div class="row">
						<div class="col-md-9">
							<div class="faq-page-tab">
								<div class="section-title-2 mb65 headline text-left">
									<h2>Find <span>Your Questions &amp; Answers.</span></h2>
								</div>

								<div class="faq-tab faq-secound-home-version mb35">
									<div class="faq-tab-ques  ul-li">
										<div class="tab-button text-left mb45">
											<ul class="product-tab">
												<li class="active" rel="tab1">GENERAL </li>
												<!-- <li rel="tab2" class=""> COURSES </li>
												<li rel="tab3" class=""> TEACHERS </li>
												<li rel="tab4" class="">  EVENTS  </li>
												<li rel="tab5" class="tab_last">  OTHERS  </li> -->
											</ul>
										</div>
										<!-- /tab-head -->

										<!-- tab content -->
										<div class="tab-container">

											<!-- 1st tab -->
											<div id="tab1" class="tab-content-1 pt35" style="display: block;">
												<div id="accordion" class="panel-group">
													<div class="row">
														<div class="col-md-6">
                                                            @if(!empty($faqs))
                                                            @foreach($faqs as $key => $faq)
															<div class="panel">
																<div class="panel-title" id="heading{{ $key }}">
																	<h3 class="mb-0">
																		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
																			How to Register or Make An Account in Genius?
																		</button>
																	</h3>
																</div>
																<div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordion" style="">
																	<div class="panel-body">
																		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
																	</div>
																</div>
															</div>
                                                            @endforeach
                                                            @endif
														</div>
													</div>
													<!-- end of #accordion -->
												</div>
											</div>
											<!-- #tab1 -->
											<!-- #tab3 -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection