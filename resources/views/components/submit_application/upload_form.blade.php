@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/upload_form.css') }}">
<div class="container">
    <header class="upload-hdr">
        You’re now applying for a
        <span style="color: #2F96D0;">
            Height Clearance Permit / Height Limitation
        </span>
    </header>


    <form action="{{ route('submitApplication') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container py-5 h-100">
            <section>
                <header class="select-hdr">Select Type of Application:</header>
                <div class="mb-4 pb-2">
                    <div class="registration-input-flex">
                        <div class="building-type-block">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="permit_type" value="HCP" id="height_clearance_permit">
                                <label class="form-check-label" for="height_clearance_permit">
                                    Height Clearance Permit (HCP)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="permit_type" value="HL" id="height_limitation">
                                <label class="form-check-label" for="height_limitation">
                                    Height Limitation (HL)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="registration-input-flex">
                        <div class="building-type-block" id="buildingTypeContainer" style="display: none;">
                            <header class="select-hdr">Please specify building type:</header>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="building_type" value="Permanent" id="permanent">
                                <label class="form-check-label" for="permanent">
                                    Permanent Structure
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="building_type" value="Temporary" id="temporary">
                                <label class="form-check-label" for="temporary">
                                    Temporary Structure <span style="font-style: italic;">(e.g. Crane, Temporary Elevator Housing, etc.)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section class="elevation-plan" id="elevationPlanSection">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">1</h2>
                    </div>
                    <header class="section-hdr">Elevation Plan of the Proposed Structure</header>
                </div>

                <div class="row m-4 p-3">
                    <div class="mb-4 pb-2">
                        <input type="file" name="elevation_plan" id="elevation_plan" class="file-upload-input" accept=".pdf">
                    </div>
                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Date of Submission</label>
                            <input id="submission_date" type="date" name="submission_date" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="mb-4 pb-2">
                        <label for="type_of_structure">Type of Structure</label>
                        <div class="dropdown">
                            <select name="type_of_structure" id="type_of_structure" class="form-control form-control-lg">
                                <option value="">Select a Type</option>
                                <option value="Residential">Residential</option>
                                <option value="Commercial">Commercial</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="extension_desc">Extension Description</label>
                            <input type="text" name="extension_desc" id="extension_desc" class="form-control" value="{{ old('extension_desc') }}" placeholder="Enter extension description">
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev2">Proposed Height</label>
                            <input type="number" id="proposed_height" name="proposed_height" class="form-control form-control-lg" />
                            <p style="font-style: italic;" for="form3Examplev2">(meters above ground level)</p>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Height of Existing Structure</label>
                            <input type="number" id="height_of_existing_structure" name="height_of_existing_structure" class="form-control form-control-lg" />
                            <p style="font-style: italic;" for="form3Examplev2">(meters above ground level)</p>
                        </div>
                    </div>
                </div>


            </section>

            <section class="geodetic-cert">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">2</h2>
                    </div>
                    <header class="section-hdr">Geodetic Engineer's Certificate</header>
                </div>

                <div class="row m-4 p-3">
                    <div class="form-group">
                        <input type="file" name="geodetic_eng_cert" id="geodetic_eng_cert" accept=".pdf">
                    </div>
                    <div class="coordinate-block">
                        <div class="col-md-2 mb-4 pb-2">
                            <label for="latitude" class="form-label">Latitude: <span style="font-style: italic; color:#575757;">(N)</span></label>
                            <div class="coordinate-fields">
                                <input type="number" placeholder="deg" id="lat_deg" name="lat_deg" class="coord-inp" required>
                                <input type="number" placeholder="min" id="lat_min" name="lat_min" class="coord-inp" required>
                                <input type="number" placeholder="sec" id="lat_sec" name="lat_sec" class="coord-inp" required>
                            </div>

                        </div>
                        <div class="col-md-2 mb-4 pb-2">
                            <label for="latitude" class="form-label">Longitude: <span style="font-style: italic; color:#575757;">(E)</span></label>
                            <div class="coordinate-fields">
                                <input type="number" placeholder="deg" id="long_deg" name="long_deg" class="coord-inp" required>
                                <input type="number" placeholder="min" id="long_min" name="long_min" class="coord-inp" required>
                                <input type="number" placeholder="sec" id="long_sec" name="long_sec" class="coord-inp" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Orthometric Height</label>
                            <input type="number" name="orthometric_height" id="orthometric_height" class="form-control form-control-lg" placeholder="Enter Height Measure" required>
                        </div>
                    </div>

                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Site Location/Address</label>
                            <input type="text" name="site_address" id="site_address" placeholder="Street, City, Province" class="form-control form-control-lg" required />
                        </div>
                    </div>
                </div>
            </section>

            <section class="control-station">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">3</h2>
                    </div>
                    <header class="section-hdr">Control Station/s</header>
                </div>
                <div class="row m-4 p-3">
                    <div class="mb-4 pb-2">
                        <div class="form-group">
                            <input type="file" name="control_station" id="control_station" accept=".pdf">
                        </div>
                    </div>
                </div>



            </section>
            <section class="location-plan">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">4</h2>
                    </div>
                    <header class="section-hdr">Location Plan</header>
                </div>
                <div class="row m-4 p-3">
                    <div class="mb-4 pb-2">
                        <div class="form-group">
                            <input type="file" name="loc_plan" id="loc_plan" accept=".pdf">
                        </div>
                    </div>
                </div>

            </section>
            <section class="comp-process-report">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">5</h2>
                    </div>
                    <header class="section-hdr">Computation and/or Processing Report</header>
                </div>
                <div class="row m-4 p-3">
                    <div class="mb-4 pb-2">
                        <div class="form-group">
                            <input type="file" name="comp_process_report" id="comp_process_report" accept=".pdf">
                        </div>
                    </div>
                </div>

            </section>
            <section class="additional-req">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">6</h2>
                    </div>
                    <header class="section-hdr" id="sectionHeader">Additional Requirements for Temporary Structure</header>
                </div>
                <div class="row m-4 p-3">
                    <div class="add-req-main" id="additionalReqSection">
                        <div class="mb-4 pb-2">
                            <div class="form-group">
                                <input type="file" name="additional_req" id="additional_req" accept=".pdf">
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <div class="btn-set">
                <button type="submit" class="button-24">Proceed to Payment</button>
            </div>

        </div>
    </form>

