<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Receipt;
use Illuminate\Http\Request;

class PaymentReceiptController extends Controller
{
    public function create($applicationId)
    {
        // Retrieve the associated application
        $application = Application::find($applicationId);

        return view('payment_receipt.create', ['application' => $application]);
    }

    public function store(Request $request, $applicationId)
    {
        // Validate and store the payment receipt information
        $paymentReceipt = new Receipt();
        $paymentReceipt->application_id = $applicationId;
        $paymentReceipt->receipt_number = $request->input('receipt_number');
        $paymentReceipt->amount = $request->input('amount');
        // Add other fields as needed
        $paymentReceipt->save();

        // Update the application status or perform other actions

        return redirect()->route('application-status')->with('success', 'Payment receipt created successfully.');
    }
}
