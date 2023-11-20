@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/sent-to-supervisor.css') }}">
<div class="container">

<div class="container">
    <div class="report-container">
        <header class="report-title">The application is sent to <span style="color: #2F96D0;">Supervisor</span></header>
        <img class="task-img" src="{{ asset('asset/img/task.png') }}" alt="robot" class="task group">
        <div class="report-submessage">Next step will be assessed by the <span>ADMS Supervisor/Checker</span>.</div>
        <a class="return-queue" href="{{ url('adms/queue') }}">Return to Queued Applications Page</a>
    </div>
</div>
@endsection
