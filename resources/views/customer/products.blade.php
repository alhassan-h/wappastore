@extends('layouts.dash')

@php($products = $data['products'])

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">My Products</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">product name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulk</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total price</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse( $products as $product )
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ucwords($product->product->name)}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold text-center  mb-0">{{$product->quantity}}<span class="ms-2 text-monospace text-sm text-warning">({{$product->quantity * 12}} pcs)</span></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="">&#8358; {{number_format($product->paid_price)}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{date('d/m/Y h:m A', strtotime($product->created_at))}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{ucfirst($product->status)}}</span>
                                    </td>
                                </tr>
                                @empty
                                <h3 class="text-danger text-lg">No recent products!</h3>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
         <div class="col-12 mt-4">

        </div>
    </div>
</div>
@endsection