@php
use App\Functions\Helper;   
@endphp
@extends('layout.default')
@section('content')
  
<div class="card card-custom mt-10">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">FAQs
                <div class="text-muted pt-2 font-size-sm">All FAQs List</div></h3>
            </div>
            <div class="card-toolbar">
                
                <!--begin::Button-->
                <a href="{{route('faqs.add')}}" class="btn btn-primary font-weight-bolder">
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
                            <th title="Field #2">Question</th>
                            <th title="Field #3">Answer</th>
                            <th title="Field #5">Created At</th>
                            <th title="Field #6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $key => $faq)
                      
                        <tr>
                            <td>{{$key+1}}</td>
                            
                            <td>{{$faq->question??''}}</td>
                            <td> {{ Str::limit($faq->answer, 50) }}</td>
                          
                        
                            <td>{{ ($faq->created_at != ''|| $faq->created_at != null)?$faq->created_at->format('Y-m-d'): '' }}</td>
                            <td>
                                <a href="{{route('faqs.edit', $faq->id)}}" class=" btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                    <i class="flaticon-edit"></i>
                                </a>
                                <a href="javascript:;" data-url="{{route('faqs.delete', $faq->id)}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon delete">
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
        @endsection