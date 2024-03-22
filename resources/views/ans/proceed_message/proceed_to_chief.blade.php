@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/proceed-message.css') }}">
<div class="container">

<div class="container">
    <div class="report-container">
        <header class="report-title">The application is sent to the <span style="color: #2F96D0;">Department Chief</span></header>
        <img class="proceed-img" src="{{ asset('asset/img/chief.svg') }}" alt="chief">
        <div class="report-submessage">Next step will be assessed by the <span>ATS Chief</span>.</div>
        <a class="return-queue" href="{{ url('adms/queue') }}">Return to Queue</a>
    </div>
</div>
@endsection
