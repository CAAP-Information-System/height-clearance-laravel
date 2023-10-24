@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/auth/register.css') }}">
<div class="container">
    <div class="hdr-group">
        <img class="caap-logo" src="{{ asset('asset/img/caap-logo.png') }}" alt="CAAP Logo">
        <header class="auth-hdr">Let's register your account</header>
    </div>
    <div class="registration-main-wrapper">
        <div class="registration-form-wrapper">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="registration-steps">
                    <ul>
                        <li class="registration-step-menu1 active">
                            <span>1</span>
                            Owner/Manager
                        </li>
                        <li class="registration-step-menu2">
                            <span>2</span>
                            Representative
                        </li>
                        <li class="registration-step-menu3">
                            <span>3</span>
                            Password
                        </li>
                    </ul>
                </div>

                <div class="registration-form-step-1 active">
                    <header class="auth-field-hdr">Select a Type of Application:</header>
                    <div class="registration-input-flex">

                        <div class="">
                            <label>
                                <input class="form-check-input" type="radio" name="permit_type" value="height_clearance_permit" required>
                                Height Clearance Permit (HCP)
                            </label>
                        </div>
                        <div class="">
                            <label>
                                <input class="form-check-input" type="radio" name="permit_type" value="height_clearance_permit">
                                Height Limitation (HL)
                            </label>
                        </div>
                    </div>
                    <div class="registration-input-flex">
                        <div class="" id="buildingTypeContainer" style="display: none;">

                            <label>
                                <input class="form-check-input" type="radio" name="building_type" value="permanent">
                                Permanent Structure
                            </label>
                        </div>

                        <div class="" id="buildingTypeContainer" style="display: none;">
                            <label>
                                <input class="form-check-input" type="radio" name="building_type" value="temporary">
                                Temporary Structure <span style="font-style: italic;">(e.g. Crane, Temporary Elevator Housing, etc.)</span>
                            </label>
                        </div>
                    </div>

                    <div class="registration-input-flex">

                        <div>
                            <label for="firstname" class="registration-form-label"> First Name </label>
                            <input type="text" name="first_name" placeholder="Enter First Name" id="firstname" class="registration-form-input" required />
                        </div>
                        <div>
                            <label for="lastname" class="registration-form-label"> Last Name </label>
                            <input type="text" name="last_name" placeholder="Enter Last Name" id="lastname" class="registration-form-input" required />
                        </div>
                    </div>

                    <div class="registration-input-flex">
                        <div>
                            <label for="email" class="registration-form-label"> Email Address </label>
                            <input type="email" name="email" placeholder="example@mail.com" id="email" class="registration-form-input" required />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="address" class="registration-form-label"> Address </label>
                        <input type="text" name="home_address" id="address" placeholder="Street Name, Town/City, Province" class="registration-form-input" required />
                    </div>
                    <br>
                    <div class="registration-input-flex">
                        <div>
                            <label for="landline" class="registration-form-label"> Landline Number </label>
                            <input type="number" name="landline" id="landline" class="registration-form-input" required />
                        </div>
                        <div>
                            <label for="mobile" class="registration-form-label"> Mobile Number </label>
                            <input type="number" name="mobile" id="mobile" class="registration-form-input" required />
                        </div>
                    </div>
                </div>

                <div class="registration-form-step-2">
                    <header class="auth-field-hdr">Register your Representative/Liason Officer:</header>
                    <div class="registration-form-confirm">
                        <p>Please register your Representative/Liason Officer.</p>
                    </div>
                    <div class="registration-input-flex">
                        <div>
                            <label for="firstname" class="registration-form-label"> First Name </label>
                            <input type="text" name="rep_fname" placeholder="Enter First Name" id="firstname" class="registration-form-input" required />
                        </div>
                        <div>
                            <label for="lastname" class="registration-form-label"> Last Name </label>
                            <input type="text" name="rep_lname" placeholder="Enter Last Name" id="lastname" class="registration-form-input" required />
                        </div>
                    </div>
                    <div class="registration-input-flex">
                        <div>
                            <label for="email" class="registration-form-label"> Email Address </label>
                            <input type="email" name="rep_email" placeholder="example@mail.com" id="email" class="registration-form-input" required />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div>
                        <label for="email" class="registration-form-label">Company Represented</label>
                        <input type="text" name="rep_company" placeholder="Enter Company Name" id="rep_company" class="registration-form-input" required />
                    </div>
                    <div>
                        <label for="email" class="registration-form-label">Company Office Address</label>
                        <input type="text" name="rep_office_address" placeholder="Street Name, City, Region" id="rep_office_address" class="registration-form-input" required />
                    </div>

                    <br>
                    <div class="registration-input-flex">
                        <div>
                            <label for="landline" class="registration-form-label"> Landline Number </label>
                            <input type="number" name="rep_landline" id="rep_landline" class="registration-form-input" required />
                        </div>
                        <div>
                            <label for="mobile" class="registration-form-label"> Mobile Number </label>
                            <input type="number" name="rep_mobile" id="rep_mobile" class="registration-form-input" required />
                        </div>
                    </div>
                </div>

                <div class="registration-form-step-3">
                    <div class="registration-form-confirm">
                        <p>
                            Please confirm your password.
                        </p>

                        <div>
                            <div>
                                <label for="password" class="registration-form-label">Enter Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="registration-form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" required autocomplete="new-password" required>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="registration-form-btn-wrapper">
                    <button class="registration-back-btn">
                        Back
                    </button>

                    <button class="registration-btn">
                        Next Step
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1675_1807)">
                                <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1675_1807">
                                    <rect width="16" height="16" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <section class="already-registered">
        <div>Already have an account?</div>
        <br>
        @if (Route::has('login'))
        <a class="alt-link" href="{{ route('login') }}">Back to Sign In</a>
        @endif
    </section>
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
    const stepMenuOne = document.querySelector('.registration-step-menu1');
    const stepMenuTwo = document.querySelector('.registration-step-menu2');
    const stepMenuThree = document.querySelector('.registration-step-menu3');

    const stepOne = document.querySelector('.registration-form-step-1');
    const stepTwo = document.querySelector('.registration-form-step-2');
    const stepThree = document.querySelector('.registration-form-step-3');

    const formSubmitBtn = document.querySelector('.registration-btn');
    const formBackBtn = document.querySelector('.registration-back-btn');

    // Function to check if all fields in a step are filled
    function areStepFieldsFilled(step) {
        const inputFields = step.querySelectorAll('.registration-form-input');
        for (const field of inputFields) {
            if (field.value.trim() === '') {
                return false;
            }
        }
        return true;
    }

    // Function to update the "Next Step" button state based on the current step
    function updateNextStepButtonState() {
        if (stepMenuOne.classList.contains('active') && !areStepFieldsFilled(stepOne)) {
            formSubmitBtn.disabled = true;
            formSubmitBtn.style.backgroundColor = '#CCCCCC'; // Disable color
        } else if (stepMenuTwo.classList.contains('active') && !areStepFieldsFilled(stepTwo)) {
            formSubmitBtn.disabled = true;
            formSubmitBtn.style.backgroundColor = '#CCCCCC'; // Disable color
        } else if (stepMenuThree.classList.contains('active') && !areStepFieldsFilled(stepThree)) {
            formSubmitBtn.disabled = true;
            formSubmitBtn.style.backgroundColor = '#CCCCCC'; // Disable color
        } else {
            formSubmitBtn.disabled = false;
            formSubmitBtn.style.backgroundColor = '#28a745'; // Enable color
        }
    }

    // Initially disable the "Next Step" button
    formSubmitBtn.disabled = true;
    formSubmitBtn.style.backgroundColor = '#CCCCCC'; // Disable color

    // Event listener to handle "Next Step" button click
    formSubmitBtn.addEventListener("click", function(event) {
        event.preventDefault();

        if (stepMenuOne.classList.contains('active')) {
            stepMenuOne.classList.remove('active');
            stepMenuTwo.classList.add('active');
            stepOne.classList.remove('active');
            stepTwo.classList.add('active');
            formBackBtn.classList.add('active');
        } else if (stepMenuTwo.classList.contains('active')) {
            stepMenuTwo.classList.remove('active');
            stepMenuThree.classList.add('active');
            stepTwo.classList.remove('active');
            stepThree.classList.add('active');
            formBackBtn.classList.remove('active');
            formSubmitBtn.textContent = 'Submit';
        } else if (stepMenuThree.classList.contains('active')) {
            document.querySelector('form').submit();
        }
    });

    // Event listener to handle input field changes
    document.querySelectorAll('.registration-form-input').forEach(input => {
        input.addEventListener('input', updateNextStepButtonState);
    });

    // Event listener to handle "Back" button click
    formBackBtn.addEventListener("click", function(event) {
        if (stepMenuTwo.classList.contains('active')) {
            stepMenuTwo.classList.remove('active');
            stepMenuOne.classList.add('active');
            stepTwo.classList.remove('active');
            stepOne.classList.add('active');
            formBackBtn.classList.remove('active');
        } else if (stepMenuThree.classList.contains('active')) {
            stepMenuThree.classList.remove('active');
            stepMenuTwo.classList.add('active');
            stepThree.classList.remove('active');
            stepTwo.classList.add('active');
            formSubmitBtn.textContent = 'Next Step';
        }
    });
</script>
@endsection
