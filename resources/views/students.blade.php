@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="row">
    
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="d-flex justify-content-between my-5">
                <h3 class="lead font-weight-bolder">Students</h3>

                <a href="{{ route('add.student') }}" class="btn btn-primary">Add Student</a>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ucwords($student->name)}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{ucwords($student->address)}}</td>
                                <td>
                                    <a href="{{ url('/students/'.$student->id) }}" class="btn btn-warning">Edit</a> |
                                    <a href="{{ url('/students/delete/'.$student->id.'') }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                
            </div>
    
        </div>
    
    </div>
@endsection

