@extends('layouts.app')

@section('content')
<div class="container">
    <header class="profile-hdr">My Profile</header>
    <div>{{$applicationData->first_name}}</div>

</div>
@endsection
