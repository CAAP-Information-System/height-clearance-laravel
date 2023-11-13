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
                    <td>{{ $applicationData->created_at->format('Y-m-d') }}</td>

                    <td>
                        @if($applicationData->permit_type == 'HCP')
                        HCP
                        @elseif($applicationData->permit_type == 'HL')
                        HL
                        @endif
                    </td>
                    <td>{{ $applicationData->created_at->addDays(7)->format('Y-m-d') }}</td>
                    <td>N/A</td>
                    <td>{{$applicationData->process_status}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

</div>
@endsection
