@extends('layouts.auth')

@php($messages = $data['messages'])
@section('content')

<div class="page-header align-items-start min-vh-100 pt-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-5">
                <div class="card mt-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center mb-4">
                                <div class="position-relative">
                                    <h3 class="title-left m-0 p-0">Contact Us</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0 p-3">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center justify-content-center flex-column">
                                <h4 class="text-primary w-100 mb-3">Send A Message</h4>
                                <form role="form" class="text-start w-100" method="POST" action="{{ route('sendmessage.contact') }}">
                                    @csrf
                                    <div class="input-group input-group-outline mb-2">
                                        <label for="name" class="p-0 col-md-4 col-form-label text-start">{{ __('Name') }}</label>
                                        <div class="col-12">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required autocomplete="" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback d-flex" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group input-group-outline mb-2">
                                        <label for="email" class="p-0 col-md-4 col-form-label text-start">{{ __('Email Address') }}</label>
                                        <div class="col-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="invalid-feedback d-flex" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group input-group-outline mb-2">
                                        <label for="subject" class="p-0 col-md-4 col-form-label text-start">{{ __('Subject') }}</label>
                                        <div class="col-12">
                                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required>
                                            @error('subject')
                                                <span class="invalid-feedback d-flex" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group input-group-outline mb-2">
                                        <label for="message" class="p-0 col-md-4 col-form-label text-start">{{ __('Message') }}</label>
                                        <div class="col-12">
                                            <textarea rows="5" id="message" class="form-control @error('message') is-invalid @enderror" name="message" required>{{ old('message') }}</textarea>
                                            @error('message')
                                                <span class="invalid-feedback d-flex" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary my-4">Send Message</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex flex-column">
                                <h4 class="text-primary w-100 mb-3">Get In Touch</h4>
                                <div class="" style="">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Facilis dolorum dolorem soluta quidem expedita aperiam aliquid at.
                                        Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis mollitia inventore?
                                    </p>
                                    <ul class="list-ico">
                                        <li><span class="fa fa-tint"></span> 11 KAWO, KADUNA STATE</li>
                                        <li><span class="fa fa-phone"></span> (+234) 701 234 5678</li>
                                        <li><span class="fa fa-envelope"></span> hasfatwappah@gmail.com</li>
                                    </ul>
                                </div>
                                <div class="socials">
                                    <ul>
                                        <li><a href=""><span class="ico-circle"><i class="fa fa-facebook"></i></span></a></li>
                                        <li><a href=""><span class="ico-circle"><i class="fa fa-instagram"></i></span></a></li>
                                        <li><a href=""><span class="ico-circle"><i class="fa fa-twitter"></i></span></a></li>
                                        <li><a href=""><span class="ico-circle"><i class="fa fa-linkedin"></i></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-0 mb-5">
                <div class="card mt-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center mb-0">
                                <h4 class="text-primary w-100 mb-3">Messages</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0 p-3">
                        <div class="row">
                            @foreach($messages as $message)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card card-blog border h-100">
                                    <div class="card-body p-3">
                                        <div class="mb-2">
                                            <span class="mb-0 text-lg font-weight-bold text-dark">{{ucwords($message->sender_name)}}</span>
                                            <span class="mb-0 text-sm">({{strtolower($message->sender_email)}})</span>
                                        </div>
                                        @if($message->subject)
                                            <h6 class="mb-2 text-uppercase text-danger text-decoration-underline">{{ucwords($message->subject)}}</h6>
                                        @endif
                                        <div class="mb-2 w-100 min-vh-10 p-1 border">
                                            <span class="text-sm">{{ucfirst($message->message)}}</span>
                                        </div>
                                        <div class="mb-0 mt-3 d-flex flex-row-reverse col-12">
                                            <p class="mb-0 text-sm">{{$message->getDate()}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
