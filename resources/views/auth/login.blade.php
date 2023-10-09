@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/login.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="row" style="margin-top: 10vh;">
                <div class="col">
                    <img class="caap-logo" src="{{ asset('asset/img/caap-logo.png') }}" alt="CAAP Logo">
                    <header class="col-hdr">
                        Online Height Clearance Permit
                    </header>
                </div>
                <div class="col">
                    <div class="login-card">
                        <header class="login-hdr">Login</header>
                        <form class="form-card" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="text-decoration: none; color: #ffff;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                            </div>


                            <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="login-btn">
                                        {{ __('Sign In') }}
                                    </button>

                                </div>

                            <div class="row ">
                                <div style="margin-top: 20px;"></div>
                                <div class="col-md-8 offset-md-4">
                                    <p style="font-style: italic;">Not registered yet?</p>
                                    @if (Route::has('register'))
                                        <a class="register-link" href="{{ route('register') }}">{{ __('Sign Up Now') }}</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
