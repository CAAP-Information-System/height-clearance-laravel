@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registered Users</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Full Legal Name</th>
                <th>Email Address</th>
                <th>Date Registered</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    @if ($user->access_role == 'admin')
                    <div>Administrator</div>
                    @elseif ($user->access_role == 'user')
                    <div>Guest</div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
