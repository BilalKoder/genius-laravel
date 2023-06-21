@php
use App\Functions\Helper;
@endphp
@extends('layout.default')
@section('content')

<style>
    .label.label-lg{
        height:auto !important;
    }
    .dataTables_wrapper .dataTable th, .dataTables_wrapper .dataTable td{
        border: 1px solid #0000001f;
        font-size: 11px !important;
    }
    .label-lg{
        margin: 2px;
    }
    .btn.btn-icon.btn-sm, .btn-group-sm > .btn.btn-icon{
        margin: 2px;   
    }

</style>
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Interviews
                <div class="text-muted pt-2 font-size-sm">All Scheduled Interviews</div>
            </h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table-responsive" id="myTable2" style="width: 100%;">
            <thead>
                <tr>
                    <th title="Field #1">#</th>
                    <th title="Field #2">Username</th>
                    <th title="Field #2">User Reference Id</th>
                    <th title="Field #3">Date</th>
                    <th title="Field #4">Time</th>
                    <th title="Field #4">Link</th>
                    <th title="Field #3">Status</th>
                    <th title="Field #5">Actions</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($interviews as $key => $interview)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    
                    <td>
                        {{$interview->user->name}}
                    </td>
                    <td>
                        {{$interview->user->reference_id}}
                    </td>

                    <td>
                        {{$interview->date}}
                    </td>
                    <td>
                        {{$interview->time}}
                    </td>

                    <td>
                        {{$interview->link}}
                    </td>
                    <td>
                        @if($interview->status == 'pending')
                            <span class="label label-lg label-light-warning label-inline">
                                Pending
                            </span>
                        @elseif($interview->status == 'pass')
                            <span class="label label-lg label-light-success label-inline">
                                Pass
                            </span>
                        @else
                            <span class="label label-lg label-light-danger label-inline">
                                Fail
                            </span>
                        @endif
                    </td>
                    
                   <td>
                        @if($interview->status == 'pending')
                            <a title="Pass" href="{{ route('interview.status',[$interview->id,'pass']) }}"
                                class="btn btn-sm btn-success btn-hover-info btn-icon">
                                <i class="flaticon2-accept"></i>
                            </a>

                            <a title="Fail" href="{{ route('interview.status', [$interview->id,'fail']) }}"
                                class="btn btn-sm btn-danger btn-hover-info btn-icon">
                                <i class="flaticon2-delete"></i>
                            </a>
                        @else
                            -
                        @endif

                    </td>
                    
        </tr>
        @endforeach
        
    </tbody>
</table>
<!--end: Datatable-->
</div>
</div>

@include('admin.users.modal')

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
{{-- @include('admin.commons.js') --}}

@endsection


