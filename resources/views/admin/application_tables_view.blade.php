@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin/application_view.css') }}">
<div class="container">
    <h1>Current Applications Submitted</h1>
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
                    <td>{{ $application->user->first_name }} {{ $application->user->last_name }}</td>
                    <td>{{ $application->user->home_address }}</td>
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
                        <a href="{{ route('show-application', ['id' => $application->id]) }}" class="btn btn-primary">View Application</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
