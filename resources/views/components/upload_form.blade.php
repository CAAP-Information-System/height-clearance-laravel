@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/upload_form.css') }}">
<div class="container">
    <header class="upload-hdr">You’re now applying for a <span style="color: #2F96D0;">Height Clearance Permit / Height Limit</span></header>
    <form action="{{ route('submitApplication') }}" method="post">
        @csrf
        <div class="container py-5 h-100">
            <section class="applicant-data">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">1</h2>
                    </div>
                    <header class="section-hdr">Application/Owner Data</header>
                </div>
                <div class="fields">
                    <div class="row m-4 p-3">
                        <header class="selection-label">Type of Application:</header>
                        <div class="col-md-6 mb-4 pb-2">
                            <label>
                                <input class="form-check-input" type="radio" name="permit_type" value="height_clearance_permit">
                                Height Clearance Permit
                            </label>
                        </div>
                        <div class="col-md-6 mb-4 pb-2">
                            <label>
                                <input class="form-check-input" type="radio" name="permit_type" value="height_limitation">
                                Height Limitation
                            </label>
                        </div>
                        <header class="selection-label">If HCP is selected:</header>
                        <div class="col-md-6 mb-4 pb-2">
                            <label>
                                <input class="form-check-input" type="radio" name="building_type" value="permanent">
                                Permanent Structure
                            </label>
                        </div>
                        <div class="col-md-6 mb-4 pb-2">
                            <label>
                                <input class="form-check-input" type="radio" name="building_type" value="temporary">
                                Temporary Structure
                            </label>
                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev2">First name</label>
                                <input type="text" id="fname" name="fname" class="form-control form-control-lg" required />

                            </div>

                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Last name</label>
                                <input type="text" id="lname" name="lname" class="form-control form-control-lg" required />

                            </div>

                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4" required>Email Address</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg" required />

                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4" required>Owner's Address</label>
                                <input type="text" name="owner_address" id="owner_address" class="form-control form-control-lg" required />

                            </div>
                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev2">Landline Number</label>
                                <input type="text" id="landline" name="landline" class="form-control form-control-lg" required />

                            </div>

                        </div>
                        <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Mobile Number</label>
                                <input type="text" id="mobile" name="mobile" class="form-control form-control-lg" required />
                            </div>

                        </div>

                    </div>
                </div>
            </section>
            <section class="structure-data">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">2</h2>
                    </div>
                    <header class="section-hdr">Proposed Structure/Site Data</header>
                </div>
                <div class="fields">
                    <div class="row m-4 p-3">
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <input type="text" name="type_of_structure" id="type_of_structure" class="form-control form-control-lg" required />
                                <label class="form-label" for="form3Examplev4">Type of Structure</label>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <input type="text" name="site_address" id="site_address" class="form-control form-control-lg" required />
                                <label class="form-label" for="form3Examplev4">Site Address</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev2">Proposed Height</label>
                                <input type="text" id="proposed_height" name="proposed_height" class="form-control form-control-lg" required />
                                <p style="font-style: italic;" for="form3Examplev2">(meters above ground level)</p>
                            </div>

                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Height of Existing Structure</label>
                                <input type="text" id="height_of_existing_structure" name="height_of_existing_structure" class="form-control form-control-lg" required />
                                <p style="font-style: italic;" for="form3Examplev2">(meters above ground level)</p>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
            <section class="representative-data">
                <div class="header-container">
                    <div class="circle">
                        <h2 class="hdr-num">3</h2>
                    </div>
                    <header class="section-hdr">Representative/Liaison Officer Data</header>
                </div>
                <div class="fields">
                    <div class="row m-4 p-3">
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev2">First name</label>
                                <input type="text" name="rep_fname" class="form-control form-control-lg"  required>

                            </div>

                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Last name</label>
                                <input type="text" name="rep_lname" class="form-control form-control-lg"  required>

                            </div>

                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4">Company Represented</label>
                                <input type="text" name="rep_company" class="form-control form-control-lg"  required>

                            </div>
                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev2">Landline Number</label>
                                <input type="number" name="rep_landline" class="form-control form-control-lg"  required>

                            </div>

                        </div>
                        <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Mobile Number</label>
                                <input type="number" name="rep_mobile" class="form-control form-control-lg"  required>
                            </div>

                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4">Office or Residence Address</label>
                                <input type="text" name="rep_office_address" class="form-control form-control-lg"  required>

                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4">Representative Email Address</label>
                                <input type="email" name="rep_email" class="form-control form-control-lg"  required>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4">Date of Submission</label>
                                <input type="date" name="rep_submission_date" class="form-control form-control-lg"  required>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4">Date of OR</label>
                                <input type="date" name="rep_date_of_or" class="form-control form-control-lg"  required>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev4">Official Receipt Number</label>
                                <input type="text" name="rep_receipt_num" class="form-control form-control-lg"  required>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Register</button>
        </div>
    </form>
</div>
@endsection
