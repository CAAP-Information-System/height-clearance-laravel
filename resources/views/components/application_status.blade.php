@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <th>Application Number</th>
            <th>Date Submitted</th>
            <th>Type of Application</th>
            <th>Expected Release Date</th>
            <th>Controle Number</th>
            <th>Status</th>
        </thead>
        <tbody>
            <tr>
                <td>0001-23</td>
                <td>2023-07-20</td>
                <td>HCP</td>
                <td>2023-07-27</td>
                <td>N/A</td>
                <td>Queued for ADMS evaluation</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
