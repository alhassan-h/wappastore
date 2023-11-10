@extends('layouts.auth')

@section('content')

    <!-- <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');"> -->
    <div class="pt-8 page-header align-items-start min-vh-100" style="background-image: url({{asset('assets/img/downloads/pexels-files-1620796.jpg')}});">
        <!-- <span class="mask bg-gradient-dark opacity-6"></span> -->
        <div class="container-fluid ps-6 max">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="d-flex flex-column position-relative mb-5">
                        <h1 class="display-3 u-line mb-4 ps-1">Welcome To</h1>
                        <h1 class="fs-5rem" style="font-family: cursive;">Wappah Store</h1>
                    </div>
                    <div class="d-flex flex-column mb-5">
                        <p class="display-7 font-italic mb-0">Dealer in all kinds of kids' wears</p>
                        <p class="display-7 font-italic mb-0">of different sizes, colors</p>
                        <p class="display-7 font-italic mb-5">and categories</p>
                        <p class="lead text-primary mb-0 font-weight-bold">Enjoy 12.5% off every bulk</p>
                    </div>
                    <a href="/store" class="btn btn-outline-primary btn-lg w-30">Shop Now</a>
                </div>
                
            </div>
        </div>
    </div>
    <section class="px-5 py-7">
        <div class="container">
            <div class="row mb-5">
                <div class="d-flex flex-column justify-content-between align-items-center">
                    <h2 class="text-center mb-3">Products Categories</h2>
                    <p class="lead text-sm">We have have varieties of Shirts and Trousers for both Boys ang Girls.</p>
                </div>
            </div>
            <div class="row mb-5 d-flex justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <div class="card card-blog">
                        <div class="card-header">
                            <img src="{{asset('assets/img/downloads/pexels-photo-1619697.jpeg')}}" class="w-100">
                        </div>
                        <div class="card-body py-1">
                            <h4 class="">Boys</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <div class="card card-blog">
                        <div class="card-header">
                            <img src="{{asset('assets/img/downloads/istockphoto-1295801830-612x612.jpg')}}" class="w-100">
                        </div>
                        <div class="card-body py-1">
                            <h4 class="">Girls</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <div class="card card-blog">
                        <div class="card-header">
                            <img src="{{asset('assets/img/downloads/s-l1200.jpg')}}" class="w-100">
                        </div>
                        <div class="card-body py-1">
                            <h4 class="">Shirts</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <div class="card card-blog">
                        <div class="card-header">
                            <img src="{{asset('assets/img/downloads/eb1e62f28893d1fb6586d024783a52e1.jpg_750x400.jpg')}}" class="w-100">
                        </div>
                        <div class="card-body py-1">
                            <h4 class="">Trousers</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gradient-primary border-0">
        <div class="px-5 py-8 bg-gray-400 border-radius-bottom-start-25 border-radius-bottom-end-25">
            <div class="container">
                <div class="row mb-5 d-flex justify-content-center">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 pe-5">
                        <div class="h-100 d-flex flex-column justify-content-between">
                            <h3>A Glimpse Into Our Store</h3>
                            <div class="mb-3">
                                <p class="text-dark mb-0">Behold, a few samples of our wonderful products.</p>
                                <p class="text-dark"> Visit our store to see more wonders...</p>
                            </div>
                            <a href="/store" class="btn btn-outline-primary btn-lg mb-0">Visit Store Now</a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="card card-blog">
                                    <div class="card-body">
                                        <img src="{{asset('assets/img/downloads/the-nix-company-su6w8v_JXwo-unsplash.jpg')}}" class="w-100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="card card-blog">
                                    <div class="card-body">
                                        <img src="{{asset('assets/img/downloads/baby-natur-aNGHqUAITYc-unsplash.jpg')}}" class="w-100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="card card-blog">
                                    <div class="card-body">
                                        <img src="{{asset('assets/img/downloads/istockphoto-484686112-612x612.jpg')}}" class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- footer --}}
    
@endsection
