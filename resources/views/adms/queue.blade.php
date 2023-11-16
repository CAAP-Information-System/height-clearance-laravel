@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/queue.css') }}">
<div class="container">
    <header class="queue-hdr">Queued <span style="color: #4AB3E0;">Applications</span></header>
    <div class="main-content">

        @foreach($applicationData as $application)
        <div class="application-card">
            <header class="app-num">{{ $application->application_number }}</header>
            <p class="status">
                @if($application->status == 'pending')
                <span style="color: #D9A406; text-align: center;">Pending</span>
                @elseif($application->status == 'failed')
                <span style="color: #C6303E; text-align: center;">Resubmit Application</span>
                @else
                <span style="color: #2E9A39; text-align: center;">Completed</span>
                @endif
            </p>
            <hr class="border border-secondary border-2 opacity-50">
            <div class="application-card-body">
                @if($application->user)
                <div class="details">
                    <div class="name">{{ $application->user->rep_fname }} {{ $application->user->rep_lname }}</div>
                    <div>{{ $application->user->rep_office_address }}</div>
                </div>
                <p class="email">{{ $application->user->email }}</p>
                @endif
            </div>

            <a href="{{ route('doc-review', ['id' => $application->id]) }}" class="view-btn">
                <i class='bx bxs-caret-right-circle'></i>
                View Application
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
