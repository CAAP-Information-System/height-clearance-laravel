@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/proceed-message.css') }}">
<div class="container">

    <div class="container">
        <div class="report-container">
            <header class="report-title">The application is sent to <span style="color: #2F96D0;">Supervisor</span></header>
            <img class="proceed-img" src="{{ asset('asset/img/task.png') }}" alt="robot">
            <div class="report-submessage">Next step will be assessed by the <span>ADMS Supervisor/Checker</span>.</div>
            <a class="return-queue" href="{{ url('adms/queue') }}">Return to Queued Applications Page</a>
        </div>
    </div>
    @endsection
