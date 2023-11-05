@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/view_results.css') }}">
<div class="container">
    <div class="result-grp">
        <header class="application-result-hdr">
            Application Result
        </header>
        <img class="result-img" src="{{ asset('asset/img/hello.svg') }}" alt="a guy waving">
        <header class="header-msg">Relax! Your application is still being evaluated</header>
        <p class="sub-msg">Go grab a coffee and we’ll let you know immediately once your application process is finished.</p>
        <a href="{{ url('home') }}" class="return-home-btn">
        <i class='bx bx-home-alt'></i>
            Return Home
        </a>
    </div>
</div>
@endsection
