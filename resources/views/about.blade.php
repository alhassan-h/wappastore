@extends('layouts.auth')

@section('content')

<div class="page-header align-items-start min-vh-100 pt-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-5">
                <div class="card mt-4">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <div class="position-relative">
                                    <h3 class="title-left m-0 p-0">About Us</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0 p-3">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
                                <div class="pt-4 pt-md-0">
                                    <p class="lead text-justify">
                                    Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan
                                    id
                                    imperdiet et, porttitor
                                    at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla
                                    porttitor accumsan tincidunt.
                                    </p>
                                    <p class="lead text-justify">
                                    Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis
                                    porttitor volutpat. Vestibulum
                                    ac diam sit amet quam vehicula elementum sed sit amet dui. porttitor at sem.
                                    </p>
                                    <p class="lead text-justify">
                                    Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
                                    Nulla porttitor accumsan
                                    tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 ">
                                <div class="position-relative bg-gradient-primary h-100 w-100 border-radius-lg d-flex flex-column justify-content-center"
                                    style="background-image: url({{asset('assets/img/downloads/istockphoto-931577634-612x612.jpg')}}); background-size: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-5 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="">
                                    <a href="{{route('shop')}}" class="btn  btn-outline-danger btn-lg">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
