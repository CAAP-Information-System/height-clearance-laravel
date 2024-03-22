@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/chief.css') }}">
<div class="container">

    <div class="eval-main">
        <form method="POST" action="{{ route('ANSChiefUpdate', ['id' => $user->id]) }}">
            @csrf
            <header class="eval-hdr">
                Final Height Application Review for <span style="color: #2F96D0;">Evaluation Chief</span>
            </header>
            <p class="eval-subhdr">The application has been successfully reviewed by the ADMS Checker/Supervisor.</p>
            <h2 class="mt-3">Application Number: {{$applicationData->application_number}}</h2>

            <div class="document-views">
                <div class="file-group">
                    <div class="left-panel">
                        @unless($applicationData->permit_type !='HCP' && $applicationData->building_type !='Temporary'&& $applicationData->building_type !='Permanent')
                        <label>Elevation Plan of the Structure:</label>
                        @endunless
                        <label>Geodetic Engineer's Certificate:</label>
                        <label>Location Plan:</label>
                    </div>
                    @if ($files && $receipt)
                    <div class="right-panel">
                        @unless($applicationData->permit_type !='HCP' && $applicationData->building_type !='Temporary'&& $applicationData->building_type !='Permanent')
                        <a class="button-22" href="{{ asset('storage/elevation_plan/' . $files->elevation_plan) }}" target="_blank">View</a>
                        @endunless
                        <a class="button-22" href="{{ asset('storage/geodetic_eng_cert/' . $files->geodetic_eng_cert) }}" target="_blank">View</a>
                        <a class="button-22" href="{{ asset('storage/loc_plan/' . $files->loc_plan) }}" target="_blank">View</a>
                    </div>
                    @endif
                </div>
            </div>

            <main class="eval-data">
                <section class="owner-info mb-4">
                    <header class="section-header">Owner Information</header>
                    <hr style="border: 1px solid #3b3b3b;">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name of Structure Owner:</label>
                                <p>{{ $userData->owner_fname }} {{ $userData->owner_lname }}</p>
                            </div>
                            <div class="form-group">
                                <label>Type of Structure:</label>
                                <p>{{$applicationData->type_of_structure}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type of Application:</label>
                                <p>
                                    @if($applicationData->permit_type == 'HCP')
                                    Height Clearance Permit
                                    @elseif($applicationData->permit_type == 'HL')
                                    Height Limitation
                                    @else
                                    {{$applicationData->permit_type}}
                                    @endif
                                </p>
                            </div>
                            <div class="form-group"  style="max-height: 200px; overflow-y: auto;">
                                <label>Extension Description:</label>
                                <p>{{$applicationData->extension_desc}}</p>
                            </div>
                        </div>

                    </div>
                </section>

                <section class="proposed-struct-info mb-4">
                    <header class="section-header"> Proposed Structure Information</header>
                    <hr style="border: 1px solid #3b3b3b;">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Proposed Height:</label>
                                <p>{{$applicationData->proposed_height}} meters</p>
                            </div>
                            <div class="form-group">
                                <label>Type of HCP Permit:</label>
                                <div class="card-subtitle mb-2 text-muted"><i>N/A if Application Type is Height Limitation</i></div>
                                <p>{{$applicationData->permit_type}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Height of Existing Structure:</label>
                                <p>{{$applicationData->height_of_existing_structure}} meters</p>
                            </div>
                            <div class="form-group"  style="max-height: 200px; overflow-y: auto;">
                                <label>Orthometric Height:</label>
                                <p>{{$applicationData->orthometric_height}} meters</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <header class="coordinates-hdr">Coordinates</header>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude:</label>
                                <p>{{$applicationData->long_deg}}°{{$applicationData->long_min}}'{{$applicationData->long_sec}}"N</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Latitude:</label>
                                <p>{{$applicationData->lat_deg}}°{{$applicationData->lat_min}}'{{$applicationData->lat_sec}}"E</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="stucture-address-info mb-4">
                    <header class="section-header">Stucture Address Information</header>
                    <hr style="border: 1px solid #3b3b3b;">
                    <div class="row mt-4">
                        <div class="col">
                            <div class="form-group">
                                <label>Site Address:</label>
                                <p>{{$applicationData->site_address}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Reference Aerodrome/Facility:</label>
                                <p>{{$aerodrome->reference_aerodrome}}</p>
                            </div>
                            <div class="form-group">
                                <label>Maximum Allowed Top Elevation:</label>
                                <p>{{$aerodrome->max_allowed_top_elev}} meters</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Proposed Top Elevation:</label>
                                <p>{{$aerodrome->proposed_top_elev}} meters</p>
                            </div>
                            <div class="form-group">
                                <label>Evaluation Result:</label>
                                <div class="eval">
                                    <h4 class="text-primary">Evaluator:</h4>
                                    <p class="result">
                                        @if($aerodrome->eval_result == 'Approved')
                                        <div class="approved">Approved</div>
                                        @elseif($aerodrome->eval_result == 'Denied')
                                        <div class="denied">Denied</div>
                                        @else
                                        <div class="none">No Approvals Found</div>
                                        @endif
                                    </p>
                                    <h4 class="text-primary">Supervisor/Checker:</h4>
                                    <p class="result">
                                        @if($aerodrome->supervisor_result == 'Approved')
                                        <div class="approved">Approved</div>
                                        @elseif($aerodrome->eval_result == 'Denied')
                                        <div class="denied">Denied</div>
                                        @else
                                        <div class="none">No Approvals Found</div>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Final Remarks:</label>
                                <p>{{$aerodrome->height_eval_remarks}}</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            </section>

            </main>



            <input type="hidden" name="evaluation_status" value="Evaluated">

            <div class="noted-btn-container">
                <button type="submit" class="noted-btn">
                    <i class="fa-solid fa-check"></i>
                    Noted
                </button>

            </div>
        </form>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all the 'Retain' checkboxes
        var retainCheckboxes = document.querySelectorAll('input[name^="retain_"]');

        // Add event listeners to each 'Retain' checkbox
        retainCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Get the associated input field
                var inputField = document.querySelector('[name="' + checkbox.id.replace('retain_', '') + '"]');

                // Set the readonly attribute based on the checkbox state
                inputField.readOnly = checkbox.checked;

                // If 'Retain' is checked, uncheck the 'Edit' checkbox
                if (checkbox.checked) {
                    var editCheckbox = document.querySelector('#edit_' + inputField.name);
                    if (editCheckbox) {
                        editCheckbox.checked = false;
                    }
                }
            });
        });

        var retainLatitudeCheckbox = document.getElementById('retain_latitude');
        var latitudeFields = [
            document.getElementsByName('latitude_deg')[0],
            document.getElementsByName('latitude_min')[0],
            document.getElementsByName('latitude_sec')[0]
        ];
        var retainLongitudeCheckbox = document.getElementById('retain_longitude');
        var longitudeFields = [
            document.getElementsByName('longitude_deg')[0],
            document.getElementsByName('longitude_min')[0],
            document.getElementsByName('longitude_sec')[0]
        ];

        retainLatitudeCheckbox.addEventListener('change', function() {
            latitudeFields.forEach(function(field) {
                field.readOnly = retainLatitudeCheckbox.checked;
            });

            // If 'Retain' is checked, uncheck the 'Edit' checkbox
            if (retainLatitudeCheckbox.checked) {
                var editLatitudeCheckbox = document.getElementById('edit_latitude');
                if (editLatitudeCheckbox) {
                    editLatitudeCheckbox.checked = false;
                }
            }
        });

        retainLongitudeCheckbox.addEventListener('change', function() {
            longitudeFields.forEach(function(field) {
                field.readOnly = retainLongitudeCheckbox.checked;
            });

            // If 'Retain' is checked, uncheck the 'Edit' checkbox
            if (retainLongitudeCheckbox.checked) {
                var editLongitudeCheckbox = document.getElementById('edit_longitude');
                if (editLongitudeCheckbox) {
                    editLongitudeCheckbox.checked = false;
                }
            }
        });
        // Add event listeners to the associated 'Edit' checkboxes
        var editCheckboxes = document.querySelectorAll('input[name^="edit_"]');
        editCheckboxes.forEach(function(editCheckbox) {
            editCheckbox.addEventListener('change', function() {
                // Get the associated input field
                var inputField = document.querySelector('[name="' + editCheckbox.id.replace('edit_', '') + '"]');

                // If 'Edit' is checked, uncheck the 'Retain' checkbox
                if (editCheckbox.checked) {
                    var retainCheckbox = document.querySelector('#retain_' + inputField.name);
                    if (retainCheckbox) {
                        retainCheckbox.checked = false;
                        inputField.readOnly = false;
                    }
                }
            });
        });
        // Get the dropdown and retain checkbox
        var dropdown = document.getElementById('selectedAirport');
        var retainCheckbox = document.getElementById('retain_reference_aerodrome');

        // Store the initial selected value
        var initialSelectedValue = dropdown.value;

        // Set initial disabled state based on retain checkbox
        dropdown.disabled = retainCheckbox.checked;

        // Store the selected value when the dropdown changes
        dropdown.addEventListener('change', function() {
            initialSelectedValue = this.value;
        });

        // Add event listener to the retain checkbox
        retainCheckbox.addEventListener('change', function() {
            // Update disabled state based on the retain checkbox
            dropdown.disabled = this.checked;

            // If retaining, restore the initial selected value
            if (this.checked) {
                dropdown.value = initialSelectedValue;
            }
        });
    });
</script>
@endsection
