<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PdfReceiptController extends Controller
{
    // public function generateReceiptPDF(Request $request)
    // {
    //     $view = View::make('userGuest.guest_invoice', [
    //         'data' => $request->input('data') // Get the content of the modal
    //     ])->render();
        
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($view);
    //     $dompdf->setPaper('A4', 'portrait');
    //     $dompdf->render();
    
    //     return $dompdf->stream();
    // }
}
