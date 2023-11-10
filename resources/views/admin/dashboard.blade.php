@extends('layouts.dash')

@php($analytics = $data['analytics'])
@php($montly_sales_data = $analytics['montly_sales_data'])
@php($montly_orders_data = $analytics['montly_orders_data'])

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-money opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Sales</p>
                <h4 class="mb-0">&#8358;{{number_format($analytics['total_sales'])}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+ &#8358;{{number_format($analytics['today_sales'])}} </span>today</p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-cart-arrow-down opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Orders</p>
                <h4 class="mb-0">{{number_format($analytics['total_orders'])}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{number_format($analytics['today_orders'])}} </span>today</p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-cart-plus opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Deliveries</p>
                <h4 class="mb-0">{{number_format($analytics['total_deliveries'])}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{number_format($analytics['today_deliveries'])}} </span>today</p>
            </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-user opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Customers</p>
                <h4 class="mb-0">{{number_format($analytics['total_customers'])}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{number_format($analytics['today_customers'])}}</span> today</p>
            </div>
            </div>
        </div>
        
    </div>
    <div class="row mt-4">
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
            <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Monthly Sales </h6>
                <p class="text-sm "> (<span class="font-weight-bolder">+{{sprintf('%.2f', $analytics['sales_perc_inc'])}}%</span>) increase in this month's sales. </p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                @php($updated_sales = $analytics['sales_last_update'])
                <p class="mb-0 text-sm">{{($updated_sales)?"updated $updated_sales":""}}</p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4 mb-3">
            <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                    <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">Monthly Orders</h6>
                <p class="text-sm "> (<span class="font-weight-bolder">+{{sprintf('%.2f', $analytics['orders_perc_inc'])}}%</span>) increase in this month's orders.</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                @php($updated_orders = $analytics['orders_last_update'])
                <p class="mb-0 text-sm">{{($updated_orders)?"updated $updated_orders":""}}</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection