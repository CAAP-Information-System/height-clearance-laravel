@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/supervisor.css') }}">
<div class="container">

    <div class="eval-main">
        <form method="POST" action="{{ route('ADMSSupervisorUpdate', ['id' => $user->id]) }}">
            @csrf
            <header class="eval-hdr">
                You’re now in <span style="color: #2F96D0;">Supervisor's Evaluation</span>
            </header>
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

            <div class="data">
                <div>
                    <header class="data-hdr">Owner Data</header>
                    <div class="data-field">
                        <div class="data-left">
                            <div class="data-label">Name of Structure Owner</div>
                            <div class="data-value">
                                <input type="text" name="owner_name" value="{{$userData->owner_fname . ' ' . $userData->owner_lname }}" readonly>
                            </div>
                            @unless($applicationData->permit_type !='HCP' && $applicationData->building_type !='Temporary'&& $applicationData->building_type !='Permanent')
                            <div class="data-label">Type of Structure</div>
                            <div class="data-value">
                                <input type="text" name="type_of_structure" value="{{$applicationData->type_of_structure}}" readonly>
                            </div>
                            @endunless
                        </div>

                        <div class="data-right">
                            <div class="data-label">Type of Application</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->permit_type}}" readonly>
                            </div>
                            @unless($applicationData->permit_type !='HCP' && $applicationData->building_type !='Temporary'&& $applicationData->building_type !='Permanent')
                            <div class="data-label">Extension Description</div>
                            <div class="data-value">
                                <input type="text" name="extension_desc" value="{{$applicationData->extension_desc}}" readonly>
                            </div>
                            @endunless
                        </div>
                    </div>
                </div>

                <div class="proposed-structure-data">
                    <header class="data-hdr">Proposed Structure Data</header>
                    <div class="data-field">
                        <div class="data-left">
                            @unless($applicationData->permit_type !='HCP' && $applicationData->building_type !='Temporary'&& $applicationData->building_type !='Permanent')
                            <div class="data-label">Proposed Height</div>
                            <div class="data-value">
                                <input name="proposed_height" type="text" value="{{$applicationData->proposed_height}}" style="width: 50%;">
                                <a class="edit-link" href="">Edit</a>
                                <label for="retain_proposed_height">Retain</label>
                                <input type="checkbox" id="retain_proposed_height" name="retain_proposed_height" value="1">
                            </div>
                            @endunless
                            <div class="data-label">Latitude (N)</div>
                            <div class="data-value">
                                <input type="text" name="latitude_deg" value="{{$applicationData->lat_deg}}" style="width: 15%;">
                                <input type="text" name="latitude_min" value="{{$applicationData->lat_min}}" style="width: 15%;">
                                <input type="text" name="latitude_sec" value="{{$applicationData->lat_sec}}" style="width: 15%;">

                                <a class="edit-link" href="">Edit</a>
                                <label for="retain_latitude">Retain</label>
                                <input type="checkbox" id="retain_latitude" name="retain_latitude" value="1">
                            </div>
                            @unless($applicationData->permit_type !='HCP' && $applicationData->building_type !='Permanent')
                            <div class="data-label">Type of HCP Permanent</div>
                            <div class="data-value">
                                <input name="type_of_hcp" type="text" placeholder="Enter data" style="width: 50%;">
                                <a class="edit-link" href="">Edit</a>
                                <label for="retain_type_of_hcp">Retain</label>
                                <input type="checkbox" id="retain_type_of_hcp" name="retain_type_of_hcp" value="1">
                            </div>
                            @endunless
                        </div>
                        <div class="data-right">
                            @unless($applicationData->permit_type !='HCP' && $applicationData->building_type !='Temporary'&& $applicationData->building_type !='Permanent')
                            <div class="data-label">Height of Existing</div>
                            <div class="data-value">
                                <input type="text" value="{{$applicationData->height_of_existing_structure}}" style="width: 50%;">
                                <a class="edit-link" href="">Edit</a>
                                <label for="retain_owner_name">Retain</label>
                                <input type="checkbox" id="retain_owner_name" name="retain_owner_name" value="1">
                            </div>
                            @endunless
                            <div class="data-label">Longitude (E)</div>
                            <div class="data-value">
                                <input type="text" name="longitude_deg" value="{{$applicationData->long_deg}}" style="width: 15%;">
                                <input type="text" name="longitude_min" value="{{$applicationData->long_min}}" style="width: 15%;">
                                <input type="text" name="longitude_sec" value="{{$applicationData->long_sec}}" style="width: 15%;">
                                <a class="edit-link" href="">Edit</a>
                                <label for="retain_longitude">Retain</label>
                                <input type="checkbox" id="retain_longitude" name="retain_longitude" value="1">
                            </div>

                            <div class="data-label">Orthometric Height</div>
                            <div class="data-value">
                                <input name="orthometric_height" type="text" value="{{$applicationData->orthometric_height}}" style="width: 40%;">
                                <a class="edit-link" href="">Edit</a>
                                <label for="retain_orthometric_height">Retain</label>
                                <input type="checkbox" id="retain_orthometric_height" name="retain_orthometric_height" value="1">
                            </div>
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
                            <input type="text" value="{{$applicationData->site_address}}">
                            <a class="edit-link" href="">Edit</a>
                            <label for="retain_orthometric_height">Retain</label>
                            <input type="checkbox" id="retain_orthometric_height" name="retain_orthometric_height" value="1">
                        </div>

                        <div class="data-label">Reference Aerodome/Facility</div>
                        <div class="data-value">
                            <div class="data-value">
                                <input class="airport" name="reference_aerodrome" type="text" value="{{$aerodrome->reference_aerodrome}}">
                                <a class="edit-link" href="">Edit</a>
                                <label for="retain_reference_aerodrome">Retain</label>
                                <input type="checkbox" id="retain_reference_aerodrome" name="retain_reference_aerodrome" value="1">
                            </div>

                        </div>
                        <div class="data-label">Maximum Allowed Top Elevation</div>
                        <div class="data-value">
                            <input type="text" name="max_allowed_top_elev" value="{{$aerodrome->max_allowed_top_elev}}" placeholder="Enter data">
                            <a class="edit-link" href="">Edit</a>
                            <label for="retain_max_allowed_top_elev">Retain</label>
                            <input type="checkbox" id="retain_max_allowed_top_elev" name="retain_max_allowed_top_elev" value="1">
                        </div>

                        <div class="data-label">Remarks</div>
                        <div class="data-value">
                            <input type="text" name="height_eval_remarks" value="{{$aerodrome->height_eval_remarks}}" placeholder="Enter data">
                            <a class="edit-link" href="">Edit</a>
                            <label for="retain_height_eval_remarks">Retain</label>
                            <input type="checkbox" id="retain_height_eval_remarks" name="retain_height_eval_remarks" value="1">
                        </div>
                    </div>
                    <div class="data-right">
                        <div class="data-label">Proposed Top Elevation</div>
                        <div class="data-value">
                            <input type="text" name="proposed_top_elev" value="{{$aerodrome->proposed_top_elev}}" placeholder="Enter data">
                            <a class="edit-link" href="">Edit</a>
                            <label for="retain_proposed_top_elev">Retain</label>
                            <input type="checkbox" id="retain_proposed_top_elev" name="retain_proposed_top_elev" value="1">
                        </div>

                        <div class="data-label">Evaluation Result (Approved or Denied)</div>
                        <div class="data-value">
                            <input type="text" name="eval_result_choice" value="{{$aerodrome->eval_result_choice}}" placeholder="Enter data">
                            <a class="edit-link" href="">Edit</a>
                            <label for="retain_reval_result_choice">Retain</label>
                            <input type="checkbox" id="retain_eval_result_choice" name="retain_eval_result_choice" value="1">
                        </div>
                    </div>

                </div>
            </div>
            <input type="hidden" name="evaluation_status" value="Evaluated">

            <div class="checked-btn-container">
                <button type="submit" class="checked-btn">
                    <i class="fa-solid fa-check"></i>
                    Reviewed
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
