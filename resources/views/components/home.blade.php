@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/home.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->

        </div>

        <!-- MARGINAL DIVIDER -->
        <div style="margin: 10px;"></div>

        <section>
            <div class="status-card">
                <header class="status-card-hdr">Document Status</header>
                <div class="status-card-content">
                    <div class="content-color">Pending</div>
                </div>
            </div>
        </section>
        <div style="margin: 10px;"></div>

        <section>
        </section>
    </div>
</div>
@endsection
