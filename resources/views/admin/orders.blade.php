@extends('layouts.dash')

@php($d_orders = $data['delivered_orders'])
@php($u_orders = $data['undelivered_orders'])

@section('content')

<div class="container-fluid py-4">
      <div class="row mb-4">
        <div class="col-lg-12 col-md-12 col-12 mb-md-0 mb-4">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Undelivered Orders</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">customer</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">product</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($u_orders as $order)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            {{--<div>
                              <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                            </div>--}}
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ucwords($order->customer->getName())}}</h6>
                              <p class="text-xs text-secondary mb-0">{{strtolower($order->customer->getEmail())}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ucwords($order->product->name)}}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold text-center  mb-0">{{$order->quantity}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-warning">{{$order->status}}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="">&#8358; {{number_format($order->paid_price)}}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{date('d/m/Y H:m A', strtotime($order->created_at))}}</span>
                        </td>
                        <td class="align-middle">
                        <form method="post" action="{{route('validate.orders')}}">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$order->id}}"/>
                            <button type="submit" class="btn btn-success btn-sm">validate</button>
                        </form>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td>
                          <span class="text-secondary text-xs font-weight-bold text-danger">No New Orders!</span>
                        </td>
                      </tr>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-lg-12 col-md-12 col-12 mb-md-0 mb-4">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Delivered Orders</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">customer</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">product</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($d_orders as $order)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            {{--<div>
                              <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                            </div>--}}
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ucwords($order->customer->getName())}}</h6>
                              <p class="text-xs text-secondary mb-0">{{strtolower($order->customer->getEmail())}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ucwords($order->product->name)}}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold text-center  mb-0">{{$order->quantity}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">{{$order->status}}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="">&#8358; {{number_format($order->paid_price)}}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{date('d/m/Y H:m A', strtotime($order->updated_at))}}</span>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td>
                          <span class="text-secondary text-xs font-weight-bold text-danger">No Delivered Orders!</span>
                        </td>
                      </tr>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection