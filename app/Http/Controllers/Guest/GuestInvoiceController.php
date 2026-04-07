<?php

namespace App\Http\Controllers\Guest;

use App\Models\Manage_Room;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\GuestInformation;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class GuestInvoiceController extends Controller
{
    public function view_invoice() {
        $reservation = Reservations::where('guest_id', auth()->user()->id)->latest()->first();
        $guestRegistration = GuestInformation::where('guest_id', auth()->user()->id)->latest()->first();
        // $rooms = Rooms::where('guest_id', auth()->user()->id)->latest()->first();
        $rooms = Manage_Room::where('id', function ($query) {
            $query->select('room_id')
                  ->from('reservations')
                  ->where('guest_id', auth()->user()->id)
                  ->latest()
                  ->first();
        })->first();
        

        return view('userGuest.guest_invoice', [
            'reservation' => $reservation,
            'guestRegistration' => $guestRegistration,
            'rooms' => $rooms,
        ]);
    }

    public function ViewInvoice(){
       $reservation = Reservations::where('guest_id', auth()->user()->id)->latest()->first();
        $guestRegistration = GuestInformation::where('guest_id', auth()->user()->id)->latest()->first();
        // $rooms = Rooms::where('guest_id', auth()->user()->id)->latest()->first();
        $rooms = Manage_Room::where('id', function ($query) {
            $query->select('room_id')
                  ->from('reservations')
                  ->where('guest_id', auth()->user()->id)
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
            
        return view('userGuest.guest_generate-invoice', $data);
    }

    public function GenerateInvoice(){
        $reservation = Reservations::where('guest_id', auth()->user()->id)->latest()->first();
        $guestRegistration = GuestInformation::where('guest_id', auth()->user()->id)->latest()->first();
        // $rooms = Rooms::where('guest_id', auth()->user()->id)->latest()->first();
        $rooms = Manage_Room::where('id', function ($query) {
            $query->select('room_id')
                  ->from('reservations')
                  ->where('guest_id', auth()->user()->id)
                  ->latest()
                  ->first();
        })->first();

         $data = [
            
            'date' => date('m/d/Y'),
            'guestRegistration' => $guestRegistration,
            'reservation' => $reservation,
            'rooms' => $rooms
        ]; 

        $pdf = PDF::loadView('userGuest.guest_generate-invoice', $data);
     
        return $pdf->download('invoice.pdf');
    }

      
    public function __construct()
    {
                $this->middleware('auth');
    }
}
