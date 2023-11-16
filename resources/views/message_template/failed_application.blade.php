@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/status.css') }}">
<div class="container">
    <section class="status-main">
        <header class="application-result-hdr">
            Application Result
        </header>
        <div class="report-card">
            <div class="left-col">
                <img class="status-img" src="{{ asset('asset/img/failed.png') }}" alt="robot" class="failed status">
                <p class="status-title">Uh Oh!</p>
                <p class="status-caption">It looks like that one of your application details was <span style="color: #F14668; font-weight:bold;">disapproved</span> by the evaluator.</p>
            </div>
            <div class="right-col">
                <p class="status-failed">Disapproved application files/details:</p>
                <hr class="border border-secondary border-1 opacity-50">
                <ul class="status-bullet">
                    @if($applicationData->aerodrome->ep_comp == 'NotComplied')
                    <li>Elevation Plan</li>
                    @endif

                    @if($applicationData->aerodrome->ge_comp == 'NotComplied')
                    <li>Geodetic Engineer's Certificate</li>
                    @endif

                    @if($applicationData->aerodrome->cs_comp == 'NotComplied')
                    <li>Control Station</li>
                    @endif

                    @if($applicationData->aerodrome->app_comp == 'NotComplied')
                    <li>Application Form</li>
                    @endif

                    @if($applicationData->aerodrome->fee_comp == 'NotComplied')
                    <li>Fee Payment</li>
                    @endif

                    @if($applicationData->aerodrome->lp_comp == 'NotComplied')
                    <li>Location Plan</li>
                    @endif

                    @if($applicationData->aerodrome->cp_comp == 'NotComplied')
                    <li>Computation and/or Processing Report</li>
                    @endif

                    @if($applicationData->aerodrome->ar_comp == 'NotComplied')
                    <li>Additional Requirements</li>
                    @endif
                </ul>

                <p class="post-message">Please update your application details and re-submit. Thank you</p>
                <a href="{{ url('home') }}" class="return-home-btn">
                    <i class='bx bx-home-alt'></i>
                    Return Home
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
