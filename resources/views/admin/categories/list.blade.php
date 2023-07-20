@php
use App\Functions\Helper;   
@endphp
@extends('layout.default')
@section('content')
  
<div class="card card-custom mt-10">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Categories
                <div class="text-muted pt-2 font-size-sm">All Categories List</div></h3>
            </div>
            <div class="card-toolbar">
                
                <!--begin::Button-->
                <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>New Record</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="" id="myTable" style="width: 100%;" border="0">
                    <thead>
                        <tr>
                            <th title="Field #1">#</th>
                            <th title="Field #2">Name</th>
                            <th title="Field #3">Slug</th>
                            <th title="Field #3">Type</th>
                            <th title="Field #5">Created At</th>
                            <th title="Field #6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                        @php
                        $image = Helper::ifUserHasImage($category->image);	
                        @endphp
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if(!$image)
                                    <span class="symbol symbol-35 symbol-light-success">
                                        <span class="symbol-label font-size-h5 font-weight-bold">{{$category->name[0]}}</span>
                                    </span>
                                    
                                    @else
                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                        <img src="{{ asset($image) }}" alt="">
                                    </div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                            {{$category->name??''}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$category->slug??''}}</td>
                            <td>{{$category->type??''}}</td>
                        
                            <td>{{ ($category->created_at != ''|| $category->created_at != null)?$category->created_at->format('Y-m-d'): '' }}</td>
                            <td>
                             
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#updateModal" data-id="{{$category->id}}" data-name="{{$category->name}}" data-type="{{$category->type}}" class=" updateSubmissionButtonModal btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                    <i class="flaticon-edit"></i>
                                </a>
                                <a href="javascript:;" data-url="{{route('categories.delete', $category->id)}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon delete">
                                    <i class="flaticon2-rubbish-bin-delete-button"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        
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
                                            <option value ='BLOGS'> BLOGS</option>
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

        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                        <label for="recipient-name" class="form-control-label">Category Name:</label>
                        <input type="text" class="form-control" name="edit_category_name" id="edit_category_name">
                        <input type="hidden" class="form-control" id="category_id">
                    </div>
                    <label >Category Type<span class="text-danger">*</span></label>
                          <div class="form-group row">
                                <div class="col-12">
                                    <select class="form-control selectpicker" tabindex="null" name="edit_category_type" id="edit_category_type" required>
                                            <option value ='BLOGS'> BLOGS</option>
                                            <option value ='COURSES'> COURSES</option>
									</select>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary submit updateSubmissionButton">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        {{-- @include('admin.categories.modal') --}}
        
        @endsection

        
        
        {{-- Scripts Section --}}
        @section('scripts')
        <script>
            $(document).ready(function () {
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

            
            $('.updateSubmissionButtonModal').on('click', function () {
              
                var id = $(this).data('id');
                var name = $(this).data('name');
                var type = $(this).data('type');
                var category_name = $("#edit_category_name").val(name);
                var category_type = $("#edit_category_type").val(type);
                $("#category_id").val(id)
            });

            $('.updateSubmissionButton').on('click', function () {

                var id =  $("#category_id").val();
                var category_name = $("#edit_category_name").val();
                var category_type = $("#edit_category_type").val();
                
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
                        url: 'admin/categories/'+id+'/update',
                        dataType: "JSON",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name": category_name,
                            "type": category_type,
                        },

                        success: function (data) {  

                            Swal.fire({
                                title: 'Success',
                                text: 'Updated Successfully',
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
   
      
        </script>
        @include('admin.commons.js')
        @endsection