</div>

<script>
    // Get the radio buttons
    const elevationPlanSection = document.querySelector('.elevation-plan');
    const additionalReqSection = document.querySelector('.additional-req');
    const permitTypeRadio = document.querySelectorAll('input[name="permit_type"]');
    const buildingTypeRadio = document.querySelectorAll('input[name="building_type"]');

    permitTypeRadio.forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (radio.value === 'HCP') {
                // If "Height Clearance Permit" is selected, show the "Permanent" and "Temporary" radios
                buildingTypeContainer.style.display = 'block';
            } else {
                // If "Height Limitation" or any other option is selected, hide the "Permanent" and "Temporary" radios
                buildingTypeContainer.style.display = 'none';
            }
        });
    });

    function handleTypeChange() {
        const selectedPermitType = document.querySelector('input[name="permit_type"]:checked');
        const selectedBuildingType = document.querySelector('input[name="building_type"]:checked');

        if (selectedPermitType && selectedPermitType.value === 'HL') {
            // Hide elevation plan for Height Limitation
            elevationPlanSection.style.display = 'none';
            additionalReqSection.style.display = 'none';
        } else if (selectedBuildingType && selectedBuildingType.value === 'Permanent') {
            // Hide elevation plan for Permanent building type
            elevationPlanSection.style.display = 'none';
        } else {
            // Show elevation plan for other cases
            elevationPlanSection.style.display = 'block';
            additionalReqSection.style.display = 'block';
        }
    }


    // Add event listener to permit type and building type radio buttons
    permitTypeRadio.forEach(function(radio) {
        radio.addEventListener('change', handleTypeChange);
    });

    buildingTypeRadio.forEach(function(radio) {
        radio.addEventListener('change', handleTypeChange);
    });

    // Trigger the initial state based on the default selected values
    handleTypeChange();
    // Add an event listener to the permit type radio buttons
</script>

<script>
    // Get the current date in the format YYYY-MM-DD
    const currentDate = new Date().toISOString().split('T')[0];

    // Set the value of the date input field to the current date
    document.getElementById('submission_date').value = currentDate;
</script>
@endsection
