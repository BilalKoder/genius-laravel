@extends('layout.default')

@section('content')
<style>
   

</style>

<div class="row">
    @if(auth()->user()->role_id == 1)
    <div class="col-xl-3">
        <!--begin::Stats Widget 26-->
        <div class="card card-custom bg-light-info card-stretch gutter-b">
            <!--begin::ody-->
            <div class="card-body">
                <i class="menu-icon fas fa-running icon-2x text-danger"></i>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$user}}</span>
                <span class="font-weight-bold text-muted font-size-sm">Total Customers</span>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 26-->
    </div>
    @endif
  {{--  <div class="col-xl-3">
        <!--begin::Stats Widget 27-->
        <div class="card card-custom bg-light-info card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <i class="menu-icon flaticon-map icon-2x text-info"></i>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$interview}}</span>
                <span class="font-weight-bold text-muted font-size-sm">Total Interviews</span>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 27-->
    </div>
    
    <div class="col-xl-3">
        <!--begin::Stats Widget 25-->
        <div class="card card-custom bg-light-info card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <i class="menu-icon flaticon-presentation-1 icon-2x text-success"></i>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$total_transaction}}</span>
                <span class="font-weight-bold text-muted font-size-sm">Total Transactions</span>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 25-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 28-->
        <div class="card card-custom bg-light-info card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <i class="menu-icon flaticon-presentation-1 icon-2x text-warning"></i>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$total_amount_invested}}</span>
                <span class="font-weight-bold text-muted font-size-sm">Total Amount Invested</span>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stat: Widget 28-->
    </div> 
</div> --}}
{{-- 
<div class="row mb-5">
    <div class="col-12">
        <div class="alert alert-custom alert-light-danger fade show py-4" role="alert">
            <div class="alert-icon">
                <i class="flaticon-warning"></i>
            </div>
            <div class="alert-text font-weight-bold">News.
                <br>Dashboard Coming Soon
                <br>
                
                @if(Auth::user()->role->slug == 'admin')

                @elseif(Auth::user()->role->slug == 'coach')
                <h1>This Dashboard is for Coach</h1>
                @elseif(Auth::user()->role->slug == 'player')
                <h1>This Dashboard is for Player</h1>
                @endif
            </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="la la-close"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div> --}}

@endsection
