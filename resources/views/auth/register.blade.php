@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/auth/register.css') }}">
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
                        <header class="login-hdr">Register Account</header>
                        <form class="form-card" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">First Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="first_name" placeholder="Enter First Name" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Last Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="last_name" placeholder="Enter Last Name"autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Address</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="home_address" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Landline</label>

                                <div class="col-md-6">
                                    <input id="name" type="number" class="form-control" name="landline" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Mobile</label>

                                <div class="col-md-6">
                                    <input id="name" type="number" class="form-control" name="mobile" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Representative First Name</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="rep_fname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Representative Last Name</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="rep_lname">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Representative Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="rep_email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Company Represent</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="rep_company">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Representative Office Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="rep_office_address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Landline</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control @error('email') is-invalid @enderror" name="rep_landline">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Mobile</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control @error('email') is-invalid @enderror" name="rep_mobile">
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button-30">
                                        Create Account
                                    </button>
                                </div>
                            </div>

                            <div class="row ">
                                <div style="margin-top: 20px;"></div>
                                <div class="col-md-8 offset-md-4">
                                    <p style="font-style: italic;">Already have an account?</p>
                                    @if (Route::has('login'))
                                    <a class="alt-link" href="{{ route('login') }}">{{ __('Back to Sign In') }}</a>
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
