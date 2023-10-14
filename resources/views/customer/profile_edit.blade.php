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
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Edit Profile Information</h6>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal gray-light mb-4">
                            <div class="col-12">
                                <form role="form" class="text-start w-100" method="POST" action="{{route('update.profile')}}">
                                    @csrf
                                    <div class="input-group input-group-outline my-2">
                                        <label for="name" class="col-md-4 col-form-label pb-0 text-md-begin">{{__('Full Name')}}</label>
                                        <div class="col-12">
                                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $customer->name)}}" placeholder="Full Name" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="input-group input-group-outline my-2">
                                        <label for="email" class="col-md-4 col-form-label pb-0 text-md-begin">{{__('Email Address')}}</label>
                                        <div class="col-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email', $customer->email)}}" placeholder="Email Address"  required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="input-group input-group-outline my-2">
                                        <label for="phone" class="col-md-4 col-form-label pb-0 text-md-begin">{{__('Phone Number')}}</label>
                                        <div class="col-12">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone', $customer->phone)}}" placeholder="Phone Number" required>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="input-group input-group-outline my-2">
                                        <label for="address" class="col-md-4 col-form-label pb-0 text-md-begin">{{__('Address')}}</label>
                                        <div class="col-12">
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address', $customer->address)}}" placeholder="Address"  required>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group input-group-outline">
                                        <label for="password" class="col-md-4 col-form-label pb-0 text-md-begin">{{__('Password')}}</label>
                                        <div class="col-12">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete value="">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn bg-gradient-warning my-4 mb-2">Update</button>
                                        <a href="{{route('profile')}}" class="btn btn-primary my-4 mb-2">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection