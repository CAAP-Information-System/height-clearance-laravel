@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/owner_form.css') }}">
<div class="container">
    <header class="upload-hdr">
        Please enter the information of your <span style="color: #2F96D0;">Building Owner/Manager</span>
    </header>
</div>

<form action="{{ route('submitOwnerDetails') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container py-5 h-100">
        <section class="owner-information">
            <div class="header-container">
                <div class="circle">
                    <h2 class="hdr-num">1</h2>
                </div>
                <header class="section-hdr">Owner/Manager's Information</header>
            </div>

            <div class="row m-2 p-2">

                <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="form3Examplev2">First Name</label>
                        <input type="text" placeholder="e.g. Juan" id="owner_fname" name="owner_fname" class="form-control form-control-lg" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="form3Examplev3">Last Name</label>
                        <input type="text" placeholder="e.g. Dela Cruz" id="owner_lname" name="owner_lname" class="form-control form-control-lg" required />
                    </div>
                </div>
                <div class="mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="form3Examplev4">Email Address</label>
                        <input type="email" name="owner_email" id="owner_email" placeholder="e.g. juan@example.com" class="form-control form-control-lg" required />
                    </div>
                </div>
                <div class="mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="form3Examplev4">Residential Address</label>
                        <input type="text" name="owner_address" id="owner_address" placeholder="Street, City, Province" class="form-control form-control-lg" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="form3Examplev2">Landline Number</label>
                        <input type="number" placeholder="Enter Landline Number" id="owner_landline" name="owner_landline" class="form-control form-control-lg" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                        <label class="form-label" for="form3Examplev3">Mobile Number</label>
                        <input type="number" placeholder="Enter Mobile Number" id="owner_mobile" name="owner_mobile" class="form-control form-control-lg" required />
                    </div>
                </div>
            </div>
        </section>

        <div class="btn-set">
            <button type="submit" class="button-24">Proceed to Application Permit</button>
        </div>
    </div>
</form>
</div>
<script>
    // Get the radio buttons
    const permitTypeRadio = document.querySelectorAll('input[name="permit_type"]');
    const buildingTypeContainer = document.getElementById('buildingTypeContainer');

    // Add an event listener to the permit type radio buttons
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
</script>
@endsection
