@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/upload_form.css') }}">
<form action="{{ route('submitApplication') }}" method="post">
    @csrf
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <!-- LEFT PANEL -->
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">Application/Owner Data</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="text" id="fname" name="fname" class="form-control form-control-lg" required />
                                                <label class="form-label" for="form3Examplev2">First name</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="text" id="lname" name="lname" class="form-control form-control-lg" required />
                                                <label class="form-label" for="form3Examplev3" >Last name</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                                            <label class="form-label" for="form3Examplev4" required>Email Address</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">

                                            <div class="form-outline">
                                                <input type="number" id="landline" name="landline" class="form-control form-control-lg"  required />
                                                <label class="form-label" for="form3Examplev5">Landline Number</label>
                                            </div>
                                            <div class="form-outline">
                                                <input type="number" id="mobile" name="mobile" class="form-control form-control-lg" required/>
                                                <label class="form-label" for="form3Examplev5">Mobile Number</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="margin-top: 10px;"></div>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="text" name="type_of_structure" id="type_of_structure" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form3Examplev4">Type of Structure</label>
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="text" name="site_address" id="site_address" class="form-control form-control-lg" required/>
                                            <label class="form-label" for="form3Examplev4">Site Address</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">

                                            <div class="form-outline">
                                                <input type="number" id="proposed_height" name="proposed_height" class="form-control form-control-lg" required />
                                                <label class="form-label" for="form3Examplev5">Proposed Height <span style="font-style: italic;">(meters above ground level)</span></label>
                                            </div>
                                            <div class="form-outline">
                                                <input type="number" id="height_of_existing_structure" name="height_of_existing_structure" class="form-control form-control-lg" required/>
                                                <label class="form-label" for="form3Examplev5">Height of Existing Structure <span style="font-style: italic;">(meters above ground level)</span></label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- RIGHT PANEL -->
                            <div class="col-lg-6 bg-indigo text-white">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5">Contact Details</h3>
                                    <h4>THIS PANEL IS NOT CONFIGURED YET</h4>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline form-white">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Street + Nr</label>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <div class="form-outline form-white">
                                            <input type="text" id="form3Examplea3" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea3">Additional Information</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">

                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea4">Zip Code</label>
                                            </div>

                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">

                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea5" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea5">Place</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <div class="form-outline form-white">
                                            <input type="text" id="form3Examplea6" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea6">Country</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">

                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea7" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea7">Code +</label>
                                            </div>

                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">

                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea8" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea8">Phone Number</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="form-outline form-white">
                                            <input type="text" id="form3Examplea9" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea9">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                        <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" />
                                        <label class="form-check-label text-white" for="form2Example3">
                                            I do accept the <a href="#!" class="text-white"><u>Terms and Conditions</u></a> of your
                                            site.
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Register</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
