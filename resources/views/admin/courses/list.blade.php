@php
use App\Functions\Helper;   
@endphp
@extends('layout.default')
@section('content')
  
<div class="card card-custom mt-10">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Courses
                <div class="text-muted pt-2 font-size-sm">All Courses List</div></h3>
            </div>
            <div class="card-toolbar">
                
                <!--begin::Button-->
                <a href="{{route('courses.add')}}" class="btn btn-primary font-weight-bolder">
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
                <table class="" id="myTable2" style="width: 100%;" border="0">
                    <thead>
                        <tr>
                            <th title="Field #1">#</th>
                            <th title="Field #2">Title</th>
                            <th title="Field #3">Slug</th>
                            {{-- <th title="Field #3">Description</th> --}}
                            <th title="Field #3">Categories</th>
                            <th title="Field #3">Status</th>
                            <th title="Field #3">Featured</th>
                            <th title="Field #5">Created At</th>
                            <th title="Field #6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                        @php
                        $image = Helper::ifUserHasImage($course->media);	
                        @endphp
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if(!$image)
                                    <span class="symbol symbol-35 symbol-light-success">
                                        <span class="symbol-label font-size-h5 font-weight-bold">{{$course->title[0]}}</span>
                                    </span>
                                    
                                    @else
                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                        <img src="{{ asset($image) }}" alt="">
                                    </div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                            {{$course->title??''}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$course->slug??''}}</td>
                            {{-- <td> {!! $course->description !!}</td> --}}
                            <td>
                                    @foreach($course->categories as $category)
                                        {{ $category->category->name??'' }}
                                        @unless($loop->last)
                                            ,
                                        @endunless
                                    @endforeach
                                </td>
                            <td align="left">
                                <span style="width: 157px;">
                                    <span class="label label-lg font-weight-bold  {{($course->status == 0)?'label-light-danger':'label-light-success'}} label-inline">
                                        {{($course->status == 0)?'Inactive':'Active'}}
                                    </span>
                                </span>
                            </td>
                            <td align="left">
                                <span style="width: 157px;">
                                    <span class="label label-lg font-weight-bold  {{($course->is_featured == 0)?'label-light-danger':'label-light-success'}} label-inline">
                                        {{($course->is_featured == 0)?'NO':'YES'}}
                                    </span>
                                </span>
                            </td>
                        
                            <td>{{ ($course->created_at != ''|| $course->created_at != null)?$course->created_at->format('Y-m-d'): '' }}</td>
                            <td>
                                <a href="{{route('courses.edit', $course->id)}}" class=" btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                    <i class="flaticon-edit"></i>
                                </a>
                                <a href="javascript:;" data-url="{{route('courses.delete', $course->id)}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon delete">
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
        
       
        
        @endsection

        
        
        {{-- Scripts Section --}}
        @section('scripts')
       
        @include('admin.commons.js')

        
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript">

$('#myTable2').DataTable( {
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf']
} );
</script>
        @endsection