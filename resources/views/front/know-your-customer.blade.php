

@php
use App\Functions\Helper;
@endphp

@extends('front.app')
@section('content')
<style>
    .invalid-feedback {
    font-size: 90% !important;
    /* font-weight: bold !important; */
    color: #b90d0d;
}

input[type=file]::file-selector-button {
border: 2px solid #dcc57c;
border-radius: 1em;
background-color: #dcc57c;
transition: 1s;
}

/* input[type=file]::before {
    content: "Picture of Documentation";
    color: #6c757d;
    font-family: Roboto, sans-serif;
    margin-right: 10px;
    padding-right: -10px;
    font-size: 1.1rem;
} */
</style>

<div id="pagepiling">
    <!-- START CONTACT -->
    <section class="section slide5 contact-bg" id="contact">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 col-md-12">
                    <h3 class="main-font text-uppercase">
                        <span class="text-yellow d-block text-uppercase"> <?= Helper::_lang('contact_us') ?></span>
                    </h3>
                    <p class="py-2 alt-font">
                        <?= Helper::_lang('contact_us_text') ?> 
                        <span class="text-yellow" id = "package_2_deposit_text"> ( <?= Helper::_lang('package_2_deposit_text') ?> ) </span> 
                    </p>
                </div>
            </div>
            <form action="{{route('submit.form')}}" class="form-horizontal contact-form" role="form" method="POST" id="contact-form-data" enctype="multipart/form-data">
                @csrf
                <div class="row pt-3">
                    <!-- Submission Popup -->
                    <div class="col-12">
                        <div class="col-sm-12 px-0" id="result"></div>
                    </div>
                    <!--Left Column-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" placeholder="<?= Helper::_lang('name') ?>" required>
                            {{-- <input class="form-control" type="text" placeholder="<?= //Helper::_lang('name') ?>" required="" id="first_name" name="firstName"> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="{{Helper::_lang('email')}}" required>
                            {{-- <input class="form-control" type="email" placeholder="<?= Helper::_lang('email') ?>" required="" id="email" name="userEmail"> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('address') is-invalid @enderror"  name="address" placeholder="{{Helper::_lang('address')}}" required>
                            {{-- <input class="form-control" type="tel" placeholder="<?= Helper::_lang('address') ?>" id="phone" name="userPhone"> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" id ="invested_amount"  class="form-control @error('invested_amount') is-invalid @enderror"  name="invested_amount" placeholder="{{Helper::_lang('amount')}}" required>
                            {{-- <input class="form-control" type="tel" placeholder="<?= Helper::_lang('amount') ?>" id="phone" name="userPhone"> --}}
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('city') is-invalid @enderror"  name="city" placeholder="{{Helper::_lang('country')}}" required>
                            {{-- <input class="form-control" type="tel" placeholder="<?= Helper::_lang('country') ?>" id="phone" name="userPhone"> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"  name="phone" placeholder="Phone Number" required>
                            {{-- <input class="form-control" type="tel" placeholder="<?= Helper::_lang('number') ?>" id="phone" name="userPhone"> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('passport_number') is-invalid @enderror"  name="passport_number" placeholder="{{Helper::_lang('id_number')}}" required>
                            {{-- <input class="form-control" type="tel" placeholder="<?= Helper::_lang('id_number') ?>" id="phone" name="userPhone"> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-control myFileInput">
                                
                                {{-- <span><?= Helper::_lang('documentation') ?></span> --}}
                                <span></span>
                                
                                {{-- <input type="file" accept="image/*" class="form-control @error('document_image') is-invalid @enderror"  name="document_image"> --}}
                                {{-- <input type="file" accept="image/*" class="form-control @error('document_image') is-invalid @enderror"  name="document_image" required> --}}
                                <input type="file" title="<?= Helper::_lang('documentation') ?>" style="opacity: inherit;border: none;color: #6c757d;font-family:Roboto, sans-serif;font-weight: 300;" id="formFile" accept="image/*" placeholder="<?= Helper::_lang('documentation') ?>" name="document_image" required>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- Button -->
                <div class="col-12 px-md-0">
                    <div class="contact-btn pt-5 text-center text-lg-left">
                        <input type="hidden" value = "{{$package_id}}" name="package_id" id="package_id">
                        <button type="submit" id = "submit-button" class="btn btn-medium btn-rounded btn-yellow text-capitalize"><?= Helper::_lang('submit') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('#package_2_deposit_text').hide();
        var package_id = parseInt($('#package_id').val());
        if(package_id == 2){
            $('#package_2_deposit_text').show();
        }

    });


    // $('#submit-button').on('click',function(){
    //     event.preventDefault()
    //     var package_id = $('#package_id').val();
    //     var invested_amount = parseInt($('#invested_amount').val());
    //     if(isNaN(invested_amount)){
    //         alert('Please enter valid amount')
    //         return
    //     }
        
    //     if(package_id == 1 ){
    //         if(!((invested_amount >= 1000) && (invested_amount <= 10000))){
    //             alert('Amount Should be between 1000 - 10000')
    //             return
    //         }
    //         $('.contact-form').submit();
    //     }else if(package_id == 2){
    //         if(!((invested_amount >= 1000000) && (invested_amount <= 10000000))){
    //             alert('Amount Should be between 1M - 10M')
    //             return
    //         }
    //         $('.contact-form').submit();
    //     }else{
    //         alert('something went wrong');
    //     }

        
    // })


</script>
<script>

       $('.contact-form').validate({ 
           rules: {
               name: {
                   required: true,
                   minlength:3
               },
               email: {
                   required: true,
                   email: true
               },
               passport_number: {
                   required: true,
                
               },
               invested_amount: {
                   required: true,
                   min: 1000
                   
               },
               phone: {
                   required: true,
                
               },
               address: {
                   required: true,
                
               },
               city: {
                   required: true,
            
               },
               state: {
                   required: true,
             
               },
               country: {
                   required: true,
               },
               document_image: {
                   required: true,
                
               },
           },
           messages: {
            passport_number: {
                   required: "Please enter ID or Passport number",
             },     
             invested_amount: {
                   required: "Please enter Amount to be invested.",
             }, 
           },  
           errorElement: 'span',
           errorPlacement: function (error, element) {
               error.addClass('invalid-feedback');
               element.closest('.form-group').append(error);
           },
           highlight: function (element, errorClass, validClass) {
               $(element).addClass('is-invalid');
           },
           unhighlight: function (element, errorClass, validClass) {
               $(element).removeClass('is-invalid');
           }
       });
   
   </script> 

@endsection