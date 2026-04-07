<?php
namespace App\Http\Controllers\Guest;
use App\Models\Manage_Room;

use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\GuestInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GuestInformationController extends Controller
{
    public function GuestInfo(Request $request){

        $guest_id = auth()->user()->id;
        $phone_number = $request->validate([
            'phone_number' => 'required|regex:/^09[0-9]{9}$/',
        ], [
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.regex' => 'The phone number contain 11 digit.'
        ]);
        
        $room_id = Session::get('room_id');
        $checkin_date = Session::get('check_in_date');
        $checkout_date = Session::get('check_out_date');

        $checkin_date_formatted = date('Y-m-d', strtotime($checkin_date));
        $checkout_date_formatted = date('Y-m-d', strtotime($checkout_date));

        $reservations = Reservations::where('room_id', $room_id)
        ->where('checkout_date', '>', $checkin_date_formatted) // Check if room is available after the selected check-in date
        ->where('checkin_date', '<', $checkout_date_formatted) // Check if room is available before the selected check-out date
        ->get();
    

    if (!$reservations->isEmpty()) {
        // room is already reserved, return an error message or redirect back with an error message
        return redirect()->back()->with('error', 'The room is already reserved for the selected dates.');
    }else{
            $room_id = Session::get('room_id');
            $checkIn  = Session::get('check_in_date');
            $checkOut = Session::get('check_out_date');
            $numGuests = Session::get('guest_num');
            $numNights = Session::get('number_of_nights');
            
            $checkindateSave = date('Y-m-d', strtotime($checkIn));
            $checkoutdateSave = date('Y-m-d', strtotime($checkOut));

            $additionalFeePerGuest  = 300;
            $roomPrice = Manage_Room::where('id', $room_id)->value('rate');
            if ($numNights > 1) {
                $total_roomPrice = $roomPrice * $numNights;
            } else {
                $total_roomPrice = $roomPrice;
            }
            $max_capacity = Manage_Room::where('id', $room_id)->value('max_capacity');
            $numAdditionalGuests = $numGuests - $max_capacity;
            if ($numAdditionalGuests > 0 ) {
                $total_numGuestFee = $numAdditionalGuests  *  $additionalFeePerGuest;
            } else{
                $total_numGuestFee  = 0;
                $numAdditionalGuests = 0;
            }
            
            $totalPrice = $total_roomPrice +  $total_numGuestFee;

            $reservation = new Reservations;
            $reservation->guest_id = $guest_id;
            $reservation->room_id = $room_id;
            $reservation->checkin_date = $checkindateSave;
            $reservation->checkout_date = $checkoutdateSave;
            $reservation->nights = $numNights;
            $reservation->booking_status = 'Pending';
            $reservation->booking_types = 'Online'; 
            $reservation->base_price = $roomPrice;
            $reservation->total_price = $totalPrice;
            $reservation->guests_num = $numGuests;
            $reservation->additional_guests = $numAdditionalGuests;
            $reservation->guests_Fee = $total_numGuestFee;
            $reservation->expired_date = date('Y-m-d H:i:s', strtotime('+1 day', strtotime(date('Y-m-d H:i:s'))));
            $reservation->save();

            $reservation_id = Reservations::select('id')->latest('id')->value('id');
            // Validate the request data

            $salutation = $request->input('salutation');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $company_name = $request->input('company_name');
            $address = $request->input('address');
            $phone_number = $request->input('phone_number');
            $payment_method = $request->input('payment_method');
            $department_id = $request->input('department');

            $salutation = $request->input('salutation');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $company_name = $request->input('company_name');
            $address = $request->input('address');
            $phone_number = $request->input('phone_number');
            $payment_method = $request->input('payment_method');
            $department_id = $request->input('department');

            $guestInformation = new GuestInformation();
            $guestInformation->guest_id = $guest_id;
            $guestInformation->reservation_id = $reservation_id;
            $guestInformation->salutation = $salutation;
            $guestInformation->first_name = $first_name;
            $guestInformation->last_name = $last_name;  
            $guestInformation->company_name = $company_name;
            $guestInformation->address = $address;
            $guestInformation->phone_number = $phone_number;
            $guestInformation->payment_status = 'Unpaid'; 
            if($payment_method == "Cash"){
                $guestInformation->payment_method = $payment_method;
            }else if($payment_method == "Department Charge"){
                $guestInformation->payment_method = $payment_method;
                if($department_id == "School of Information Technology"){
                    $guestInformation->department = $department_id;
                }else if($department_id == "School of Education"){
                    $guestInformation->department = $department_id;
                }
                else if($department_id == "School of Business and Hospitality and Tourism Management"){
                    $guestInformation->department = $department_id;
                }
                else if($department_id == "School of Engineering and Architechture and Fine Arts"){
                    $guestInformation->department = $department_id;
                }
                else if($department_id == "School of Liberal Arts and Criminal Justice"){
                    $guestInformation->department = $department_id;
                }
            }
            $guestInformation->save();
            // Session::forget('room_id');
            // Session::forget('check_in_date');
            // Session::forget('check_out_date');
            // Session::forget('guest_num');
            // Session::forget('number_of_nights');
            }
    // Redirect to a success page
        return redirect()->route('view.invoice');   
    }
}
