@extends('layouts.dash')

@section('content')

@php($customers = $data['customers'])

<div class="container-fluid py-4">
      <div class="row mb-4">
      <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Registered Customers</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">phone number</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">email address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($customers as $customer)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{--<div>
                            <img src="{{asset('assets/img/200x200.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>--}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ucwords($customer->name)}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ucwords($customer->phone)}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{strtolower($customer->email)}}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ucwords($customer->address)}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{date('jS, M Y',strtotime($customer->created_at))}}</span>
                      </td>
                      <td class="align-middle">
                        <a href='{{url("admin/customers/$customer->id")}}' class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="View customer">
                          View
                        </a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td>
                        <span class="text-secondary text-xs font-weight-bold text-danger">No Customers</span>
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