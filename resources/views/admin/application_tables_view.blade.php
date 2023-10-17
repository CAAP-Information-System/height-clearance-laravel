@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin/application_view.css') }}">
<div class="container">
    <h1>Current Applications Submitted</h1>
    <div class="application-table-card">
        <table class="table">
            <thead>
                <tr>
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
                    <td>
                        {{ $application->fname }}
                        {{ $application->lname }}

                    </td>
                    <td>{{ $application->owner_address }}</td>
                    <td>{{ $application->email }}</td>
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
