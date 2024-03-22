<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


class PDFController extends Controller
{

    public function createNonComplianceLetter()
    {
        $users = User::get();
        $usercount = User::count();
        $pdf = FacadePdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $data = [
            'title' => '59th DGCA Registration Report',
            'date' => date('m/d/Y'),
            'users' => $users,
        ];
        $pdf->setPaper('A4');
        $pdf->loadView('.pdf.non_compliance_letter', $data);
        // Stream the generated PDF
        return $pdf->stream();
    }

}
