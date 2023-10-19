@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/doc_compliance.css') }}">
<div class="container">

    <div class="modal fade" id="applicantModal" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applicantModalLabel">Owner Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display application details here -->
                    <p>Type of Structure:
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
                    </p>
                    <p>Name of Structure Owner:
                        {{ $applicationData->user->first_name }}
                        {{ $applicationData->user->last_name }}
                    </p>
                    <p>Email Address: {{ $applicationData->user->email }}</p>
                    <p>Residence: {{ $applicationData->user->home_address }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>



    <header class="app-number">Application Number: </header>
    <div class="docs">
        <label for="">Application Information</label>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#applicantModal">
            View
        </button>
        <label for="">Filing Fee Receipt</label>
        <a href="#"  class="btn btn-info">View</a>
        <label for="">Elevation Plan of the Proposed Structure</label>
        <a href="#"  class="btn btn-info">View</a>
        <label for="">Geodetic Engineer’s Certificate (Form CAAP-ADM-AOD-002)</label>
        <a href="#"  class="btn btn-info">View</a>
        <label for="">Control Station/s</label>
        <a href="#"  class="btn btn-info">View</a>
        <label for="">Location Plan</label>
        <a href="#"  class="btn btn-info">View</a>
        <label for="">Additional Requirements for Temporary Structure</label>
        <a href="#"  class="btn btn-info">View</a>
    </div>

    <br>
    <button class="btn btn-success">Compliant</button>
    <button class="btn btn-danger">Not Compliant</button>
</div>
@endsection
