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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">product name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">product category</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total price</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
                                <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Shoe</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Sandal</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold text-center  mb-0">2</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="">$2,000</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Cancel order">
                                        View
                                        </a>
                                    </td>
                                </tr>
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