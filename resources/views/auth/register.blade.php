@extends('layouts.auth')

@section('content')
<!-- <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');"> -->
<div class="page-header align-items-start min-vh-100" style="background-image: url({{asset('assets/img/downloads/pexels-rdne-stock-project-8082807.jpg')}});">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
                    </div>
                </div>
                <div class="card-body">

                    <form role="form" class="text-start" method="POST" action="{{ route('post.register') }}">
                        @csrf
                        <div class="input-group input-group-outline my-2">
                            <!-- <label for="name" class="col-md-4 col-form-label pb-0 text-md-begin">{{ __('Full Name') }}</label> -->
                            <div class="col-12">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="input-group input-group-outline my-2">
                            <!-- <label for="email" class="col-md-4 col-form-label pb-0 text-md-begin">{{ __('Email Address') }}</label> -->
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address"  required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="input-group input-group-outline my-2">
                            <!-- <label for="phone" class="col-md-4 col-form-label pb-0 text-md-begin">{{ __('Phone Number') }}</label> -->
                            <div class="col-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="input-group input-group-outline my-2">
                            <!-- <label for="address" class="col-md-4 col-form-label pb-0 text-md-begin">{{ __('Address') }}</label> -->
                            <div class="col-12">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address"  required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="input-group input-group-outline my-2">
                            <!-- <label for="state" class="col-md-4 col-form-label pb-0 text-md-begin">{{ __('State') }}</label> -->
                            <div class="col-12">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" placeholder="State"  required autocomplete="state" autofocus>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group input-group-outline">
                            <!-- <label for="password" class="col-md-4 col-form-label pb-0 text-md-begin">{{ __('Password') }}</label> -->
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"  required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                        </div>
                        <p class="mt-4 text-sm text-center">
                            Already have an account?
                            <a href="{{route('login')}}" class="text-primary text-gradient font-weight-bold">Login</a>
                        </p>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
