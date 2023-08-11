@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="row">
    
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
                <h3 class="lead font-weight-bolder my-5">Edit Student</h3>

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert" style="height: fit-content">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form method="post">
                    @csrf
                    
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6 mb-0">
                            <label for="inputName">Full Name</label>
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Full Name" value="{{old('name',ucwords($student->name))}}">
                            @error('name')
                                <div class="alert alert-danger m-0" role="alert" style="height: fit-content">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6 mb-0">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{old('email',$student->email)}}">
                            @error('email')
                                <div class="alert alert-danger m-0" role="alert" style="height: fit-content">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6 mb-0">
                            <label for="inputPhoneNumber">Phone Number</label>
                            <input type="PhoneNumber" class="form-control" id="inputPhoneNumber" name="phone" placeholder="Phone Number" value="{{old('phone',$student->phone)}}">
                            @error('phone')
                                <div class="alert alert-danger m-0" role="alert" style="height: fit-content">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group  col-md-6 mb-0">
                            <label for="inputHomeAddress">Home Address</label>
                            <input type="text" class="form-control" id="inputHomeAddress" name="address" placeholder="Home Address" value="{{old('address',ucwords($student->address))}}">
                            @error('address')
                                <div class="alert alert-danger m-0" role="alert" style="height: fit-content">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group  col-md-4">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        <div class="form-group  col-md-4">
                            <a href="{{route('students')}}" class="btn btn-info">Back</a>
                        </div>
                    </div>

                </form>
                
            </div>
    
        </div>
    
    </div>
@endsection
