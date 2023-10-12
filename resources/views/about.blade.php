@extends('layouts.auth')

@section('content')

<div class="page-header align-items-start min-vh-100 pt-5">
    <div class="container py-5">
    <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-5">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <button type="submit" class="btn btn-success" onclick="payWithPaystack()"> Pay </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
