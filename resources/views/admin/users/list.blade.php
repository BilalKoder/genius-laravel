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
            <h3 class="card-label">Know Your Customer
                <div class="text-muted pt-2 font-size-sm">All Submitted Forms List</div>
            </h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table-responsive" id="myTable2" style="width: 100%;">
            <thead>
                <tr>
                    <th title="Field #1">#</th>
                    <th title="Field #2">User</th>
                    <th title="Field #2">Investment Type</th>
                    <th title="Field #3">Address</th>
                    <th title="Field #4">ID/Passport</th>
                    <th title="Field #4">Amount Invested</th>
                    <th title="Field #3">Document</th>
                    <th title="Field #5">Document Status</th>
                    <th title="Field #5">Payment Status</th>
                    <th title="Field #5">Interview Status</th>
                    <th title="Field #5">Actions</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                @php
                $image = Helper::ifUserHasImage($user->image);
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ml-4">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                    {{ $user->name }}
                                </div>
                                <a href="#" class="text-muted font-weight-bold text-hover-primary">({{ $user->reference_id }})</a>
                                <a href="#" class="text-muted font-weight-bold text-hover-primary">{{ $user->email }}</a>
                                <a href="#" class="text-muted font-weight-bold text-hover-primary">{{ $user->phone }}</a>
                                <a href="#" class="text-muted font-weight-bold text-hover-primary">{{ $user->address??''.' '.$user->city??''.''.$user->state??''.''.$user->country??'' }}</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($user->package_id == 1)
                            {{"€ 1,000 - € 10,000"}}
                        @else
                            {{"€ 1M - € 10M"}}
                        @endif

                    </td>
                    
                    <td>{{ $user->address??''.' '.$user->city??''.''.$user->state??''.''.$user->country??''}}</td>
                    <td>{{ $user->passport_number??''}}</td>
                    <td>{{ $user->invested_amount??''}}</td>
                    <td><a target="_blank" href="{{asset($user->document_image??'')}}"
                            class="btn btn-sm btn-default btn-hover-danger btn-icon">
                            <i class="flaticon-download-1"></i>
                        </a>
                    </td>
                   <td>
                        @if($user->package_id == 1 )
                            <span class="label label-lg  {{ $user->is_signed_doc == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                Investment Document Signed :  {{ $user->is_signed_doc == 0 ? 'No' : 'Yes' }} 
                            </span>
                        @elseif($user->package_id == 2)
                            <span class="label label-lg  {{ $user->is_signed_deposit_doc == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                Deposit Document Signed :  {{ $user->is_signed_deposit_doc == 0 ? 'No' : 'Yes' }} 
                            </span>
                            <span class="label label-lg  {{ $user->is_signed_doc == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                Investment Document Signed :  {{ $user->is_signed_doc == 0 ? 'No' : 'Yes' }} 
                            </span>
                        @endif

                    </td>

                    <td>
                        @if($user->package_id == 1 )
                            <span class="label label-lg  {{ $user->is_payment_done == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                Investment Payment Captured :  {{ $user->is_payment_done == 0 ? 'No' : 'Yes' }} 
                            </span>
                        @elseif($user->package_id == 2)
                            <span class="label label-lg  {{ $user->is_deposit_payment_done == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                Deposit Payment Captured :  {{ $user->is_deposit_payment_done == 0 ? 'No' : 'Yes' }} 
                            </span>
                            <span class="label label-lg  {{ $user->is_payment_done == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                Investment Payment Captured :  {{ $user->is_payment_done == 0 ? 'No' : 'Yes' }} 
                            </span>
                        @endif

                    </td>

                    <td>
                        @if($user->package_id == 2 && $user->interview_link_send == 0)
                            <span class="label label-lg  {{ $user->is_interview_done == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                {{ $user->is_interview_done == 0 ? 'Not Taken' : 'Taken' }} 
                            </span>
                        @elseif($user->package_id == 2 && $user->interview_link_send == 1 && $user->is_interview_done == 0)
                            <span class="label label-lg  label-light-danger label-inline">
                                Invitation Sent
                            </span>
                        @elseif($user->package_id == 2 && $user->interview_link_send == 1 && $user->is_interview_done == 1)
                            <span class="label label-lg  label-light-success label-inline">
                                Taken
                            </span>
                        @endif

                    </td>
            
                    <td>
                        @if($user->package_id == 2 && $user->interview_link_send == 0  && $user->is_deposit_payment_done == 1)
                            <a title="Send Interview Invitation" href="{{ route('send-interview-invitation', $user->id) }}"
                                class="btn btn-sm btn-primary btn-hover-info btn-icon">
                                <i class="flaticon2-bell"></i>
                            </a>
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


