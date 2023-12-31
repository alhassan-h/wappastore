@extends('layouts.auth')

@php($cart = $data['cart'])
@php($grand_total = 0)
@php($total_discount = 0)

@section('content')

<div class="page-header align-items-start min-vh-100 pt-5">
    <div class="container pt-5 mb-7">
        <div class="row mb-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-0">
                <div class="card d-flex flex-column-reverse mt-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-lg-0 mb-5 d-flex flex-column-reverse">
                                <div class="card-body p-3">
                                    <div class="table-responsive p-0">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-lg-10"></th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($cart as $crt)
                                                    @php($img = $crt->product->image)
                                                    @php($total_price = $crt->getActualPrice())
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img src='{{asset("storage/images/$img")}}' class="avatar avatar-lg me-3 border-radius-lg" alt="user2">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column justify-content-around">
                                                                <div class="d-flex">
                                                                    <h6 class="mb-4">{{ucwords($crt->product->name)}}</h6>
                                                                    @if($crt->hasDiscount())
                                                                    <span class="ms-1 font-weight-bold text-sm text-success">(BULK)</span>
                                                                    @endif
                                                                </div>
                                                                @php($update_route = ($crt->hasDiscount())?'store.updatecart.cart':'updatecart.cart')
                                                                <form method="post" action="{{route($update_route)}}">
                                                                    @csrf
                                                                    <input type="hidden" name="cart_product_id" value="{{$crt->id}}"/>
                                                                    <table class="mb-4 w-100">
                                                                        <tr>
                                                                            <td><p class="font-weight-bold text-sm text-dark mb-0 w-5">Category:</p></td>
                                                                            <td><p class="text-sm text-dark mb-0">{{strtolower($crt->product->category)}}</p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><p class="font-weight-bold text-sm text-dark mb-0 w-5">Gender:</p></td>
                                                                            <td><p class="text-sm text-dark mb-0">{{strtolower($crt->product->gender)}}</p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><p class="font-weight-bold text-sm text-dark mb-0 w-5">Color(s):</p></td>
                                                                            <td><p class="text-sm text-dark mb-0">{{strtolower($crt->product->color)}}</p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>@if($crt->hasDiscount())
                                                                                <p class="font-weight-bold text-sm text-dark mb-0 w-5">{{ __('Bulk(s):')}}</p>
                                                                                @else
                                                                                <p class="font-weight-bold text-sm text-dark mb-0 w-5">{{ __('Pieces:') }}</p>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <div class="input-group input-group-outline d-flex align-items-center">
                                                                                    <div class="w-20">
                                                                                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="cart_product_quantity" value="{{ old('quantity', $crt->quantity) }}" placeholder="quantity" min="1" required autofocus>
                                                                                        @error('quantity')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{$message}}</strong>
                                                                                        </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="mx-2">
                                                                                        <span class="text-warning fst-italic">({{$crt->quantity * 12}} pcs)</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="">
                                                                                    <button type="submit" class="btn btn-sm btn-primary mt-1 mb-0">Update</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </form>
                                                                <form method="post" action="{{route('deletecart.cart')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="cart_product_id" value="{{$crt->id}}"/>
                                                                    <button type="submit" class="btn btn-sm btn-danger mb-4">Remove Product</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-lg text-success font-weight-bold mb-0">&#8358; {{number_format($crt->getDiscountPrice())}} @if($crt->hasDiscount()) <span class="text-sm text-primary font-weight-normal text-uppercase">({{$crt->getDiscountPercent()}}% off)</span> @endif</p>
                                                        </td>
                                                    </tr>
                                                    @php($grand_total += $total_price)
                                                    @php($total_discount += $crt->getDiscountPrice())
                                                    @empty
                                                    <p class="text-danger text-lg">No products in Cart! Continue shopping</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    @if($cart->isNotEmpty())
                                    <h3 class="text-lg text-danger">Total: <span class="text-decoration-line-through">&#8358; {{number_format($grand_total)}}</span></h3>
                                    <div class="d-flex flex-column">
                                        <h3 class="text-lg text-success">Discounted Total: &#8358; {{number_format($total_discount)}}</h3>
                                        <span class="text-sm text-primary font-weight-bold text-uppercase">{{($grand_total)?sprintf('%.2f',(($grand_total-$total_discount)/$grand_total)*100):0}}% off</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="">
                    @if($cart->isNotEmpty())
                    <button type="submit" class="btn btn-lg btn-success" onclick="payWithPaystack()"> Pay &#8358;{{number_format($total_discount)}} Now </button>
                    @endif
                </div>
                    </div>
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex align-items-center justify-content-between">
                                <h6 class="mb-0">{{$cart->count()}} Product(s) in Cart</h6>
                                @if($cart->isNotEmpty())
                                <button type="submit" class="btn btn-lg btn-success" onclick="payWithPaystack()"> Pay &#8358;{{number_format($total_discount)}} Now </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
