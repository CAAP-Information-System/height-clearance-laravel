@extends('layouts.app')

@section('content')
<div class="container">
    <div class="eval-main">
        <form method="POST" action="{{ route('updateEvaluation', ['id' => $user->id]) }}">
            @csrf
            <h2 class="mt-3">Application Number: {{$applicationData->application_number}}</h2>

            <div class="document-views mt-3">
                <div>Elevation Plan of the Proposed Structure <span><a href="#">View</a></span></div>
                <div>Geodetic Engineer's Certificate <span><a href="#">View</a></span></div>
                <div>Location Plan <span><a href="#">View</a></span></div>
            </div>

            <div class="eval-fields mt-4">
                <h3 class="app-data">Application Details</h3>
                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Orthometric Height</label>
                        <div>{{$applicationData->orthometric_height}}</div>

                        <label for="">Site Address</label>
                        <div>{{$applicationData->site_address}}</div>

                        <label for="">Reference Aerodrome/Facility</label>
                        <div>NA (to be added)</div>
                    </div>
                </div>
            </div>
            <br>
            <input type="hidden" name="crit_area_result" value="Outside"> <!-- or "not_complied" -->
            <button class="btn btn-success" type="submit">Outside</button>
        </form>
    </div>

</div>
@endsection
