@extends('layouts.auth')

@section('content')
<div class="page-header align-items-start min-vh-100 pt-5">
    <div class="container py-5">
    <div class="row mb-5">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-5">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Products' Filter</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="input-group input-group-outline mb-3">
                            <div class="col-12">
                                <select id="filter" type="filter" class="form-control" name="filter">
                                    <option value="all">All</option>
                                    <option value="boys">Boys</option>
                                    <option value="girls">Girls</option>
                                    <option value="sizd">Size</option>
                                    <option value="shirts">Shirts</option>
                                    <option value="trousers">Trousers</option>
                                    <option value="shoes">Shoes</option>
                                    <option value="caps">caps</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
         <div class="col-12">
            <div class="mb-5 ps-3">
                <h6 class="mb-1">Category:</h6>
                <p class="text-sm">Architects design houses</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-5">
                    <div class="card card-blog card-plain">
                        <div class="card-header p-0 mt-n4 mx-3">
                            <a class="d-block shadow-xl border-radius-xl">
                                <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                              </a>
                        </div>
                        <div class="card-body p-3">
                            <p class="mb-0 text-sm">Project #2</p>
                            <a href="javascript:;">
                            <h5>Modern</h5>
                            </a>
                            <p class="mb-4 text-sm">As Uber works through a huge amount of internal management turmoil.</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void()" class="btn btn-outline-success btn-sm mb-0">Buy Product</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-5">
                    <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                        <a class="d-block shadow-xl border-radius-xl">
                        <img src="../assets/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <p class="mb-0 text-sm">Project #1</p>
                        <a href="javascript:;">
                        <h5>
                            Scandinavian
                        </h5>
                        </a>
                        <p class="mb-4 text-sm">
                        Music is something that every person has his or her own specific opinion about.
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                          <button type="button" class="btn btn-outline-success btn-sm mb-0">Buy Product</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-5">
                    <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                        <a class="d-block shadow-xl border-radius-xl">
                        <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <p class="mb-0 text-sm">Project #3</p>
                        <a href="javascript:;">
                        <h5>
                            Minimalist
                        </h5>
                        </a>
                        <p class="mb-4 text-sm">
                        Different people have different taste, and various types of music.
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                          <button type="button" class="btn btn-outline-success btn-sm mb-0">Buy Product</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-5">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                        <a class="d-block shadow-xl border-radius-xl">
                        <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <p class="mb-0 text-sm">Project #4</p>
                        <a href="javascript:;">
                        <h5>
                            Gothic
                        </h5>
                        </a>
                        <p class="mb-4 text-sm">
                        Why would anyone pick blue over pink? Pink is obviously a better color.
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                          <button type="button" class="btn btn-outline-success btn-sm mb-0">Buy Product</button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-5">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                        <a class="d-block shadow-xl border-radius-xl">
                        <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <p class="mb-0 text-sm">Project #4</p>
                        <a href="javascript:;">
                        <h5>
                            Gothic
                        </h5>
                        </a>
                        <p class="mb-4 text-sm">
                        Why would anyone pick blue over pink? Pink is obviously a better color.
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                          <button type="button" class="btn btn-outline-success btn-sm mb-0">Buy Product</button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-5">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                        <a class="d-block shadow-xl border-radius-xl">
                        <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <p class="mb-0 text-sm">Project #4</p>
                        <a href="javascript:;">
                        <h5>
                            Gothic
                        </h5>
                        </a>
                        <p class="mb-4 text-sm">
                        Why would anyone pick blue over pink? Pink is obviously a better color.
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                          <button type="button" class="btn btn-outline-success btn-sm mb-0">Buy Product</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
