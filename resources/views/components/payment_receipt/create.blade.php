@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Payment Receipt for Application #{{ $application->application_number }}</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('components.payment_receipt.store', ['application_id' => $application->id]) }}" method="POST">
        @csrf

        <!-- Application Information -->
        <h2>Application Information</h2>
        <p>Application Number: {{ $application->application_number }}</p>
        <p>Applicant Name: {{ $application->user->first_name }} {{ $application->user->last_name }}</p>

        <!-- Payment Receipt Details -->
        <h2>Payment Receipt Details</h2>
        <div class="row m-4 p-3">
            <div class="mb-4 pb-2">
                <div class="form-group">
                    <!-- <input type="file" name="fee_receipt" id="fee_receipt" accept=".jpg"> -->
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
