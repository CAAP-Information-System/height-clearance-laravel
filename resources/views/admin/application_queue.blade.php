@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin/application_queue.css') }}">
<div class="container">
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
                    <th>ADMS Cheif</th>
                    <th>ATS Supervisor</th>
                    <th>ATS Chief</th>
                    <th>ANS Evaluator</th>
                    <th>ANS Supervisor</th>
                    <th>ANS Chief</th>
                    <th>ODG Signatory</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicationData as $application)
                <tr>

                    <td>{{$application->application_number}}</td>
                    <td>{{ $application->submission_date}}</td>
                    <td>
                        @if ($application->user->permit_type == 'height_clearance_permit')
                        HCP
                        @elseif ($application->user->permit_type == 'height_limitation')
                        HL
                        @endif
                    </td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Ongoing
                        @endif
                    </td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Awaiting
                        @endif
                    </td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Awaiting
                        @endif
                    </td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Awaiting
                        @endif
                    </td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Awaiting
                        @endif
                    </td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Awaiting
                        @endif
                    </td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Awaiting
                        @endif
                    </td>
                    <td>11</td>
                    <td>12</td>
                    <td>
                        @if($application->process_status == 'Queued for ADMS evaluation')
                        Ongoing ADMS Evaluation
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('application-eval', ['id' => $application->id]) }}" class="btn btn-primary">
                            View Application
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
