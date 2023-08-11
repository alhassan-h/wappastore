@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="row">
    
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
                <h3 class="lead font-weight-bolder my-5">Add Student</h3>

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert" style="height: fit-content">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form method="post">
                    @csrf
                    <x-forms.row class="mb-2">
                        <x-forms.group class="col-md-6 mb-2">
                            <x-forms.input type="text" label="Registration Number" name="regno" placeholder="Registration Number"/>
                        </x-forms.group>
                    </x-forms.row>
                    <x-forms.row class="mb-2">
                        <x-forms.group class="col-md-6 mb-2">
                            <x-forms.input type="name" label="Full Name" name="name" placeholder="Fullname"/>
                        </x-forms.group>
                    </x-forms.row>
                    <x-forms.row class="mb-2">
                        <x-forms.group class="col-md-6 mb-2">
                            <x-forms.input type="email" label="Email Address" name="email" placeholder="Email Address"/>
                        </x-forms.group>
                    </x-forms.row>
                    <x-forms.row class="mb-2">
                        <x-forms.group class="col-md-6 mb-2">
                            <x-forms.input type="text" label="Phone Number" name="phone" placeholder="Phone Number"/>
                        </x-forms.group>
                    </x-forms.row>
                    <x-forms.row class="mb-4">
                        <x-forms.group class="col-md-6 mb-0">
                            <x-forms.input type="text" label="Home Address" name="address" placeholder="Home Address"/>
                        </x-forms.group>
                    </x-forms.row>
                    
                    <x-forms.row class="mb-4">
                        <x-forms.group class="col-md-5 mb-0">
                            <x-forms.button type="success" name="submit"/>
                        </x-forms.group>
                        <x-forms.group class="col-md-5 mb-0">
                            <x-forms.abutton type="danger" route="students" name="Back"/>
                        </x-forms.group>
                    </x-forms.row>
                </form>
                
            </div>
    
        </div>
    
    </div>
@endsection