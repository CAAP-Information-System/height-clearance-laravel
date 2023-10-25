@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/doc_review.css') }}">
<div class="container">
    <form method="POST" action="{{ route('updateCompliance', ['id' => $user->id]) }}">
        @csrf

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
                        <div class="application-details">
                            <div class="detail">
                                <label class="detail-label">Type of Structure:</label>
                                <p class="detail-value">
                                    @if($applicationData->user->permit_type == 'height_clearance_permit')
                                    Height Clearance Permit -
                                    @if($applicationData->user->building_type == 'permanent')
                                    Permanent
                                    @elseif($applicationData->user->building_type == 'temporary')
                                    Temporary
                                    @else
                                    None
                                    @endif
                                    @elseif($applicationData->permit_type == 'height_limitation')
                                    Height Limit Permit
                                    @endif
                                </p>
                            </div>

                            <div class="detail">
                                <label class="detail-label">Name of Structure Owner:</label>
                                <p class="detail-value">
                                    {{ $applicationData->user->first_name }}
                                    {{ $applicationData->user->last_name }}
                                </p>
                            </div>

                            <div class="detail">
                                <label class="detail-label">Email Address:</label>
                                <p class="detail-value">{{ $applicationData->user->email }}</p>
                            </div>

                            <div class="detail">
                                <label class="detail-label">Residence:</label>
                                <p class="detail-value">{{ $applicationData->user->home_address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
                    </div>
                </div>
            </div>
        </div>

        <header class="application-number">Application Number: {{$applicationData->application_number}} </header>
        <div class="docs">
            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">1. Application Information</label>
                    <button type="button" class="button-5" data-toggle="modal" data-target="#applicantModal">
                        View Application Information
                    </button>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="app_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="app_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="application_info_remarks" id="application_info_remarks">
                </div>
            </div>



            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">2. Filing Fee Receipt</label>
                    <a class="button-5" href="{{ asset('storage/fee_receipt/' . $applicationData->fee_receipt) }}" target="_blank">View Payment Receipt</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="fee_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="fee_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="" id="">
                </div>
            </div>

            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">3. Elevation Plan of the Proposed Structure</label>
                    <a class="button-5" href="{{ asset('storage/elevation_plan/' . $applicationData->elevation_plan) }}" target="_blank">View Elevation Plan</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="ep_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="ep_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="elev_plan_remarks" id="elev_plan_remarks">
                </div>

            </div>

            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">4. Geodetic Engineer’s Certificate</label>
                    <a class="button-5" href="{{ asset('storage/geodetic_eng_cert/' . $applicationData->geodetic_eng_cert) }}" target="_blank">View Geodetic Engineer Certificate</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="ge_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="ge_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="geodetic_eng_remarks" id="">
                </div>
            </div>

            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">5. Control Station/s</label>
                    <a class="button-5" href="{{ asset('storage/control_station/' . $applicationData->control_station) }}" target="_blank">View Control Station</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="cs_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="cs_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="control_station_remarks" id="">
                </div>
            </div>

            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">6. Location Plan</label>
                    <a class="button-5" href="{{ asset('storage/loc_plan/' . $applicationData->loc_plan) }}" target="_blank">View Location Plan</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="lp_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="lp_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="loc_plan_remarks" id="">
                </div>
            </div>

            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">7. Computations and/or Process Report</label>
                    <a class="button-5" href="{{ asset('storage/comp_process_report/' . $applicationData->comp_process_report) }}" target="_blank">View Process Report</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="cp_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="cp_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="comp_process_report_remarks" id="">
                </div>
            </div>
            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">8. Additional Requirements for Temporary Structure</label>
                    <a class="button-5" href="{{ asset('storage/additional_req/' . $applicationData->additional_req) }}" target="_blank">View Additional Requirements</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="ar_comp" value="Complied" required> Complied</label>
                        <label><input type="radio" name="ar_comp" value="NotComplied" required> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="additional_req_remarks" id="">
                </div>
            </div>
        </div>

        <br>
        <input type="hidden" name="doc_compliance_result" value="Complied"> <!-- or "not_complied" -->
        <div class="btn-set">
            <button class="complied" type="submit">Complied</button>
        </div>
        <!-- <button class="btn btn-danger">Not Compliant</button> -->
    </form>
</div>
@endsection

