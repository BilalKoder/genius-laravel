@php
use App\Functions\Helper;   
@endphp
@extends('layout.default')
@section('content')
  
<div class="card card-custom mt-10">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Enrolled Courses
                <div class="text-muted pt-2 font-size-sm">All Enrolled Courses List</div></h3>
            </div>
            <div class="d-flex">
                <div class="input-group input-group-lg input-group-solid mr-5">
                    <select name="status" id="status" class="form-control form-control-lg form-control-solid userFilter" required>
                        <option value="0">Select User Filter</option>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name??''}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="input-group input-group-lg input-group-solid">
                    <select name="status" id="status" class="form-control form-control-lg form-control-solid courseFilter" required>
                        <option value="0">Select Course Filter</option>
                        @if(count($courses) > 0)
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->title??''}}</option>
                        @endforeach
                    @endif
                    </select>
                </div>
                <!--end::Button-->
            </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="" id="myTable2" style="width: 100%;" border="0">
                    <thead>
                        <tr>
                            <th title="Field #1">#</th>
                            <th title="Field #2">Name</th>
                            <th title="Field #3">Email</th>
                            <th title="Field #3">Phone</th>
                            <th title="Field #3">Address</th>
                            <th title="Field #3">Course</th>
                            <th title="Field #3">User</th>
                            {{-- <th title="Field #3">Status</th> --}}
                            <th title="Field #5">Created At</th>
                            {{-- <th title="Field #6">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrolled as $key => $enroll)
                       
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ml-4">
                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                            {{$enroll->name??''}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$enroll->email??''}}</td>
                            <td>  {{$enroll->phone??''}}</td>
                            <td>  {{$enroll->address??''}}</td>
                            <td>
                                {{$enroll->course->title??''}}
                                </td>
                            <td>
                                {{$enroll->user->name??''}}
                                </td>
                            {{-- <td align="left">
                                <span style="width: 157px;">
                                    <span class="label label-lg font-weight-bold  {{($enroll->status == 0)?'label-light-danger':'label-light-success'}} label-inline">
                                        {{($enroll->status == 0)?'Inactive':'Active'}}
                                    </span>
                                </span>
                            </td> --}}
                        
                            <td>{{ ($enroll->created_at != ''|| $enroll->created_at != null)?$enroll->created_at->format('Y-m-d'): '' }}</td>
                            {{-- <td>
                                <a href="javascript:void(0)" class=" btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                    <i class="flaticon-edit"></i>
                                </a>
                                <a href="javascript:;" data-url="#" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon delete">
                                    <i class="flaticon2-rubbish-bin-delete-button"></i>
                                </a>
                            </td> --}}
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
        <script>
             $('.userFilter').on('change', function () {
                    var selectedUserValue = $(this).val();
                    if (selectedUserValue == null || selectedUserValue == 0) {
                        return false;
                    }
                    var url = '?user=' + selectedUserValue;
                    window.location.href = url;
                });
             
                $('.courseFilter').on('change', function () {
                    var selectedUserValue = $(this).val();
                    if (selectedUserValue == null || selectedUserValue == 0) {
                        return false;
                    }
                    var url = '?courses=' + selectedUserValue;
                    window.location.href = url;
                });
              
   
      
        </script>
        @include('admin.commons.js')
        @endsection