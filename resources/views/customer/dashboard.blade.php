@extends('layouts.dash')

@php($analytics = $data['analytics'])

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6 mb-xl-0 mb-4">
            <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">My Products</p>
                <h4 class="mb-0">{{$analytics['products']}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span></p>
            </div>
            </div>
        </div>
    
        <div class="col-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">My Orders</p>
                    <h4 class="mb-0">{{$analytics['orders']}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection