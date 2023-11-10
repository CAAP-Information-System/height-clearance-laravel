@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/message_template/application_finished.css') }}">
<div class="container">
    <div class="main-message">
        <img src="{{ asset('asset/img/robot.jpg') }}" alt="robot" class="robot-ui">
        <header class="message-header">Whoa there! Where are you going.</header>
        <p class="submessage">We're already processing your application. You can go to <a href="{{ route('check-results') }}">Check Results</a> for updates.</p>
    </div>
</div>
@endsection
