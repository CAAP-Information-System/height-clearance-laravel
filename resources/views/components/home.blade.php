@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/home.css') }}">
<div class="container">
    <section class="getting-started-section">
        <header class="getting-started-hdr">Getting Started</header>
        <div class="requirements">Requirements for application:</div>
        <p class="req-submessage">Preferred to be initially read by the Geodetic Engineer. Data should be complete, legible, correct and with no erasures. Any discrepancy in complying these requirements may delay processing.</p>
        <hr>
        <ul class="cards">
            <li class="card">
                <div>
                    <header class="number-hdr">1</header>
                    <div class="card-title">Elevation Plan for Proposed Structure</div>
            </li>
            <li class="card">
                <div>
                    <header class="number-hdr">2</header>
                    <div class="card-title">Certification of Geodetic Engineer</div>
                </div>
            </li>
            <li class="card">
                <div>
                    <header class="number-hdr">3</header>
                    <div class="card-title">Certification of Control Station Used</div>
                </div>
            </li>
            <li class="card">
                <div>
                    <header class="number-hdr">4</header>
                    <div class="card-title">Location Plan with Vicinity Map</div>
                </div>
            </li>
            <li class="card">
                <div>
                    <header class="number-hdr">5</header>
                    <div class="card-title">Computations and Processing Reports</div>
                </div>
            </li>
            <li class="card">
                <div>
                    <header class="number-hdr">6</header>
                    <div class="card-title">Additional Requirements for Temporary Structures</div>
                </div>
            </li>
            <li class="card">
                <div>
                    <header class="number-hdr">7</header>
                    <div class="card-title">Payment Fee for Filing</div>
                </div>
            </li>
        </ul>
    </section>

    <section class="guide-section">
        <header class="guide-header">How will the application be processed?</header>
        <div class="guide-section-main">

            <div class="img-grp">
                <img class="guide-img" src="{{ asset('asset/img/apply-clearance.png') }}" alt="Apply for a clearance">
                <img class="guide-img" src="{{ asset('asset/img/verify-application.png') }}" alt="Verifying application">
                <img class="guide-img" src="{{ asset('asset/img/receive-results.png') }}" alt="Receiving application">
            </div>
        </div>
    </section>

    <section class="requirements-section">
        <header class="req-main-hdr">What you specifically need...</header>
        <div class="req-block">
            <div class="req-grp">
                <header class="req-header">1. Elevation Plan for Proposed Structure</header>
                <div class="req-desc">
                    <span class="req-desc-upper">
                        If in case, the prposed structure is to be installed/constructed atop existing structure, include the height of the existing structure.
                    </span>
                    <hr class="border border-info border-2 opacity-50">
                    <span class="req-desc-lower">
                        For HCP application only; in A3 or A4 size bond paper
                    </span>
                </div>
            </div>

            <div class="req-grp">
                <div class="req-desc">
                    <span class="req-desc-upper">
                        Minimum of 4 concerns proposed structure or site, provide the Geodetic Coordinates (WGS-84 Datum) and Orthometric Height (EGM2008)
                    </span>
                    <hr class="border border-info border-2 opacity-50">
                    <span class="req-desc-lower">
                        Form No. CAAP-ADM-AOD-2; in A4 size bond paper
                    </span>
                </div>
                <header class="req-header">2. Certification of Geodetic Engineer</header>

            </div>

            <div class="req-grp">
                <header class="req-header">3. Certification of Control Station Used</header>
                <div class="req-desc">
                    <span class="req-desc-upper">
                        Copy/copies of Elevation Reference with Orthometric Height and Horizontal Control Reference with WGS-84 Coordinates (Latitude/Longitude) from known control station of National Mapping and Resource Information Authority (NAMRIA) or CAAP
                    </span>
                    <hr class="border border-info border-2 opacity-50">
                    <span class="req-desc-lower">
                        NAMRIA/CAAP; in A4 size bond paper
                    </span>
                </div>
            </div>

            <div class="req-grp">
                <div class="req-desc">
                    <span class="req-desc-upper">
                        Copy/copies of Elevation Reference with Orthometric Height and Horizontal Control Reference with WGS-84 Coordinates (Latitude/Longitude) from known control station of National Mapping and Resource Information Authority (NAMRIA) or CAAP
                    </span>
                    <hr class="border border-info border-2 opacity-50">
                    <span class="req-desc-lower">
                        In A3 or A4 size bond paper
                    </span>
                </div>
                <header class="req-header">4. Location Plan with Vicinity Map</header>

            </div>


            <div class="req-grp">
                <header class="req-header">5. Computations and Processing Reports</header>
                <div class="req-desc">
                    <span class="req-desc-upper">
                    For Total Station, traverse computations that is signed and sealed by a Geodetic Engineer.
                    <br>
                    For GNSS equipment, processing report including raw data is signed and sealed by a Geodetic Engineer.
                    </span>
                    <hr class="border border-info border-2 opacity-50">
                    <span class="req-desc-lower">
                        In A4 size bond paper
                    </span>
                </div>
            </div>

            <div class="req-grp">
                <div class="req-desc">
                    <span class="req-desc-upper">
                        <ol type="1">
                            <li>Copy of Approved Height Clearance Permit of proposed building where crane will be used (in A4 size bond paper.</li>
                            <li>Site development plan with radial coverage of cranes duly signed by Mechanical/Civil Engineer (in A3 or A4  size bond paper)</li>
                            <li>Elevation Plan showing the maximum height and elevation of cranes duly signed by Mechanical/Civil Engineer (in A3 or A4  size bond paper)</li>
                            <li>Duration date and hours of crane operation signed by Owner/Manager (in A4 bond paper)</li>
                            <li>Safety/Responsible officers and their contact numbers signed by Owner/Manager (in A4 size bond paper)</li>
                            <li>Appropriate lighting and markings in accordance with the Manual of Standards for Aerodromes (to be incorporated in 6.c)</li>
                        </ol>
                    </span>
                </div>
                <header class="req-header">6. Additional Requirements for Temporary Structures</header>

            </div>
        </div>
    </section>
</div>
@endsection
