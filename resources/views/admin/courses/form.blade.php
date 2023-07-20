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
                        <span class="nav-text font-size-lg">Courses</span>
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
        <form class="form" id="kt_form" method="post" action="{{($course->id === null)?route('courses.store'):route('courses.update', $course->id)}}" autocomplete="off" enctype="multipart/form-data">
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
                                    <h6 class="text-dark font-weight-bold mb-10">Course Info:</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                             <!--begin::Group-->
                             @php
                             if($course->id === null){
                                $image = asset('media/users/blank.png');
                                }
                                else{
                                $image = (Helper::ifUserHasImage($course->media))?asset(Helper::ifUserHasImage($course->media)):asset('media/users/blank.png');
                                }
                             @endphp
                             <div class="form-group row" id="banner-image">
                                 <label class="col-form-label col-3 text-lg-right text-left">Featured Image <span
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
                                             <input type="file" name="profile_avatar" id="profile_avatar"
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
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="title" value="{{($course->id === null)?old('title'):$course->title}}" placeholder="Course Title" required />
                                </div>
                            </div>
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Status<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid @error('status') is-invalid @enderror">
                                        <select name="status" id="status" class="form-control form-control-lg form-control-solid" required>
                                            <option value="1" {{($course->status == '1')?'selected':''}}>Active</option>
                                            <option value="0" {{($course->status == '0')?'selected':''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Featured<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <select name="is_featured" id="is_featured" class="form-control form-control-lg form-control-solid @error('is_featured') is-invalid @enderror" required>
                                            <option value="1" {{($course->is_featured == '1')?'selected':''}}>YES</option>
                                            <option value="0" {{($course->is_featured == '0')?'selected':''}}>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Description<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{($course->id === null)?old('description'):$course->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left"> Price </Pre> <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="number"  min = "1" step="0.01" name="price" value="{{($course->id === null)?old('price'):$course->price}}" class="form-control form-control-lg form-control-solid semester_lesson_inputs @error('price') is-invalid @enderror" required placeholder="69.01">
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left"> Duration <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="number"  min = "1" step="1" name="duration" value="{{($course->id === null)?old('duration'):$course->duration}}" class="form-control form-control-lg form-control-solid semester_lesson_inputs @error('duration') is-invalid @enderror" required placeholder="2">
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left"> Lectures <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="number"  min = "1" step="1" name="lectures" value="{{($course->id === null)?old('lectures'):$course->lectures}}" class="form-control form-control-lg form-control-solid semester_lesson_inputs @error('lectures') is-invalid @enderror" required placeholder="1">
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left"> Video <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="number"  min = "1" step="1" name="video" value="{{($course->id === null)?old('video'):$course->video}}" class="form-control form-control-lg form-control-solid semester_lesson_inputs @error('video') is-invalid @enderror" required placeholder="1">
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left"> Includes <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid"style="padding-bottom: 15px;">
                                            <input class="form-control form-control-lg form-control-solid tags @error('includes') is-invalid @enderror" type="text" id="tags1" name="includes[]"  value="{{($course->id === null)?old('includes'):$course->includes}}"  placeholder="Type and press tab..." required />
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left"> Languages <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid" style="padding-bottom: 15px;">
                                            <input class="form-control form-control-lg form-control-solid @error('languages') is-invalid @enderror" type="text" name="languages[]" id="tags2" value="{{($course->id === null)?old('languages'):$course->languages}}" placeholder="Type and press tab..." required />
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Meta Title<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('meta_title') is-invalid @enderror" type="text" name="meta_title" value="{{($course->id === null)?old('meta_title'):$course->meta_title}}" placeholder="Meta Title" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Meta Description<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" cols="30" rows="10">{{($course->id === null)?old('meta_description'):$course->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Select Categories<span class="text-danger">*</span></label>
                                <div class="col-9">

                                    @if($course->id === null)
                                    <div class=" col-lg-12 col-md-9 col-sm-12" style="border: 1px solid #E5EAEE;border-radius: 0.42rem;padding-top: 5px;">
                                             <select class="form-control kt-select2 select2"placeholder="ascasc" id="kt_select2_1" name="categories[]" multiple>
                                             @if(!empty($categories))
                                             @foreach($categories as $category)
                                                 <option value="{{ $category->id }}">{{ $category->name ?? '' }}</option>
                                             @endforeach
                                         @endif
                                     </select>
                                         </div>
                                     @else
                                    <div class=" col-lg-12 col-md-9 col-sm-12" style="border: 1px solid #E5EAEE;border-radius: 0.42rem;padding-top: 5px;">
                                             <select class="form-control kt-select2 select2"placeholder="ascasc" id="kt_select2_1" name="categories[]" multiple>
                                                 @if(!empty($categories))
                                          @foreach($categories as $category)
                                         
                                             @php
                                                 $array = ["1"];
                                                 $checkCondition = Helper::ifAlreadySelected($category->id, $course->categories->pluck('category_id')->toArray())
                                             @endphp
                                                  <option {{$checkCondition ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name ?? '' }}</option>
                                              @endforeach
                                          @endif
                                         </select>
                                         </div>
                                     @endif
                                   
                                </div>
                            </div>
                            <!--end::Group-->
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
                                            <a href="{{route('courses')}}" class="btn btn-clean font-weight-bold">Cancel</a>
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
    
    @section('scripts')
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> -->

    {{-- <script src="{{asset('genius/js/multiselect-dropdown.js')}}"></script> --}}
    <script src="{{asset('genius/js/tags.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script type="text/javascript">

$('.select2').select2({
                        placeholder: "Select a state",
                    });

                $('#kt_form').validate({ 
                    rules: {
                        title: {
                            required: true,
                        },
                        description: {
                            required: true,
                        },
                        is_featured: {
                            required: true,
                        },
                        price: {
                            required: true,
                        },
                        duration: {
                            required: true,
                        },
                        lectures: {
                            required: true,
                        },
                        video: {
                            required: true,
                        },
                        includes: {
                            required: true,
                        },
                        languages: {
                            required: true,
                        },
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
       
        $('#summernote').summernote({
            height: 400
        });
    </script>
    @include('admin.commons.js')
    @endsection