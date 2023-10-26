@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin/application_queue.css') }}">
<div class="">
    <h1>Current Applications Submitted</h1>
    <div class="application-table-card">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Application Number</th>
                    <th>Date Submitted</th>
                    <th>Type of Application</th>
                    <th>ADMS Evaluator</th>
                    <th>ADMS Supervisor</th>
                    <th>ADMS Chief</th>
                    <th>ATS Supervisor</th>
                    <th>ATS Chief</th>
                    <th>ANS Evaluator</th>
                    <th>ANS Supervisor</th>
                    <th>ANS Chief</th>
                    <th>ODG Signatory</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicationData as $key => $application)
                <tr>
                    <td>{{ $application->application_number }}</td>
                    <td>{{ $application->submission_date }}</td>
                    <td>
                        @if ($application->user->permit_type == 'height_clearance_permit')
                            HCP
                        @elseif ($application->user->permit_type == 'height_limitation')
                            HL
                        @endif
                    </td>
                    <td>{{ $applicationqueue[$key]->adms_eval }}</td>
                    <td>{{ $applicationqueue[$key]->adms_supervisor }}</td>
                    <td>{{ $applicationqueue[$key]->adms_chief }}</td>
                    <td>{{ $applicationqueue[$key]->ats_eval }}</td>
                    <td>{{ $applicationqueue[$key]->ats_supervisor }}</td>
                    <td>{{ $applicationqueue[$key]->ats_chief }}</td>
                    <td>{{ $applicationqueue[$key]->ans_supervisor }}</td>
                    <td>{{ $applicationqueue[$key]->ans_chief }}</td>
                    <td>{{ $applicationqueue[$key]->odg_sign }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
