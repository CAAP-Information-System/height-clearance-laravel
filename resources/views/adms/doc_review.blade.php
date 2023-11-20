@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/doc_review.css') }}">
<div class="container">
    <form method="post" action="{{ route('generate-pdf') }}" target="_blank">
        @csrf
        <button class="btn btn-info" type="submit">view</button>
    </form>
    <form method="POST" action="{{ route('updateCompliance', ['id' => $applicationData->id]) }}">
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
                                    @if($applicationData->permit_type == 'HCP')
                                    Height Clearance Permit -
                                    @if($applicationData->building_type == 'Temporary')
                                    Temporary
                                    @elseif($applicationData->building_type == 'Temporary')
                                    Temporary
                                    @else
                                    None
                                    @endif
                                    @elseif($applicationData->permit_type == 'HL')
                                    Height Limitation
                                    @endif
                                </p>
                            </div>

                            <div class="detail">
                                <label class="detail-label">Name of Structure Owner:</label>
                                <p class="detail-value">
                                    {{ $applicationData->owner->owner_fname }}
                                    {{ $applicationData->owner->owner_lname }}
                                </p>
                            </div>

                            <div class="detail">
                                <label class="detail-label">Email Address:</label>
                                <p class="detail-value">{{ $applicationData->owner->owner_email }}</p>
                            </div>

                            <div class="detail">
                                <label class="detail-label">Residence:</label>
                                <p class="detail-value">{{ $applicationData->owner->owner_address }}</p>
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
                        <label><input type="radio" name="app_comp" value="NotComplied"> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="application_info_remarks" id="application_info_remarks">
                </div>
            </div>



            @if ($files && $receipt)
            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">2. Filing Fee Receipt</label>
                    <a href="">View Elevation Plan</a>
                    <a class="button-5" href="{{ asset('storage/fee_receipt/' . $receipt->fee_receipt) }}" target="_blank">View Fee Receipt</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="fee_comp" value="NotComplied"> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="" id="">
                </div>
            </div>
            @unless($applicationData->permit_type != 'HCP' && $applicationData->building_type != 'Temporary')
            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">3. Elevation Plan of the Proposed Structure</label>
                    <a class="button-5" href="{{ asset('storage/elevation_plan/' . $files->elevation_plan) }}" target="_blank">View Elevation Plan</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="ep_comp" value="NotComplied"> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="elev_plan_remarks" id="elev_plan_remarks">
                </div>
            </div>
            @endunless
            <div class="doc-grp">
                <div class="left-col">
                    @unless($applicationData->permit_type != 'HCP' && $applicationData->building_type != 'Temporary')
                    <label class="doc-label" for="">4. Geodetic Engineer’s Certificate</label>
                    @else
                    <label class="doc-label" for="">3. Geodetic Engineer’s Certificate</label>
                    @endunless
                    <a class="button-5" href="{{ asset('storage/geodetic_cert/' . $files->geodetic_cert) }}" target="_blank">View Geodetic Engineer Certificate</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="ge_comp" value="NotComplied"> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="geodetic_eng_remarks" id="">
                </div>
            </div>

            <div class="doc-grp">
                <div class="left-col">
                    @unless($applicationData->permit_type != 'HCP' && $applicationData->building_type != 'Temporary')
                    <label class="doc-label" for="">5. Control Station/s</label>
                    @else
                    <label class="doc-label" for="">4. Control Station/s</label>
                    @endunless

                    <a class="button-5" href="{{ asset('storage/control_station/' . $files->control_station) }}" target="_blank">View Control Station</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="cs_comp" value="NotComplied"> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="control_station_remarks" id="">
                </div>
            </div>

            <div class="doc-grp">
                <div class="left-col">
                    @unless($applicationData->permit_type != 'HCP' && $applicationData->building_type != 'Temporary')
                    <label class="doc-label" for="">6. Location Plan</label>
                    @else
                    <label class="doc-label" for="">5. Location Plan</label>
                    @endunless

                    <a class="button-5" href="{{ asset('storage/loc_plan/' . $files->loc_plan) }}" target="_blank">View Location Plan</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="lp_comp" value="NotComplied"> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="loc_plan_remarks" id="">
                </div>
            </div>

            @unless($applicationData->permit_type != 'HCP' && $applicationData->building_type != 'Temporary')
            <div class="doc-grp">
                <div class="left-col">
                    <label class="doc-label" for="">7. Computations and/or Process Report</label>
                    <a class="button-5" href="{{ asset('storage/comp_process_report/' . $files->comp_process_report) }}" target="_blank">View Process Report</a>
                </div>
                <div class="right-col">
                    <header class="remarks-header">Remarks:</header>
                    <div class="radios">
                        <label><input type="radio" name="cp_comp" value="NotComplied"> Not Complied</label>
                    </div>
                    <input class="remarks" type="text" placeholder="Enter remarks here" name="comp_process_report_remarks" id="">
                </div>
            </div>
            @endunless
        </div>
        @else
        <h1>No files found.</h1>
        @endif
        <br>
        <input type="hidden" name="doc_compliance_result" value="Complied">
        <div class="btn-set">
            <button class="complied" type="submit">Complied</button>
        </div>
    </form>

</div>

<script>
    $(document).ready(function() {
        // Function to check if any "Not Complied" radio button is selected
        function anyNotCompliedSelected() {
            return $('input[type=radio][name$=_comp]:checked[value=NotComplied]').length > 0;
        }

        // Function to toggle visibility based on radio button selection
        function toggleRemarksVisibility(radioValue, remarksField) {
            if (radioValue === 'NotComplied') {
                remarksField.show();
            } else {
                remarksField.hide();
            }
        }

        // Attach change event listener to radio buttons
        $('input[type=radio][name$=_comp]').change(function() {
            var remarksField = $(this).closest('.doc-grp').find('.remarks');
            toggleRemarksVisibility($(this).val(), remarksField);

            // Update the text of the "Complied" button and hidden input value based on selection
            updateCompliedButtonText();
        });

        // Initially hide all remarks fields
        $('.remarks').hide();

        // Trigger change event for initially selected radio buttons
        $('input[type=radio][name$=_comp]:checked').change();

        // Function to update the text of the "Complied" button and hidden input value
        function updateCompliedButtonText() {
            var compliedButton = $('.complied');
            var hiddenInput = $('input[name="doc_compliance_result"]');
            var isForEvalInput = $('input[name="is_ForEval"]');
            if (anyNotCompliedSelected()) {
                compliedButton.text('Not Complied');
                hiddenInput.val('Not Complied');
                isForEvalInput.val('0'); // Set is_ForEval to 0 for Not Complied
            } else {
                compliedButton.text('Complied');
                hiddenInput.val('Complied');
                isForEvalInput.val('1'); // Set is_ForEval to 1 for Complied
            }
        }

        // Update the text of the "Complied" button and hidden input value initially
        updateCompliedButtonText();
    });
</script>
<script>
    $(document).ready(function() {
        // Function to toggle visibility based on radio button selection
        function toggleRemarksVisibility(radioValue, remarksField) {
            if (radioValue === 'NotComplied') {
                remarksField.show();
            } else {
                remarksField.hide();
            }
        }

        // Attach change event listener to radio buttons
        $('input[type=radio][name$=_comp]').change(function() {
            var remarksField = $(this).closest('.doc-grp').find('.remarks');
            toggleRemarksVisibility($(this).val(), remarksField);
        });

        // Initially hide all remarks fields
        $('.remarks').hide();

        // Trigger change event for initially selected radio buttons
        $('input[type=radio][name$=_comp]:checked').change();
    });
</script>
@endsection
