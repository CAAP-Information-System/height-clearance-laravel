@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/adms/supervisor-home.css') }}">
<div class="container">
    <header class="supervisor-header">Evaluation Queue</header>

    <div class="queue-section">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Application Number</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Status Queue</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($queue as $queuedata)
            <tbody>
                <tr>
                    <th scope="row">{{$queuedata->application_number}}</th>
                    <td>{{$queuedata->owner->owner_fname}} {{$queuedata->owner->owner_lname}} </td>
                    <td>For review by Checker/Supervisor</td>
                    <td>
                        <a href="{{ route('ADMSSupervisorView',['id' => $queuedata->id]) }}" class="btn btn-primary">Evaluate</a>
                    </td>
                </tr>
            </tbody>
            @endforeach

        </table>
    </div>
</div>

@endsection
