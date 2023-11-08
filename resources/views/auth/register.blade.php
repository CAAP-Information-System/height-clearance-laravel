@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/auth/register.css') }}">
<div class="container">
    <div class="title">Registration</div>
    <form class="register-user" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="user__details">
            <div class="input__box">
                <span class="details">First Name</span>
                <input type="text" placeholder="E.g: Juan" name="rep_fname" required>
            </div>
            <div class="input__box">
                <span class="details">Last Name</span>
                <input type="text" placeholder="E.g: Dela Cruz" name="rep_lname" required>
            </div>
            <div class="input__box">
                <span class="details">Email Address</span>
                <input type="email" placeholder="juan@example.com" name="email" required>
            </div>
            <div class="input__box">
                <span class="details">Company Representing</span>
                <input type="text" placeholder="E.g: ABC Company" name="rep_company" required>
            </div>
            <div class="input__company">
                <span class="details">Company Address/Location</span>
                <input type="text" placeholder="Street Name, Barangay/Village, State/Province" name="rep_office_address" required>
            </div>
            <div class="input__box">
                <span class="details">Landline Number</span>
                <input type="number" placeholder="1234" name="rep_landline" required>
            </div>
            <div class="input__box">
                <span class="details">Phone Number</span>
                <input type="number" placeholder="09123456789" name="rep_mobile" required>
            </div>
            <div class="input__box">
                <span class="details">Password</span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="new-password" required>
            </div>
            <div class="input__box">
                <span class="details">Confirm Password</span>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" required autocomplete="new-password" required>
            </div>

        </div>

        <div class="button">
            <button type="submit" class="register">Register Account</button>
        </div>
    </form>
</div>
<section class="already-registered">
    <div>Already have an account?</div>
    <br>
    @if (Route::has('login'))
    <a class="alt-link" href="{{ route('login') }}">Back to Sign In</a>
    @endif
</section>
</div>

<script>

</script>
@endsection
