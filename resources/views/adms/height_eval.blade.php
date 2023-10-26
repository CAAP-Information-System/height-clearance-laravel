@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/height_eval.css') }}">
<div class="container">
    <div class="eval-main">
        <form method="POST" action="{{ route('updateHeightEvaluation', ['id' => $user->id]) }}">
            @csrf
            <header class="eval-hdr">
                You’re now in <span style="color: #2F96D0;">Height Evaluation</span>
            </header>
            <h2 class="mt-3">Application Number: {{$applicationData->application_number}}</h2>

            <div class="document-views">
                <div class="file-group">
                    <div class="left-panel">
                        <label>Elevation Plan of the Structure:</label>
                        <label>Geodetic Engineer's Certificate:</label>
                        <label>Location Plan:</label>
                    </div>

                    <div class="right-panel">
                        <a class="button-22" href="{{ asset('storage/elev_plan/' . $applicationData->elev_plan) }}" target="_blank">View</a>
                        <a class="button-22" href="{{ asset('storage/geodetic_eng_cert/' . $applicationData->geodetic_eng_cert) }}" target="_blank">View</a>
                        <a class="button-22" href="{{ asset('storage/loc_plan/' . $applicationData->loc_plan) }}" target="_blank">View</a>
                    </div>

                </div>
            </div>

            <div class="data">
                <div>
                    <header class="data-hdr">Owner Data</header>
                    <div class="data-field">
                        <div class="data-left">
                            <div class="data-label">Name of Structure Owner</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->user->first_name . ' ' . $applicationData->user->last_name}}" readonly>
                            </div>

                            <div class="data-label">Type of Structure</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->type_of_structure}}" readonly>
                            </div>
                        </div>

                        <div class="data-right">
                            <div class="data-label">Type of Application</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->permit_type}}" readonly>
                            </div>

                            <div class="data-label">Extension Description</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->extension_desc}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <header class="data-hdr">Proposed Structure Data</header>
                    <div class="data-field">
                        <div class="data-left">
                            <div class="data-label">Proposed Height</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->proposed_height}}" readonly>
                            </div>

                            <div class="data-label">Latitude (N)</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->lat_deg}} {{$applicationData->lat_min}} {{$applicationData->lat_sec}}" readonly>
                            </div>

                            <div class="data-label">Type of HCP Permanent</div>
                            <div class="data-value">
                                <input type="text" value="N/A" readonly>
                            </div>
                        </div>

                        <div class="data-right">
                            <div class="data-label">Height of Existing</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->height_of_existing_structure}}" readonly>
                            </div>
                            <div class="data-label">Longitude (E)</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->long_deg}} {{$applicationData->long_min}} {{$applicationData->long_sec}}" readonly>
                            </div>

                            <div class="data-label">Orthometric Height</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->orthometric_height}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <header class="data-hdr">Structure Address</header>
                    <div class="data-field">
                        <div class="data-left">
                            <div class="data-label">Site Location/Address</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->site_address}}" readonly>
                            </div>

                            <div class="data-label">Reference Aerodome/Facility</div>
                            <div class="data-value">
                                <input type="text" value="N/A" readonly>
                            </div>
                            <div class="data-label">Maximum Allowed Top Elevation</div>
                            <div class="data-value">
                                <input type="text" value="N/A" readonly>
                            </div>
                            <div class="data-label">Remarks</div>
                            <div class="data-value">
                                <input type="text" value="N/A" readonly>
                            </div>
                        </div>
                        <div class="data-right">
                            <div class="data-label">Proposed Top Elevation</div>
                            <div class="data-value">
                                <input type="text" value="N/A" readonly>
                            </div>

                            <div class="data-label">Evaluation Result (Approved or Denied)</div>
                            <div class="data-value">
                                <input type="text" value="N/A" readonly>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
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
                <input type="hidden" name="evaluation_status" value="Evaluated"> <!-- or "not_complied" -->
                <button class="btn btn-success" type="submit">Evaluated</button>
        </form>
    </div>

</div>
@endsection
