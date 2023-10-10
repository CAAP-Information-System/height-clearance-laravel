@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/home.css') }}">
<div class="container">
    <header class="getting-started">Getting Started</header>
    <div class="requirements">Requirements for application:</div>
    <p class="req-submessage">Preferred to be initially read by the Geodetic Engineer. Data should be complete, legible, correct and with no erasures. Any discrepancy in complying these requirements may delay processing.</p>
    <hr>
    <ul class="cards">
        <li class="card">
            <div>
                <h1 class="number-hdr">1</h1>
                <h3 class="card-title">Elevation Plan for Proposed Structure</h3>
                <hr>
                <div class="subtitle">For HCP application only; in A3 or A4 size bond paper</div>
                <div class="card-content">
                    <p>If in case, the prposed  structure is to be installed/constructed atop existing structure, include the height of the existing structure.</p>
                </div>
            </div>
        </li>
        <li class="card">
            <div>
            <h1 class="number-hdr">2</h1>
                <h3 class="card-title">Certification of Geodetic Engineer</h3>
                <hr>
                <div class="subtitle">Form No. CAAP-ADM-AOD-2; in A4 size bond paper</div>
                <div class="card-content">
                    <p>Minimum of 4 concerns proposed structure or site, provide the Geodetic Coordinates (WGS-84 Datum) and Orthometric Height (EGM2008)  </p>
                </div>
            </div>
        </li>
        <li class="card">
            <div>
                <h1 class="number-hdr">3</h1>
                <h3 class="card-title">Certification of Control Station Used</h3>
                <hr>
                <div class="subtitle">NAMRIA/CAAP; in A4 size bond paper</div>
                <div class="card-content">
                    <p>Copy/copies of Elevation Reference with Orthometric Height and Horizontal Control Reference with WGS-84 Coordinates (Latitude/Longitude) from known control station of National Mapping and Resource Information Authority (NAMRIA) or CAAP</p>
                </div>
            </div>
        </li>
        <li class="card">
            <div>
                <h1 class="number-hdr">4</h1>
                <h3 class="card-title">Location Plan with Vicinity Map</h3>
                <hr>
                <div class="subtitle"> In A3 or A4 size bond paper</div>
                <div class="card-content">
                    <p>Indicating the Geodetic Position and Elevation of the proposed site, signed and sealed by a Geodetic Engineer.</p>
                </div>
            </div>
        </li>
        <li class="card">
            <div>
                <h1 class="number-hdr">5</h1>
                <h3 class="card-title">Computations and Processing Reports</h3>
                <hr>
                <div class="subtitle">In A4 size bond paper</div>
                <div class="card-content">
                    <ol>
                        <li>For Total Station, traverse computations that is signed and sealed by a Geodetic Engineer.</li>
                        <li>For GNSS equipment, processing report including raw data is signed and sealed by a Geodetic Engineer.</li>
                    </ol>
                </div>
            </div>
        </li>
        <li class="card">
            <div>
            <h1 class="number-hdr">6</h1>
                <h3 class="card-title">Additional Requirements for Temporary Structures</h3>
                <hr>
                <div class="subtitle">&nbsp;</div>
                <div id="card-6" class="card-content">
                    <ol>
                        <li>Copy of Approved Height Clearance Permit of proposed building where crane will be used (in A4 size bond paper.</li>
                        <li>Site development plan with radial coverage of cranes duly signed by Mechanical/Civil Engineer (in A3 or A4  size bond paper).</li>
                        <!-- <li>Elevation plan showing the maximum height and elevation of cranes duly signed by Mechanical/Civil Engineer (in A3 or A4 size bond papaer).</li>
                        <li>Duration date and hours of crane operations signed by Owner/Manager (in A4 size bond paper)</li>
                        <li>Safety/Responsible officers and their contact numbers signed by Owner/Manager (in A4 size bond paper).</li>
                        <li>Appropriate lightings and markings in accordance with the Manual of Standards for Aerodromes (to be incorporated in 6.c).</li> -->
                    </ol>
                </div>
            </div>
        </li>
        <li class="card">
            <div>
                <h1 class="number-hdr">7</h1>
                <h3 class="card-title">Payment Fee for Filing</h3>
                <hr>
                <div class="subtitle">Attach a copy of the Official Receipt</div>
                <div class="card-content">
                    <p>50 Pesos + Value Added Tax (P50.00 + VAT).</p>
                </div>
            </div>
        </li>
    </ul>
</div>
@endsection
