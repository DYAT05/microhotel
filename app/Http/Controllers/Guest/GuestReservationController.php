<?php

namespace App\Http\Controllers\Guest;
use Carbon\Carbon;
use App\Models\Manage_Room;
use Illuminate\Support\Facades\Session;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GuestReservationController extends Controller
{
    public function GuestViewRoom($room_id)
    {
        $rooms = Manage_Room::where('id', $room_id)->first();

        $checkin_date = session('check_in_date');
        $checkout_date = session('check_out_date');
        $number_of_nights = session('number_of_nights'); 

       return view('userGuest.guest_room_info',
         [
         'check_in_date' => $checkin_date,
          'check_out_date' => $checkout_date,
          'number_of_nights' => $number_of_nights,
          'rooms'=>$rooms,
        ]);
        
    }
    
    public function GuestSaveReserve(Request $request){
        $guest_id  = auth()->user()->id;
        
        $numNights = $request->input('number_of_nights');
        $room_id = $request->input('room_id');
        $numGuests = $request->input('guest_num');
        $extraBed = $request->input('extra_bed');
        $checkIn = $request->input('check_in_date');
        $checkOut = $request->input('check_out_date');
            
        Session::put('number_of_nights', $request->input('number_of_nights'));
        Session::put('room_id', $request->input('room_id'));
        Session::put('guest_num', $request->input('guest_num'));
        Session::put('extra_bed', $request->input('extra_bed'));
        Session::put('check_in_date', $request->input('check_in_date'));
        Session::put('check_out_date', $request->input('check_out_date'));
        
            
        return redirect()->route('registration.form');
    }
    public function ViewGuestInfo() {
  
        return view('userGuest.guest_registration', );
    } 
}
