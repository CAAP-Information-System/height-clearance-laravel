@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/auth/login.css') }}">
<div class="container">
    <header class="auth-hdr">Welcome</header>
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="row" style="margin-top: 15vh;">
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
                                    <!-- <div class="form-check">
                                        <input type="checkbox" id="show-password" class="form-check-input">
                                        <label class="form-check-label" for="show-password">Show Password</label>
                                    </div> -->
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
<script>
    const passwordField = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('show-password');

    showPasswordCheckbox.addEventListener('change', () => {
        const passwordFieldType = showPasswordCheckbox.checked ? 'text' : 'password';
        passwordField.setAttribute('type', passwordFieldType);
    });
</script>
@endsection
