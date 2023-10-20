@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Application Details</h1>

    @if ($application)
        <div>
            <strong>Application Number:</strong> {{ $application->application_number }}
        </div>
        <div>
            <strong>Site Address:</strong> {{ $application->site_address }}
        </div>

    @else
        <p>Application not found.</p>
    @endif
</div>
@endsection
