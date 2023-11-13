@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/payment.css') }}">
<div class="container">
    <header class="payment-header">Payment Receipt for Applicant Number: <span class="applicant-num">{{ $application->application_number }}</span></header>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('components.payment_receipt.store', ['application_id' => $application->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="applicant-info">
            <header class="applicant-info-hdr">Application Information</header>
            <span>Application Number: {{ $application->application_number }}</span>
            <span>Full Name: {{ $application->user->rep_fname }} {{ $application->user->rep_lname }}</span>
        </div>

        <h2>Payment Receipt Details</h2>
        <div class="row m-4 p-3">
            <div class="mb-4 pb-2">
                <div class="form-group">
                    <input type="file" name="fee_receipt" id="fee_receipt" accept=".pdf">
                </div>
            </div>
        </div>
        <div class="mb-4 pb-2">
            <div class="form-outline">
                <label class="form-label">Official Receipt Number</label>
                <input type="text" name="receipt_num" class="form-control form-control-lg" placeholder="Enter Official Receipt Number" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit Payment Receipt and Wait for Results</button>
    </form>
</div>
@endsection
