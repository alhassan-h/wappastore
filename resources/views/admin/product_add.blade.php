@extends('layouts.dash')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Add New Product</h6>
                        </div>
                        <div class="col-6 text-end">
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 my-3">
                    <div class="row">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert" style="height: fit-content">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <form method="post" action="{{ route('save.product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-outline my-2">
                                <label for="name" class="col-2 col-form-label pb-0 text-md-begin">{{ __('Name') }}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="category" class="col-2 col-form-label pb-0 text-md-begin">{{ __('Category') }}</label>
                                <div class="col-md-6 col-sm-12">
                                    <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required autofocus>
                                        <option value="">--Select Category--</option>
                                        <option value="shirts" @selected(old('category') == 'shirts')>Shirts</option>
                                        <option value="trousers">Trousers</option>
                                        <option value="caps">Caps</option>
                                        <option value="socks">Socks</option>
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="price" class="col-2 col-form-label pb-0 text-md-begin">{{ __('Price') }}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="price" required autofocus>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="size" class="col-2 col-form-label pb-0 text-md-begin">{{ __('Size') }}</label>
                                <div class="col-md-6 col-sm-12">
                                    <select id="size" class="form-control @error('size') is-invalid @enderror" name="size" required autofocus>
                                        <option value="">--Select Size--</option>
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                    @error('size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="quantity" class="col-2 col-form-label pb-0 text-md-begin">{{ __('Quantity') }}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="quantity" required autofocus>
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="type" class="col-2 col-form-label pb-0 text-md-begin">{{ __('Type') }}</label>
                                <div class="col-md-6 col-sm-12">
                                    <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" autofocus>
                                        <option value="normal">Normal</option>
                                        <option value="cadegan">Cadegan</option>
                                        <option value="jacket">Jacket</option>
                                        <option value="cover">Cover</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline my-2">
                                <label for="image" class="col-2 col-form-label pb-0 text-md-begin">{{ __('Image') }}</label>
                                <div class="col-md-6 col-sm-12">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autofocus>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="input-group input-group-outline mt-5">
                                <div class="col-md-6 col-sm-12">
                                    <button type="submit" class="btn bg-gradient-primary w-50 my-4 mb-2">Save</button>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <a href="{{route('products')}}" class="btn bg-gradient-danger w-50 my-4 mb-2">Back</a>
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