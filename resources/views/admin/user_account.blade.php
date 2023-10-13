@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registered Users</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
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
