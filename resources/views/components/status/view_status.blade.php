@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/view_status.css') }}">
<div class="container">
    <div class="view-status">
        <header class="view-status-hdr">My <span style="color: #4AB3E0;">Applications</span></header>
        <div class="card-grp">


            @if ($applications->count() > 0)
            <div class="card-container">
                @foreach ($applications as $application)
                <div class="card">
                    <div class="card-header">
                        <header class="app-num">{{ $application->application_number }}</header>

                    </div>
                    <div class="card-body">
                        <p class="owner-name">{{ $application->owner->owner_fname }} {{ $application->owner->owner_lname }}</p>

                    </div>
                    <a class="view-application-btn" href="{{ route('check-submission', ['id' => $application->id]) }}">
                        <i class='bx bxs-navigation'></i>
                        View Status
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <section class="not-found-sect">
                <img class="not-found-img" src="{{ asset('asset/img/not-found.svg') }}" alt="file not found">
                <div class="not-found-info">
                    <header class="not-found-hdr">Oops, Sorry!</header>
                    <div class="not-found-msg">No application has been found yet.</div>
                </div>
            </section>
            @endif
        </div>

    </div>
</div>

@endsection
