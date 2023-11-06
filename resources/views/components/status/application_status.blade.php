@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/application-status.css') }}">
<div class="container">
<section class="status-table">
    <div class="table-container">
        <table class="table">
            <thead>
                <th>Application Number</th>
                <th>Date Submitted</th>
                <th>Type of Application</th>
                <th>Expected Release Date</th>
                <th>Control Number</th>
                <th>Status</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$applicationData->application_number}}</td>
                    <td>{{$applicationData->submission_date}}</td>
                    <td>
                        @if($applicationData->user->permit_type == 'height_clearance_permit')
                        HCP
                        @elseif($applicationData->user->permit_type == 'height_limitation')
                        HL
                        @endif
                    </td>
                    <td>2023-07-27</td>
                    <td>N/A</td>
                    <td>{{$applicationData->process_status}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

</div>
@endsection
