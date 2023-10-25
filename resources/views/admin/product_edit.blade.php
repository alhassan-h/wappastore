@extends('layouts.dash')

@php($product = $data['product'])

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Update a Product</h6>
                        </div>
                        <div class="col-6 text-end">
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 my-3">
                    <div class="row">
                        <form method="post" action="{{route('update.product')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="input-group input-group-outline my-2">
                                <label for="product-image-preview" class="col-2 col-form-label pb-0 text-md-begin">{{__('Image Preview')}}</label>
                                <div class="col-md-6 col-sm-12 d-flex justify-content-center">
                                    <img id="product-image-preview" src='{{asset("storage/images/$product->image")}}' alt="preview image" style="max-height: 200px; max-width: 100%;">
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="product-image" class="col-2 col-form-label pb-0 text-md-begin">{{__('Image')}}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="product-image" accept="image/*" type="file" class="form-control @error('product-image') is-invalid @enderror" name="product-image" value="{{old('product-image')}}">
                                    @error('product-image')
                                        <span class="invalid-feedback d-flex" role="alert">
                                            <strong>{{$message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="name" class="col-2 col-form-label pb-0 text-md-begin">{{__('Name')}}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $product->name)}}" placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback d-flex" role="alert">
                                            <strong>{{$message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="category" class="col-2 col-form-label pb-0 text-md-begin">{{__('Category')}}</label>
                                <div class="col-md-6 col-sm-12">
                                    <select id="category" class="form-control @error('category') is-invalid @enderror" name="category">
                                        <option value="">--Select Category--</option>
                                        <option value="shirts" @selected(old('category') == 'shirts' || $product->category == 'shirts')>Shirts</option>
                                        <option value="trousers" @selected(old('category') == 'trousers' || $product->category == 'trousers')>Trousers</option>
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback d-flex" role="alert">
                                            <strong>{{$message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="gender" class="col-2 col-form-label pb-0 text-md-begin">{{__('Gender')}}</label>
                                <div class="col-md-6 col-sm-12">
                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option value="">--Select gender--</option>
                                        <option value="boys" @selected(old('gender') == 'boys' || $product->gender == 'boys')>Boys</option>
                                        <option value="girls" @selected(old('gender') == 'girls' || $product->gender == 'girls')>Girls</option>
                                    </select>
                                    @error('size')
                                        <span class="invalid-feedback d-flex" role="alert">
                                            <strong>{{$message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="color" class="col-2 col-form-label pb-0 text-md-begin">{{__('Color')}}</label>
                                <div class="col-md-6 col-sm-12">
                                    <select id="color" class="form-control @error('color') is-invalid @enderror" name="color" autofocus>
                                        <option value="-">--select color--</option>
                                        <option value="red" @selected(old('color') == 'red' || $product->color == 'red')>Red</option>
                                        <option value="black" @selected(old('color') == 'black' || $product->color == 'black')>Black</option>
                                        <option value="white" @selected(old('color') == 'white' || $product->color == 'white')>White</option>
                                        <option value="blue" @selected(old('color') == 'blue'  || $product->color == 'blue')>Blue</option>
                                        <option value="green" @selected(old('color') == 'green'  || $product->color == 'green')>Green</option>
                                        <option value="brown" @selected(old('color') == 'brown'  || $product->color == 'brown')>Brown</option>
                                        <option value="pink" @selected(old('color') == 'pink'  || $product->color == 'pink')>Pink</option>
                                        <option value="purple" @selected(old('color') == 'purple'  || $product->color == 'purple')>Purple</option>
                                        <option value="yellow" @selected(old('color') == 'yellow'  || $product->color == 'yellow')>Yellow</option>
                                    </select>
                                    @error('color')
                                    <span class="invalid-feedback d-flex" role="alert">
                                            <strong>{{$message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="quantity" class="col-2 col-form-label pb-0 text-md-begin">{{__('Quantity')}}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{old('quantity', $product->quantity)}}" placeholder="quantity">
                                    @error('quantity')
                                        <span class="invalid-feedback d-flex" role="alert">
                                            <strong>{{$message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="price" class="col-2 col-form-label pb-0 text-md-begin">{{__('Price')}}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price', $product->price)}}" placeholder="price">
                                    @error('price')
                                        <span class="invalid-feedback d-flex" role="alert">
                                            <strong>{{$message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline mt-5">
                                <div class="col-md-6 col-sm-12">
                                    <button type="submit" class="btn bg-gradient-warning w-50 my-4 mb-2">Update</button>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <a href="{{route('products')}}" class="btn bg-gradient-primary w-50 my-4 mb-2">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection