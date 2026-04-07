<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\Manage_Room;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\GuestInformation;
use Illuminate\Support\Facades\Auth;

class FrontdeskInvoiceController extends Controller
{
    //
    public function FrontdeskViewInvoice() {
        if (Auth::guard('frontdesk')->check()) {
            $frontdesk_id = Auth::guard('frontdesk')->id();
        } else {
            return abort(401, 'Unauthorized');
        }
        $reservation = Reservations::where('frontdesk_id', $frontdesk_id)->latest()->first();
        $guestRegistration = GuestInformation::where('frontdesk_id', $frontdesk_id)->latest()->first();
        $rooms = Manage_Room::where('id', function ($query) use ($frontdesk_id) {
                $query->select('room_id')
                        ->from('reservations')
                        ->where('frontdesk_id', $frontdesk_id)
                        ->latest()
                        ->first();
            })->first();
    
        return view('frontdesk.frontdesk_invoice', [
            'reservation' => $reservation,
            'guestRegistration' => $guestRegistration,
            'rooms' => $rooms,
        ]);
    }
        // return view('frontdesk.frontdesk_invoice');

    public function ViewInvoiceAsPdf(){
        if (Auth::guard('frontdesk')->check()) {
            $frontdesk_id = Auth::guard('frontdesk')->id();
        } else {
            return abort(401, 'Unauthorized');
        }
        $reservation = Reservations::where('frontdesk_id', $frontdesk_id)->latest()->first();
        $guestRegistration = GuestInformation::where('frontdesk_id', $frontdesk_id)->latest()->first();
        // $rooms = Rooms::where('guest_id', auth()->user()->id)->latest()->first();
        $rooms = Manage_Room::where('id', function ($query) use ($frontdesk_id) {
            $query->select('room_id')
                    ->from('reservations')
                    ->where('frontdesk_id', $frontdesk_id)
                    ->latest()
                    ->first();
        })->first();
        
        // $book = GuestInformation::get();
  
        $data = [
            'title' => 'Welcome to LaravelTuts.com',
            'date' => date('m/d/Y'),
            'guestRegistration' => $guestRegistration,
            'reservation' => $reservation,
            'rooms' => $rooms
        ]; 
            
        return view('frontdesk.frontdesk_generate-invoice', $data);
    }

    public function FrontdeskGenerateInvoice(){
        if (Auth::guard('frontdesk')->check()) {
            $frontdesk_id = Auth::guard('frontdesk')->id();
        } else {
            return abort(401, 'Unauthorized');
        }
        $reservation = Reservations::where('frontdesk_id', $frontdesk_id)->latest()->first();
        $guestRegistration = GuestInformation::where('frontdesk_id', $frontdesk_id)->latest()->first();
        // $rooms = Rooms::where('guest_id', auth()->user()->id)->latest()->first();
            $rooms = Manage_Room::where('id', function ($query) use ($frontdesk_id) {
                $query->select('room_id')
                        ->from('reservations')
                        ->where('frontdesk_id', $frontdesk_id)
                        ->latest()
                        ->first();
            })->first();

         $data = [
            
            'date' => date('m/d/Y'),
            'guestRegistration' => $guestRegistration,
            'reservation' => $reservation,
            'rooms' => $rooms
        ]; 

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('frontdesk.frontdesk_generate-invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}
