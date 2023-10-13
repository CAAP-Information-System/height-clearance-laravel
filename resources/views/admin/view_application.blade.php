@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin/view_application.css') }}">
<div class="container">
    <h1>Application View</h1>
    <div>Application Data for Applicant ID: {{ $userApplication->id }}</div>
    <div>Applicant Name: {{ $userApplication->fname }}</div>

</div>
@endsection
