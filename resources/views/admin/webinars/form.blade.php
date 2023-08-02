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
                        <span class="nav-text font-size-lg">Webinar</span>
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
        <form class="form" id="kt_form" method="post" action="{{($webinar->id === null)?route('webinars.store'):route('webinars.update', $webinar->id)}}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="tab-content">
                <!--begin::Tab-->
                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7 my-2">
                            <!--begin::Row-->
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">Webinar Info:</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                             <!--begin::Group-->
                             @php
                             if($webinar->id === null){
                                $image = asset('media/users/blank.png');
                                }
                                else{
                                $image = (Helper::ifUserHasImage($webinar->media))?asset(Helper::ifUserHasImage($webinar->media)):asset('media/users/blank.png');
                                }
                             @endphp
                             <div class="form-group row" id="banner-image">
                                 <label class="col-form-label col-3 text-lg-right text-left">webinar Image <span
                                         class="text-danger">*</span></label>
                                 <div class="col-9">
                                     <div class="image-input image-input-empty image-input-outline blah" id="blah"
                                         style="background-image: url('{{ $image }}')">
                                         <div class="image-input-wrapper"></div>
                                         <label
                                             class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                             data-action="change" data-toggle="tooltip" title=""
                                             data-original-title="Change avatar">
                                             <i class="fa fa-pen icon-sm text-muted"></i>
                                             <input type="file"  name="profile_avatar" id="profile_avatar"
                                                 class="upload-img @error('profile_avatar') is-invalid @enderror" data-width="200" data-height="200" />
                                             <input type="hidden" name="profile_avatar_remove" />
                                         </label>
                                         <span
                                             class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                             data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                             <i class="ki ki-bold-close icon-xs text-muted"></i>
                                         </span>
                                         <span
                                             class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                             data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                             <i class="ki ki-bold-close icon-xs text-muted"></i>
                                         </span>
                                     </div>
                                     <p class="text-muted">Image should be greater or equal to 200 X 200 resolution</p>
                                 </div>
                             </div>
                             <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Title<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('title') is-invalid @enderror" type="text" name="title" value="{{($webinar->id === null)?old('title'):$webinar->title}}" placeholder="Title" required />
                                </div>
                            </div>
                          
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Description<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{($webinar->id === null)?old('description'):$webinar->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Video URL</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('video_url') is-invalid @enderror" type="text" name="video_url" value="{{($webinar->id === null)?old('video_url'):$webinar->video_url}}" placeholder="htts://youtube.com/aCVacBFUMz" />
                                </div>
                            </div>

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
                                            <input type="submit" class="btn btn-light-primary font-weight-bold" value="Save changes">
                                            <a href="{{route('webinars')}}" class="btn btn-clean font-weight-bold">Cancel</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    
                        <label for="recipient-name" class="form-control-label">Category Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="category_name" id="category_name">
                    
                    </div>
                    <label >Category Type<span class="text-danger">*</span></label>
                          <div class="form-group row">
                                <div class="col-12">
                                    <select class="form-control selectpicker" tabindex="null" name="category_type" id="category_type" required>
                                            <option value ='webinarS'> webinarS</option>
                                            <option value ='COURSES'> COURSES</option>
									</select>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary submit editSubmissionButton">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    @endsection
    
    @section('scripts')
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> -->

    {{-- <script src="{{asset('genius/js/multiselect-dropdown.js')}}"></script> --}}
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script type="text/javascript">
   
            $(document).ready(function () {
                $('.select2').select2({
                        placeholder: "Select a state",
                    });

                // $('#kt_select2_3, #kt_select2_3_validate').select2({
                //         placeholder: "Select a state",
                //     });


                $('#kt_form').validate({ 
                    rules: {
                        name: {
                            required: true,
                        },
                        // profile_avatar: {
                        //     required: true,
                        // },
                        description: {
                            required: true,
                        },
                        // categories: {
                        //     required: true,
                        // },
                        // categories:{
                        //     required: {
                        //         depends: function(element){
                        //             if('none' == $('#field1').val()){
                        //                 //Set predefined value to blank.
                        //                 $('#field1').val('');
                        //             }
                        //             return true;
                        //         }
                        //     }
                        // },
                        meta_title:{
                             required: true,
                        },
                        meta_description:{
                             required: true,
                        },
                        // profile_avatar:{
                        //     required: true,
                        //     accept: "jpg|jpeg|png|JPG|JPEG|PNG",
                        // },
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
                
             $('.editSubmissionButton').on('click', function () {

                var category_name = $("#category_name").val();
                var category_type = $("#category_type").val();

                if(category_name == null || category_name == ""){
                    Swal.fire({
                        title: 'Error',
                        text: 'Category Name can not be empty!',
                        type: 'warning'
                    });

                    return false;
                }
                if(category_type == null || category_type == ""){
                    Swal.fire({
                        title: 'Error',
                        text: 'Category Type can not be empty!',
                        type: 'warning'
                    });
                    return false;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                        type: 'POST',
                        url: '/admin/categories/store/',
                        dataType: "JSON",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name": category_name,
                            "type": category_type,
                        },

                        success: function (data) {  

                            Swal.fire({
                                title: 'Success',
                                text: 'Submitted Successfully',
                                type: 'success'
                            });

                        $('#exampleModal').modal('hide');

                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                        },
                    })

            });
            });


       
        $('#summernote').summernote({
            height: 400
        });
    </script>
    @include('admin.commons.js')
    @endsection