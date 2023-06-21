@php
use App\Functions\Helper;
@endphp
@extends('layout.default')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                            <span class="nav-icon">

                                <i class="flaticon-user-ok"></i>
                            </span>
                            <span class="nav-text font-size-lg"> Send Interview Invitation </span>
                        </a>
                    </li>
                    <!--end::Item-->

                </ul>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body px-0">
            <form class="form" id="kt_form" method="post" action="<?= route('submit.interview-invitation') ?>" autocomplete="off">
                @csrf
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Row-->
                                
                                <!--end::Row-->

                                <div class="form-group">

                                    <label for = "Date">Date</label>
                                    <input min = "{{date('Y-m-d')}}"  class="form-control @error('date') is-invalid @enderror" type="date" name="date" value="<?= date('Y-m-d') ?>" id="example-date-input">
                                </div>

                                <div class="form-group">
                                    <label for = "Time">Time</label>
                                    <input class="form-control @error('time') is-invalid @enderror" type="time" name="time" value="<?= date("h:i:sa") ?>" id="example-time-input">
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea">Meeting Link</label>
                                    <textarea name="link" class="form-control form-control-solid @error('link') is-invalid @enderror" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="user_id" value = "{{$user->id}}" >                           
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Footer-->
                        <div class="card-footer pb-0">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <input type="submit" class="btn btn-light-primary font-weight-bold"
                                                value="Save changes">
                                            <a href="{{ route('users') }}" class="btn btn-clean font-weight-bold">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Tab-->
                </div>
            </form>
        </div>
        <!--begin::Card body-->
    </div>
    <!--end::Card-->

@endsection



{{-- Scripts Section --}}
@section('scripts')
    @include('admin.commons.js')
    <script>
        // $(document).ready(function() {
        //     // $('input[name="phone"]').mask('000 00 000 0000');
        //     $('#kt_form').submit(function(e) {
        //         e.preventDefault();
        //         var $userID = '<?php echo $user->id; ?>';
        //         var $password = $('#password').val();
        //         var $cpassword = $('#cpassword').val();
        //         if ($userID == '') {
        //             if ($password !== $cpassword) {
        //                 toastr.options = {
        //                     "closeButton": true,
        //                     "debug": false,
        //                     "newestOnTop": false,
        //                     "progressBar": true,
        //                     "positionClass": "toast-top-center",
        //                     "preventDuplicates": false,
        //                     "onclick": null,
        //                     "showDuration": "300",
        //                     "hideDuration": "1000",
        //                     "timeOut": "5000",
        //                     "extendedTimeOut": "1000",
        //                     "showEasing": "swing",
        //                     "hideEasing": "linear",
        //                     "showMethod": "fadeIn",
        //                     "hideMethod": "fadeOut"
        //                 };
        //                 toastr.error("Your password confirmation does not match");
        //                 return false;
        //             } else {
        //                 document.getElementById('kt_form').submit();
        //             }
        //         } else {
        //             if ($password != '' && $password !== $cpassword) {
        //                 toastr.options = {
        //                     "closeButton": true,
        //                     "debug": false,
        //                     "newestOnTop": false,
        //                     "progressBar": true,
        //                     "positionClass": "toast-top-center",
        //                     "preventDuplicates": false,
        //                     "onclick": null,
        //                     "showDuration": "300",
        //                     "hideDuration": "1000",
        //                     "timeOut": "5000",
        //                     "extendedTimeOut": "1000",
        //                     "showEasing": "swing",
        //                     "hideEasing": "linear",
        //                     "showMethod": "fadeIn",
        //                     "hideMethod": "fadeOut"
        //                 };
        //                 toastr.error("Your password confirmation does not match");
        //                 return false;
        //             } else {
        //                 document.getElementById('kt_form').submit();
        //             }
        //         }

        //     });
        // });

    </script>
@endsection
