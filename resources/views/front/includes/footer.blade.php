<!-- Start Copyright -->
@php
    use App\Functions\Helper;
@endphp
<!-- Start of footer section
		============================================= -->
<footer>
    <section id="footer-area" class="footer-area-section">
        <div class="container">
            <div class="footer-content pb10">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <div class="footer-logo mb35">
                                <img src="<?= asset('genius/img/logo/RHMC-logo.png')?>" alt="">
                            </div>
                            <div class="footer-about-text">
                                <p>We take our mission of increasing global access to quality education seriously. We
                                    connect learners to the best universities and institutions from around the world.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <div class="footer-menu ul-li-block">
                                <h2 class="widget-title">Useful Links</h2>
                                <ul>
                                    <li><a href="{{url('/')}}"><i class="fas fa-caret-right"></i>Home</a></li>
                                    <li><a href="{{url('/learning')}}"><i class="fas fa-caret-right"></i>Courses</a></li>
                                    <li><a href="{{url('/blogs')}}"><i class="fas fa-caret-right"></i>Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-menu ul-li-block">
                            <h2 class="widget-title">Account Info</h2>
                            <ul>
                                <li><a href="{{url('/webinars')}}"><i class="fas fa-caret-right"></i>Webinars</a></li>
                                <li><a href="{{url('/events')}}"><i class="fas fa-caret-right"></i>Events</a></li>
                                <li><a href="{{url('/faqs')}}"><i class="fas fa-caret-right"></i>FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                                <div class="footer-social ul-li">
                                    <h2 class="widget-title">Social Network</h2>
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /footer-widget-content -->
            {{-- <div class="footer-social-subscribe mb65">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-social ul-li">
                            <h2 class="widget-title">Social Network</h2>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="subscribe-form">
                            <h2 class="widget-title">Subscribe Newsletter</h2>

                            <div class="subs-form relative-position">
                                <form action="#" method="post">
                                    <input class="course" name="course" type="email" placeholder="Email Address.">
                                    <div class="nws-button text-center  gradient-bg text-uppercase">
                                        <button type="submit" value="Submit">Subscribe now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="copy-right-menu">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copy-right-text">
                            <p>© {{ date('Y') }} - RHMC All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copy-right-menu-item float-right ul-li">
                            {{-- <ul>
                                <li><a href="#">License</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Term Of Service</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- End of footer section
		============================================= -->
<!-- For Js Library -->
<script src="<?= asset('genius/js/jquery-2.1.4.min.js')?>"></script>
<script src="<?= asset('genius/js/bootstrap.min.js')?>"></script>
<script src="<?= asset('genius/js/popper.min.js')?>"></script>
<script src="<?= asset('genius/js/owl.carousel.min.js')?>"></script>
<script src="<?= asset('genius/js/jarallax.js')?>"></script>
<script src="<?= asset('genius/js/jquery.magnific-popup.min.js')?>"></script>
<script src="<?= asset('genius/js/lightbox.js')?>"></script>
<script src="<?= asset('genius/js/jquery.meanmenu.js')?>"></script>
<script src="<?= asset('genius/js/scrollreveal.min.js')?>"></script>
<script src="<?= asset('genius/js/jquery.counterup.min.js')?>"></script>
<script src="<?= asset('genius/js/waypoints.min.js')?>"></script>
<script src="<?= asset('genius/js/jquery-ui.js')?>"></script>
<script src="<?= asset('genius/js/gmap3.min.js')?>"></script>
<script src="<?= asset('genius/js/switch.js')?>"></script>
<script src="<?= asset('genius/js/script.js')?>"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<script>

    $('.checkAuth').on('click', function(e) {
        // toastr.success('We do have the Kapua suite available.', 'Success Alert', {timeOut: 5000});
		// toastr.error('You Got Error', 'Inconceivable!', {timeOut: 5000})
		// toastr.info('It is for your kind information', 'Information', {timeOut: 5000})
		// toastr.warning('It is for your kind warning', 'Warning', {timeOut: 5000})

        const authCheck = {!! auth()->check() ? 'true' : 'false' !!};
        if (!authCheck) {
            $('#myModal').modal('show');
            return false;
        }else{
            const name= "{{auth()->user()->name??''}}";
            const email= "{{auth()->user()->email??''}}";
            const phone= "{{auth()->user()->phone??''}}";
            const address= "{{auth()->user()->address??''}}";
             $("#formEmailEnroll").val(email);
             $("#formNameEnroll").val(name);
             $("#formPhoneEnroll").val(phone);
             $("#formAdressEnroll").val(address);
            $('#myModalEnroll').modal('show');
            return false;
        }
    });
    
    $('.signupModal').on('click', function(e) {
        $('#myModal').modal('hide');
        setTimeout(() => {
            $('#myModalSignup').modal('show');
        }, 1000);
        });

        $('.alreadySigned').on('click', function(e) {
        $('#myModalSignup').modal('hide');
        setTimeout(() => {
            $('#myModal').modal('show');
        }, 1000);
        });



$('.submitLoginForm').on('click', function (event) {

    event.preventDefault();
                var email = $("#formEmail").val();
                var password = $("#formPassword").val();
                var courseId = "{{isset($course) ? $course->id : '0'}}";

                if(email == null || email == ""){
                    toastr.error('Email can not be empty!', 'Inconceivable!', {timeOut: 5000});
                    return false;
                }
                if(password == null || password == ""){
                    toastr.error('Password can not be empty!', 'Inconceivable!', {timeOut: 5000});
                    return false;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                        type: 'POST',
                        url: '/admin/login',
                        dataType: "JSON",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "email": email,
                            "password": password
                        },
                        success: function (data) {  
                            toastr.success('Logged In Successfully!', 'Success Alert', {timeOut: 5000});
                            setTimeout(() => {
                                $('#myModal').modal('hide');
                            }, 1000);

                            setTimeout(() => {
                                $('#myModalEnroll').modal('show');
                            }, 1000);
                        },
                        error : function(e){
                            console.log(e);
                            toastr.error(e.responseJSON, 'Inconceivable!', {timeOut: 5000});
                        }
                    })

    });
$('.registerForm').on('click', function (event) {

        event.preventDefault();
                var email = $("#formEmailReg").val();
                var password = $("#formPasswordReg").val();
                var courseId = "{{isset($course) ? $course->id : '0'}}";
                var name = $("#formName").val();
                var emirates = $("#formEmrirates").val();
                var phone = $("#formPhone").val();
                var passportFile = $("#formPassport")[0].files[0];
               
                if(email == null || email == ""){
               
                    toastr.error('Email can not be empty!', 'Inconceivable!', {timeOut: 5000});


                    return false;
                }
                if(password == null || password == ""){
                  
                    toastr.error('Password can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    
                    return false;
                }
                if(name == null || name == ""){
                 
                    toastr.error('Name can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    return false;
                }
                if(phone == null || phone == ""){
                  
                    toastr.error('Phone can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    return false;
                }
               
                if(passportFile == null || passportFile == ""){
                  
                    toastr.error('Passport File can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    return false;
                }

                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('email', email);
                formData.append('password', password);
                formData.append('name', name);
                formData.append('phone', phone);
                formData.append('emirates', emirates ? emirates : '');
                formData.append('passport', passportFile); // Append the file to the FormData


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/admin/register',
                    dataType: 'JSON',
                    processData: false, // Important: Prevent jQuery from processing the data
                    contentType: false, // Important: Prevent jQuery from setting content type
                    data: formData, // Use the FormData object containing the file

                        success: function (data) {  

                            toastr.success('Registered Successfully!', 'Success Alert', {timeOut: 5000});

                            setTimeout(() => {
                                $('#myModalSignup').modal('hide');
                            }, 1000);

                            setTimeout(() => {
                                $('#myModalEnroll').modal('show');
                            }, 2000);

                        },
                        error: function(e){
                            console.log(e);
                            toastr.error("Something went wrong", 'Inconceivable!', {timeOut: 5000});

                        },
                    })

    });

        $('.enrollForm').on('click', function (event) {

        event.preventDefault();
        
                var email = $("#formEmailEnroll").val();
                var courseId = "{{isset($course) ? $course->id : '0'}}";
                var name = $("#formNameEnroll").val();
                var phone = $("#formPhoneEnroll").val();
                var address = $("#formAdressEnroll").val();
               
                if(email == null || email == ""){
               
                    toastr.error('Email can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    return false;
                }
                if(address == null || address == ""){
                  
                    toastr.error('Address can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    
                    return false;
                }
                if(name == null || name == ""){
                 
                    toastr.error('Name can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    return false;
                }
                if(phone == null || phone == ""){
                  
                    toastr.error('Phone can not be empty!', 'Inconceivable!', {timeOut: 5000});

                    return false;
                }

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
                            "email": email,
                            "address": address,
                            "name": name,
                            "phone": phone,
                            "courseId": courseId
                        },

                        success: function (data) {  

                            toastr.success('Enrolled Successfully! You`ll be redirected to dashboard!', 'Success Alert', {timeOut: 5000});

                            // setTimeout(() => {
                            //     $('#myModalSignup').modal('hide');
                            // }, 1000);

                            setTimeout(() => {
                            //     $('#myModalEnroll').modal('show');
                            window.location.href = '/admin/dashboard';

                            }, 2000);

                            

                        },
                        error: function(e){
                            console.log(e);
                            toastr.error("Something went wrong", 'Inconceivable!', {timeOut: 5000});

                        },
                    })

    });

</script>
<!-- End Copyright -->

<!-- JavaScript -->