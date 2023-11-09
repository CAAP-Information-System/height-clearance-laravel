@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/auth/login.css') }}">


<section class="vh-100">
    <div class="container">
        <header class="auth-hdr">Welcome</header>
        <div class="login-main">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="{{ asset('asset/img/caap-logo.png') }}" alt="CAAP Logo" class="caap-logo">
                    <header class="col-hdr">
                        <span class="head-title" id="upper">Online Height Clearance</span>
                        <p class="subtitle">Fast and convenient certification transaction</p>
                    </header>
                </div>

                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        <header class="login-hdr">Login</header>
                        @csrf
                        <br>
                        <div class="user__details">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example13">Email address:</label>
                                <input id="email" type="email" placeholder="Enter Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example23">Password:</label>
                                <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                <div class="form-check" style="margin-top: 10px;">
                                    <input type="checkbox" id="show-password" class="form-check-input">
                                    <label class="form-check-label" for="show-password">Show Password</label>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div id="caps-lock-warning" class="caps-warning" style="display: none;">
                                    Your CAPS LOCK is on
                                </div>
                                <div style="margin-top: 30px;"></div>
                                @if (Route::has('password.request'))
                                <a class="forgot-pass-btn" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="button-30" id="login-button">
                            Sign In
                        </button>
                        <div class="row ">
                            <div style="margin-top: 35px;"></div>
                            <div>
                                <p style="font-style: italic; padding-left: 10px; ">Not registered yet?</p>
                                @if (Route::has('register'))
                                <a class="alt-link" href="{{ route('register') }}">Create an Account</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
