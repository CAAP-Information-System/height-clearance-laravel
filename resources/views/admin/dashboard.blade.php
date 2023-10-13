@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin/dashboard.css') }}">
<div class="container">
    <h1>Dashboard View</h1>

    <div class="btn-container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p style="font-size: 20px;">User Registrations</p>
                        <h3>{{$userCount}}</h3>


                    </div>
                    <div class="icon">
                        <i class='bx bxs-user-plus' ></i>
                    </div>
                    <a href="{{ url('admin/registered-accounts') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <p style="font-size: 20px;">Current Applications</p>
                        <h3>{{$applicationCount}}</h3>


                    </div>
                    <div class="icon">
                        <i class='bx bx-file' ></i>
                    </div>
                    <a href="{{ url('admin/application-view') }}"" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->



        </div>


    </div>
</div>
@endsection
