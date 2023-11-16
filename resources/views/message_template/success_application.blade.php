@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/status.css') }}">
<div class="container">
    <section class="status-main">
        <header class="application-result-hdr">
            Application Result
        </header>
        <div class="report-card">
            <div class="left-col">
                <img class="status-img" src="{{ asset('asset/img/success.png') }}" alt="robot" class="success status">
                <p class="status-title">Congratulations! !</p>
                <p class="status-caption">Your application has <span style="color: #2AC73A; font-weight:bold;">successfully</span> been approved.</p>

            </div>
            <div class="right-col">
                <p class="status-success">Hello there!</p>
                <hr class="border border-secondary border-2 opacity-50">
                <p class="success-submessage">You can now pick up your certification at the <br> <span style="font-weight: bold;">Civil Aviation Authority of the Philippines Central Office</span>!</p>
                <br>
                <a href="{{ url('home') }}" class="return-home-btn">
                    <i class='bx bx-home-alt'></i>
                    Return Home
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
