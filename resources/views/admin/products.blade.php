@extends('layouts.dash')

@php($products = $data['products'])
@php($filters = $data['filters'])

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Filter Products</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-success mb-0" href="{{route('add.product')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form class="" method="post" action="{{route('filter.products')}}">
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
    <div class="row mb-4">
         <div class="col-12 mt-2">
            <div class="mb-3 ps-3 d-flex align-items-center">
                <h6 class="mb-0 me-2">Filter:</h6>
                <div>
                    @foreach($data['filters'] as $filter)
                        @if ($loop->last)
                        <span class="text-sm m-0 p-0">{{ucfirst($filter)}}.</span>
                        @else
                        <span class="text-sm me-1 m-0 p-0">{{ucfirst($filter)}},</span>
                        @endif
                    @endforeach
                    @if(!in_array('all', $data['filters'])) <a class="btn btn-success btn-sm p-1 ms-4" href="{{route('products')}}">All Products</a> @endif
                </div>
            </div>
            <div class="row">
                @forelse($data['products'] as $product)
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
                                <p class="mb-0 font-weight-bold text-md">Color(s):</p>
                                <span class="text-sm">{{ucwords($product->color)}}</span>
                            </div>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Quantity:</p>
                                <span class="text-sm">{{ucwords($product->quantity)}}</span>
                            </div>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Size:</p>
                                <span class="text-sm">{{ucwords($product->size)}} years</span>
                            </div>
                            <div class="mb-0 d-flex justify-content-between align-items-center col-12">
                                <p class="mb-0 font-weight-bold text-md">Price:</p>
                                <span class="text-sm">&#8358;{{number_format($product->price)}}</span>
                            </div>
                            <div class="mt-2 d-flex align-items-center justify-content-between">
                                <div class="">
                                    <form id="" method="post" action="{{route('get.edit.product')}}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button type="submit" class="btn btn-warning btn-sm mb-0">Edit</button>
                                    </form>
                                </div>                                
                                <button type="button" class="btn btn-danger btn-sm mb-0" id="remove-{{$product->id}}"  data-bs-toggle="dropdown" aria-expanded="false">Remove</button>
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-1 me-sm-n4" aria-labelledby="remove-{{$product->id}}"> 
                                    <li class="">
                                        <div class="py-5 px-2 text-center">
                                            <h4 class="mb-2">Are You Sure?</h4>
                                            <p class="mb-2 text-primary">You want to remove <br>the product from store</p>
                                            <p class="mb-2 text-danger mb-3">You can't undo this action</p>
                                            <form id="" method="post" action="{{route('remove.product')}}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <button type="submit" class="btn btn-danger btn-sm mb-0">Yes</button>
                                            </form>
                                        </div>  
                                    </li>
                                </ul>
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
@endsection