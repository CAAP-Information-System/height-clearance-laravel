@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/proceed-message.css') }}">
<div class="container">

<div class="container">
    <div class="report-container">
        <header class="report-title">We are now preparing the <span style="color: #2F96D0;">Non-Compliance Letter</span></header>
        <img class="proceed-img" src="{{ asset('asset/img/non-compliance.svg') }}" alt="non compliance">
        <div class="report-submessage">Next step is for the signee.</div>
        <a class="return-queue" href="{{ url('adms/queue') }}">Return to Queue</a>
    </div>
</div>
@endsection
