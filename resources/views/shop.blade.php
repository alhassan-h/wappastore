@extends('layouts.auth')

@section('content')
<div class="page-header align-items-start min-vh-100 pt-5">
    <div class="container py-5">
    <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-5">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Products' Filter</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-primary mb-0" href="{{route('cart')}}">Goto Cart</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form class="" method="post" action="{{route('shop')}}">
                            @csrf
                            <div class="input-group input-group-outline mx-1">
                                <label class="font-weight-bold" for="">Category</label>
                                <div class="form-switch mx-2 d-flex justify-content-between">
                                    <div class="me-3">
                                        <label for="category-shirts" class="me-2">Shirts</label>
                                        <input class="form-check-input ms-auto" type="radio" @selected(true) value="shirts" id="category-shirts" name="category">
                                    </div>
                                    <div class="">
                                        <label for="category-trousers" class="me-2">Trousers</label>
                                        <input class="form-check-input ms-auto" type="radio" @selected(true) value="trousers" id="category-trousers" name="category">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline mx-1">
                                <label class="font-weight-bold" for="">Gender</label>
                                <div class="form-switch mx-2 d-flex justify-content-between">
                                    <div class="me-3">
                                        <label for="gender-boys" class="me-2">Boys</label>
                                        <input class="form-check-input ms-auto" type="radio" @selected(old('gender') == 'boys') value="boys" id="gender-boys" name="gender">
                                    </div>
                                    <div class="">
                                        <label for="gender-girls" class="me-2">Girls</label>
                                        <input class="form-check-input ms-auto" type="radio" @selected(old('gender') == 'girls') value="girls" id="gender-girls" name="gender">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline mx-1">
                                <label class="font-weight-bold" for="">Color</label>
                                <div class="form-switch mx-2 d-flex justify-content-between">
                                    <div class="">
                                        <label for="category-red" class="me-2">Red</label>
                                        <input class="form-check-input ms-auto" type="radio" @selected(old('color') == 'red') value="red" id="category-red" name="color">
                                    </div>
                                    <div class="mx-3">
                                        <label for="color-black" class="me-2">Black</label>
                                        <input class="form-check-input ms-auto" type="radio" @selected(old('color') == 'black') value="black" id="color-black" name="color">
                                    </div>
                                    <div class="">
                                        <label for="color-white" class="me-2">White</label>
                                        <input class="form-check-input ms-auto" type="radio" @selected(old('color') == 'white') value="white" id="color-white" name="color">
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
            <div class="mb-5 ps-3">
                <h6 class="mb-1">Category:</h6>
                @foreach($data['filters'] as $filter)
                    @if ($loop->last)
                    <span class="text-sm me-1">{{ucfirst($filter)}}.</span>
                    @else
                    <span class="text-sm me-1">{{ucfirst($filter)}},</span>
                    @endif
                @endforeach
            </div>
            <div class="row">
            @foreach($data['products'] as $product)
                <div class="col-xl-3 col-md-6 mb-xl-0 my-5">
                    <div class="card card-blog">
                        <div class="card-header p-0 mt-n4 mx-3">
                            <a class="d-block shadow-xl border-radius-xl">
                                <img src='{{asset("storage/images/$product->image")}}' alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" style="height: 300px; width: 100%">
                             </a>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="mb-2 text-lg">{{ucwords($product->name)}}</h5>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Category:</p>
                                <span class="text-sm">{{ucwords($product->category)}}</span>
                            </div>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Gender:</p>
                                <span class="text-sm">{{ucwords($product->gender)}}</span>
                            </div>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Color:</p>
                                <span class="text-sm">{{ucwords($product->color)}}</span>
                            </div>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Quantity:</p>
                                <span class="text-sm">{{$product->quantity}}</span>
                            </div>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Price:</p>
                                <span class="text-sm">&#8358;{{number_format($product->price)}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <form method="post" action="{{route('addto.cart')}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                    <button type="submit" class="btn btn-outline-success btn-sm mb-0">Add to Cartt</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
