@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/queue.css') }}">
<div class="container">
    <div class="main-content">
        <header class="queue-hdr">Queued Applications</header>
        <div class="application-table-card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Application Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Owner Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applicationData as $application)
                    <tr>
                        <td>{{ $application->application_number }}</td>
                        @if($application->user)
                        <td>{{ $application->user->rep_fname }} {{ $application->user->rep_lname }}</td>
                        <td>{{ $application->user->rep_office_address }}</td>
                        <td>{{ $application->user->email }}</td>
                        @endif
                        <td>
                            @if ($application->status == 'Pending')
                            <span class="text-warning" style="font-weight: bold;">{{ $application->status }}</span>
                            @else
                            {{ $application->status }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('doc-review', ['id' => $application->id]) }}" class="btn btn-primary">View Application</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
