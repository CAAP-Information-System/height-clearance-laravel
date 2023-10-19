@extends('layouts.app')

@section('content')
<div class="container">
    <div class="eval-main">
        <header>Application Number: {{$applicationData->application_number}}</header>

        <div class="document-views">
            <div>Elevation Plan of the Proposed Structure <span><a href="#">View</a></span></div>
            <div>Geodetic Engineer's Certificate <span><a href="#">View</a></span></div>
            <div>Location Plan <span><a href="#">View</a></span></div>
        </div>

        <div class="eval-fields">
            <header class="app-data">Application Details</header>
            <label for="">Name of Structure Owner</label>
            <div>
                {{$applicationData->user->first_name}}
                {{$applicationData->user->last_name}}
            </div>
            <label for="">Type of Application</label>
            <div>{{$applicationData->permit_type}}</div>
            <label for="">Type of Structure</label>
            <div>{{$applicationData->type_of_structure}}</div>
            <label for="">Extension Description</label>
            <div>NA (to be added)</div>
            <label for="">Proposed Height</label>
            <div>{{$applicationData->proposed_height}}</div>
            <label for="">Type of HCP Permanent</label>
            <div>NA (to be added)</div>
            <label for="">Latitude</label>
            <div>
                {{$applicationData->lat_deg}}
                {{$applicationData->lat_min}}
                {{$applicationData->lat_sec}}
            </div>
            <label for="">Longitude</label>
            <div>
                {{$applicationData->long_deg}}
                {{$applicationData->long_min}}
                {{$applicationData->long_sec}}
            </div>
            <label for="">Orthometric Height</label>
            <div>{{$applicationData->orthometric_height}}</div>
            <label for="">Site Address</label>
            <div>{{$applicationData->site_address}}</div>
            <label for="">Reference Aerodrome/Facility</label>
            <div>NA (to be added)</div>
        </div>
    </div>
    <a href="{{ route('documentary-compliance', ['id' => $applicationData->id]) }}" class="btn btn-primary">View Application</a>
</div>
@endsection
