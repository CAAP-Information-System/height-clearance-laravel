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

        <div class="applicant-container">
            <div class="applicant-info">
                <header class="applicant-info-hdr">Application Information</header>
                <div class="application-details">
                    <p class="name">{{ $application->user->rep_fname }} {{ $application->user->rep_lname }}</p>
                    <p class="email">{{ $application->owner->owner_email }}</p>
                </div>
            </div>
        </div>

        <header class="payment-hdr">Payment Receipt Details</header>
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
        <div class="submit-payment">
            <button type="submit" class="button-24">Submit Payment Receipt and Wait for Results</button>
        </div>
    </form>
</div>
@endsection
