@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin/view_application.css') }}">
<div class="container">
    <div class="owner-card">
        <h1>Application View</h1>
        <div>Applicant ID: {{ $applicationData->id }}</div>
        <div>
            Type of Application:
            @if($applicationData->permit_type == 'height_clearance_permit')
            Height Clearance Permit -

            @if($applicationData->building_type == 'permanent')
            Permanent
            @elseif($applicationData->building_type == 'temporary')
            Temporary
            @else
            None
            @endif
            @elseif($applicationData->permit_type == 'height_limitation')
            Height Limit Permit
            @endif

        </div>
        <div>Applicant Full Name: {{ $applicationData->user->first_name }} {{ $applicationData->user->last_name }}</div>
        <div>Site Address: {{ $applicationData->site_address}}</div>
    </div>


</div>
@endsection
