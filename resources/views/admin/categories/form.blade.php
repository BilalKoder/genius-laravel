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
                        <span class="nav-text font-size-lg">Categories</span>
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
        <form class="form" id="kt_form" method="post" action="{{($category->id === null)?route('categories.store'):route('categories.update', $category->id)}}" autocomplete="off" enctype="multipart/form-data">
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
                                    <h6 class="text-dark font-weight-bold mb-10">Category Info:</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Name<span class="text-danger">*</span></label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{($category->id === null)?old('name'):$category->name}}" placeholder="Name" required />
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
                                            <a href="{{route('categories')}}" class="btn btn-clean font-weight-bold">Cancel</a>
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
    <script src="{{asset('js/pages/custom/user/edit-user.js')}}"></script>
    @include('admin.commons.js')
    @endsection