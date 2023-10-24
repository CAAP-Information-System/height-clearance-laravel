<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Receipt;
use Illuminate\Http\Request;

class PaymentReceiptController extends Controller
{
    public function create($application_id)
    {
        // Retrieve the associated application
        $application = Application::find($application_id);

        return view('components.payment_receipt.create', ['application' => $application]);
    }

    public function store(Request $request, $application_id)
    {
        // Validate the request data
        $request->validate([
            'fee_receipt' => 'nullable|file|mimes:jpg,pdf,png|max:10999',
            'receipt_num' => 'required|string|max:255',
        ]);

        if ($request->hasFile('fee_receipt')) {
            // Get user's ID
            $userId = auth()->user()->id;

            // Get filename with the extension
            $filenameWithExt = $request->file('fee_receipt')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('fee_receipt')->getClientOriginalExtension();

            // File to store with user's ID
            $fileNameToStore_fee_receipt = $userId . '_fee_receipt_' . time() . '.' . $extension;

            // Upload Image to the 'public' disk
            $path = $request->file('fee_receipt')->storeAs('public/fee_receipt', $fileNameToStore_fee_receipt);
        } else {
            $fileNameToStore_fee_receipt = 'Not Found';
        }
        // Create and store the payment receipt information
        $paymentReceipt = new Receipt();
        $paymentReceipt->application_id = $application_id;
        $paymentReceipt->fee_receipt = $fileNameToStore_fee_receipt;
        $paymentReceipt->receipt_num = $request->input('receipt_num');

        // Add other fields as needed
        $paymentReceipt->save();


        // Update the application status or perform other actions

        return redirect()->route('application-status', ['application_id' => $application_id])->with('success', 'Payment receipt created successfully.');
    }
}
