

@php
use App\Functions\Helper;
@endphp

@extends('front.app')
@section('content')
<div id="pagepiling">
    <!-- START CONTACT -->
    <section class="section slide5 contact-bg" id="contact">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 col-md-12 text-center" >
                    <h3 class="main-font text-uppercase">
                        <span class="text-yellow d-block text-uppercase text-center">  Payment Deposited Successfully</span>
                    </h3>
                    <p class="py-2 alt-font">Thank you for your patience and compliance with our process. We will reach out to you shortly in order to schedule an interview. <a href="<?= route('home')?>"> Redirect To Home </a>
                         
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection