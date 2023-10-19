@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/upload_form.css') }}">
<div class="container">
    <header class="upload-hdr">
        You’re now applying for a <span style="color: #2F96D0;">Height Clearance Permit / Height Limit</span>
    </header>
</div>
@if(session('success'))
<div class="alert alert-success">
    Your application has already been sent successfully.
</div>
@elseif (session('error'))
<div class="alert alert-danger">
    Sorry, your application can only be sent one at a time.
</div>
@endif
<form action="{{ route('submitApplication') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container py-5 h-100">

        <div class="form-group">
            <label for="images">Upload PDF</label>
            <input type="file" name="images" id="images" accept=".pdf">
        </div>

        <section class="structure-data">
            <div class="header-container">
                <div class="circle">
                    <h2 class="hdr-num">1</h2>
                </div>
                <header class="section-hdr">Proposed Structure/Site Data</header>
            </div>
            <div class="fields">

                <div class="row m-4 p-3">


                    <div class="col-md-6 mb-4 pb-2">
                        <label>
                            <input class="form-check-input" type="radio" name="permit_type" value="height_clearance_permit" required>
                            Height Clearance Permit (HCP)
                        </label>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                        <label>
                            <input class="form-check-input" type="radio" name="permit_type" value="height_clearance_permit">
                            Height Limitation (HL)
                        </label>
                    </div>

                    <div class="col-md-6 mb-4 pb-2" id="buildingTypeContainer" style="display: none;">

                        <label>
                            <input class="form-check-input" type="radio" name="building_type" value="permanent">
                            Permanent Structure
                        </label>
                    </div>
                    <div class="col-md-6 mb-4 pb-2" id="buildingTypeContainer" style="display: none;">
                        <label>
                            <input class="form-check-input" type="radio" name="building_type" value="temporary">
                            Temporary Structure <span style="font-style: italic;">(e.g. Crane, Temporary Elevator Housing, etc.)</span>
                        </label>
                    </div>

                    <div class="mb-4 pb-2">
                        <label for="type_of_structure">Type of Structure</label>
                        <select name="type_of_structure" id="type_of_structure" class="form-control form-control-lg">
                            <option value="">Select a Type</option>
                            <option value="Residential" {{ old('type_of_structure') == 'Residential' ? 'selected' : '' }}>Residential</option>
                            <option value="Commercial" {{ old('type_of_structure') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                        </select>
                    </div>
                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Site Address</label>
                            <input type="text" name="site_address" id="site_address" class="form-control form-control-lg" required />

                        </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev2">Proposed Height</label>
                            <input type="number" id="proposed_height" name="proposed_height" class="form-control form-control-lg" required />
                            <p style="font-style: italic;" for="form3Examplev2">(meters above ground level)</p>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Height of Existing Structure</label>
                            <input type="number" id="height_of_existing_structure" name="height_of_existing_structure" class="form-control form-control-lg" required />
                            <p style="font-style: italic;" for="form3Examplev2">(meters above ground level)</p>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 pb-2">
                        <div class="form-outline">
                            <label for="latitude" class="form-label">Latitude:</label>
                            <input type="number" id="lat_deg" name="lat_deg" class="form-control form-control-lg" required>
                            <input type="number" id="lat_min" name="lat_min" class="form-control form-control-lg" required>
                            <input type="number" id="lat_sec" name="lat_sec" class="form-control form-control-lg" required>

                        </div>

                    </div>
                    <div class="col-md-2 mb-4 pb-2">
                        <div class="form-outline">
                            <label for="latitude" class="form-label">Longitude:</label>
                            <input type="number" id="long_deg" name="long_deg" class="form-control form-control-lg" required>
                            <input type="number" id="long_min" name="long_min" class="form-control form-control-lg" required>
                            <input type="number" id="long_sec" name="long_sec" class="form-control form-control-lg" required>
                        </div>

                    </div>

                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Orthometric Height</label>
                            <input type="number" name="orthometric_height" class="form-control form-control-lg" required>
                        </div>
                    </div>

                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Date of Submission</label>
                            <input id="submission_date" type="date" name="submission_date" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Date of OR</label>
                            <input type="date" name="date_of_or" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <div class="mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev4">Official Receipt Number</label>
                            <input type="text" name="receipt_num" class="form-control form-control-lg" required>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <button type="submit" class="button-24" onclick="showSuccessModal()">Submit Application</button>

    </div>
</form>
</div>
<script>
    // Get the radio buttons
    const heightClearancePermitRadio = document.querySelector('input[name="permit_type"][value="height_clearance_permit"]');
    const permanentStructureRadio = document.querySelector('input[name="building_type"][value="permanent"]');
    const temporaryStructureRadio = document.querySelector('input[name="building_type"][value="temporary"]');

    // Add an event listener to the "Height Clearance Permit" radio button
    heightClearancePermitRadio.addEventListener('change', function() {
        if (this.checked) {
            // If "Height Clearance Permit" is selected, show the "Permanent" and "Temporary" radios
            permanentStructureRadio.parentElement.parentElement.style.display = 'block';
            temporaryStructureRadio.parentElement.parentElement.style.display = 'block';
        } else {
            // If not, hide the "Permanent" and "Temporary" radios
            permanentStructureRadio.parentElement.parentElement.style.display = 'none';
            temporaryStructureRadio.parentElement.parentElement.style.display = 'none';
        }
    });
</script>
<script>
    // Get the current date in the format YYYY-MM-DD
    const currentDate = new Date().toISOString().split('T')[0];

    // Set the value of the date input field to the current date
    document.getElementById('submission_date').value = currentDate;
</script>
@endsection
