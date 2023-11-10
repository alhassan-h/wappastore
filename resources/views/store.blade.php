@extends('layouts.auth')

@php

$isLoggedIn = (Auth::check())?true:false;
$isCustomer = ($isLoggedIn && !Auth::user()->isAdmin())?true:false;

@endphp

@section('content')
<div class="page-header align-items-start min-vh-100 pt-5">
    <div class="container py-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-5">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Filter Products</h6>
                        </div>
                        @if(!$isLoggedIn || $isCustomer)
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-primary mb-0" href="{{route('cart')}}">Goto Cart</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form class="" method="post" action="{{route('filter.store')}}">
                            @csrf
                            <div class="input-group input-group-outline mx-1">
                                <label class="font-weight-bold" for="">Category</label>
                                <div class="form-switch mx-2 d-flex justify-content-between">
                                    <div class="me-3">
                                        <label for="category-shirts" class="me-2">Shirts</label>
                                        <input class="form-check-input ms-auto" type="radio" @checked(old('category') == 'shirts' || in_array('shirts', $data['filters'])) value="shirts" id="category-shirts" name="category">
                                    </div>
                                    <div class="">
                                        <label for="category-trousers" class="me-2">Trousers</label>
                                        <input class="form-check-input ms-auto" type="radio" @checked(old('category') == 'trousers' || in_array('trousers', $data['filters'])) value="trousers" id="category-trousers" name="category">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline mx-1">
                                <label class="font-weight-bold" for="">Gender</label>
                                <div class="form-switch mx-2 d-flex justify-content-between">
                                    <div class="me-3">
                                        <label for="gender-boys" class="me-2">Boys</label>
                                        <input class="form-check-input ms-auto" type="radio" @checked(old('gender') == 'boys'  || in_array('boys', $data['filters'])) value="boys" id="gender-boys" name="gender">
                                    </div>
                                    <div class="">
                                        <label for="gender-girls" class="me-2">Girls</label>
                                        <input class="form-check-input ms-auto" type="radio" @checked(old('gender') == 'girls'  || in_array('girls', $data['filters'])) value="girls" id="gender-girls" name="gender">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline mt-3">
                                <button type="submit" class="btn btn-primary m-0">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
         <div class="col-12">
            <div class="mb-5 ps-3 d-flex align-items-center">
                <h6 class="mb-0 me-2">Filter:</h6>
                <div>
                    @foreach($data['filters'] as $filter)
                        @if ($loop->last)
                        <span class="text-sm m-0 p-0">{{ucfirst($filter)}}.</span>
                        @else
                        <span class="text-sm me-1 m-0 p-0">{{ucfirst($filter)}},</span>
                        @endif
                    @endforeach
                    @if(!in_array('all', $data['filters'])) <a class="btn btn-success btn-sm p-1 ms-4" href="{{route('filter.store')}}">All Products</a> @endif
                </div>
            </div>
            <div class="row">
            @forelse($data['products'] as $product)
                <div class="col-xl-3 col-md-6 mb-xl-0 my-5">
                    <div class="card card-blog h-100">
                        <div class="card-header p-0 mt-n4 mx-3">
                            <a class="d-block shadow-xl border-radius-xl">
                                <img src='{{asset("storage/images/$product->image")}}' alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" style="height: 300px; width: 100%">
                             </a>
                        </div>
                        <div class="card-body p-3">
                            <div class="mb-2 d-flex justify-content-between">
                                <h5 class="text-lg">{{ucwords($product->name)}}</h5>
                                <div class="d-flex justify-content-between flex-column">
                                    <span class="text-primary font-weight-bold">&#8358;{{number_format($product->getDiscountPrice())}}</span>
                                    <span class="text-success font-weight-bold fs-md mb-0">({{'12% OFF'}})</span>
                                </div>
                            </div>
                            
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text- me-2 text-monospace">Bulk(s) Left:</p>
                                <span class="text-md font-weight-bold">{{sprintf('%d',$product->quantity/12)}}  <span class="text-sm text-monospace text-warning">({{sprintf('%d',$product->quantity)}} pcs)</span></span>
                            </div>
                            
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md me-2 text-monospace">Color(s):</p>
                                <span class="text-sm">{{$product->color}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                            @if(intVal( $product->quantity/12 ) < 1)   
                                <span class="btn btn-outline-danger w-100 btn-sm mb-0">OUT OF STOCK !</span>
                            @elseif(!$isLoggedIn || $isCustomer)   
                                <form method="post" class="w-100" action="{{route('store.addto.cart')}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                    <button type="submit" class="btn btn-outline-success w-100 btn-sm mb-0">Add to Cart</button>
                                </form>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-6 mb-0">
                @if(in_array('all', $data['filters']))
                <p class="mb-0 px-3 font-weight-bold text-md text-danger">No products in store!</p>
                @else
                <p class="mb-0 px-3 font-weight-bold text-md text-danger">No product matching that filter!</p>
                @endif
            </div>
            @endforelse
            </div>
        </div>
    </div>
</div>
</div>
@endsection
