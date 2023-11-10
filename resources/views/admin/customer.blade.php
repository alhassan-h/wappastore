@extends('layouts.dash')

@php($customer = $data['customer'][0])

@section('content')
<div class="container-fluid px-2 px-md-4 mb-5">
    <div class="page-header min-height-150 border-radius-xl mt-4">
        <span class="mask  bg-gradient-primary  opacity-10"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="{{asset('assets/img/200x200.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">{{ucwords($customer->name)}}</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;{{ucwords($customer->name)}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp;{{$customer->phone}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{strtolower($customer->email)}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{ucwords($customer->address)}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">State:</strong> &nbsp; {{ucwords($customer->state)}}</li>
                            </ul>
                        </div>
                        <div class="mt-5">
                            <a href="{{route('customers')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection