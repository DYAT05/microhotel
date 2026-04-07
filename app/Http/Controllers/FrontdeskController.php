<?php

namespace App\Http\Controllers;

//Login
use Barryvdh\DomPDF\PDF;
use App\Models\Frontdesk;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Manage_Room;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\GuestInformation;
use Illuminate\Support\Facades\DB;

//Register
use App\Models\Walkin_Reservations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

// Reports
use Illuminate\Validation\Rules\Password;

class FrontdeskController extends Controller
{
    public function Index(){
        return view('frontdesk.frontdesk_login');
    }

    public function Dashboard(){
      
        $currentDate = date('Y-m-d');
        
        $completeBookingsCount = Reservations::where('booking_status', 'Completed')
        // ->whereDate('created_at', today())
        ->whereDate('checkin_date', '<=', $currentDate)
        ->whereDate('checkout_date', '>=', $currentDate)
        ->count();

        $AvailableRoomCount = Manage_Room::whereNotIn('id', function($query) use ($currentDate) {
            $query->select('room_id')
                  ->from('reservations')
                  ->where('is_checkedin', 1)
                  ->where('checkin_date', '<=', $currentDate)
                  ->where('checkout_date', '>=', $currentDate);
        })->count();

        $AvailableRoomList = Manage_Room::whereNotIn('id', function($query) use ($currentDate) {
            $query->select('room_id')
                  ->from('reservations')
                  ->where('is_checkedin', 1)
                  ->where('checkin_date', '<=', $currentDate)
                  ->where('checkout_date', '>=', $currentDate);
        })->get();

        $todayReservationsCount = Reservations::whereDate('checkin_date', '<=', $currentDate)
        ->whereDate('checkout_date', '>=', $currentDate)
        ->where('is_checkedin', 1)
         // whereDate('created_at', today())
        ->count();

        return view('frontdesk.frontdesk_dashboard',[
        'confirmedBookingsCount'=>$completeBookingsCount,
        'roomCount'=>$AvailableRoomCount,
        'todayReservationsCount'=>$todayReservationsCount,  
        'availableRooms' => $AvailableRoomList,
      ]);
    }
    // public function FrontdeskLogin(LoginRequest $request): RedirectResponse
    // {
    //     $remember = $request->has('remember');
    //     $request->authenticate_Frontdesk($remember);
    
    //     if ($remember) {
    //         $cookie = cookie('frontdesk_credentials', [
    //             'email' => $request->email,
    //             'password' => $request->password
    //         ], 60 * 24 * 7); // 1 week expiration time
    //         return redirect()->route('frontdesk.dashboard')->withCookie($cookie);
    //     }
    
    //     $request->session()->regenerate();
    
    //     return redirect()->route('frontdesk.dashboard');
    // }
    
    // Handle an incoming login request.
    public function FrontdeskLogin(LoginRequest $request): RedirectResponse
    {
        $remember = $request->has('remember');

        $request->authenticate_Frontdesk($remember);

        $request->session()->regenerate();

        return redirect()->route('frontdesk.dashboard');
    }

    // Destroy an authenticated session or Logout.
        public function FrontdeskLogout(Request $request): RedirectResponse
        {
            Auth::guard('frontdesk')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('frontdesk_login_form');
        
            // return redirect('/frontdesk/login');
        }

    //Display the registration view.
    public function FrontdeskRegister(){
        return view('frontdesk.frontdesk_register');
    }

    //Handle an incoming registration request.
    public function FrontdeskRegisterCreate(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'max:255', 'unique:'.Frontdesk::class],
            'password' => ['required', 'confirmed', 
            Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);

        $frontdesk = Frontdesk::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Acc_Stat' => 'Active',
        ]);

        event(new Registered($frontdesk));
        // return redirect('/frontdesk/login');
        return redirect()->route('admin.frontdeskList')->with('registered', 'Frontdesk account is successfully registered.');

    }
    public function FrontdeskReservation(){
        $rooms = Manage_Room::all();

        $room_type = Manage_Room::distinct()->pluck('room_type');
        return view('frontdesk.frontdesk_reservation', [
            'room_type' => $room_type,

        ]);
    }

    public function GetRoomID(Request $request)
    {   $rooms = Manage_Room::all();
        $roomType = $request->input('room_type');
        $room = Manage_Room::where('room_type', $roomType)->first();
    
        if ($room){
        $roomId = $room->id;
        $maxCapacity = $room->max_capacity;
        return response()->json(['room_id' => $roomId, 'max_capacity' => $maxCapacity]);
        } else {
            return response()->json(['error' => 'Room type not found']);
        }
    }
    
    public function GetRoomIDs(Request $request){
        $roomType = $request->input('room_type');
        $checkin_date = $request->input('check_in_date');
        $checkout_date = $request->input('check_out_date');
        $rooms = Manage_Room::where('room_type', $roomType)->get();

        
        $roomavailable = [];
        foreach ($rooms as $room) {
            $checking = $this->isRoomReserved($room->id, $checkin_date, $checkout_date);

            if(!$checking){
                $roomavailable[] = ['id' => $room->id, 'room_number' => $room->room_number];
            }
        }
    
        if ($roomavailable){
            return response()->json($roomavailable);
        } else {
            return response()->json(['error' => 'Room type not found']);
        }
    }
    
    public function isRoomReserved($roomTypeId, $checkin_date, $checkout_date)
    {
        if (!$checkin_date || !$checkout_date) {
            // If check-in or check-out dates are not set, return true to disable the button
            return true;
        }
        $checkInDateObj = new \DateTime($checkin_date);
        $checkOutDateObj = new \DateTime($checkout_date);
    
        $reservations = Reservations::where('room_id', $roomTypeId)
            ->where(function ($query) use ($checkInDateObj, $checkOutDateObj) {
                $query->whereBetween('checkin_date', [$checkInDateObj, $checkOutDateObj])
                    ->orWhereBetween('checkout_date', [$checkInDateObj, $checkOutDateObj])
                    ->orWhere(function ($query) use ($checkInDateObj, $checkOutDateObj) {
                        $query->where('checkin_date', '<=', $checkInDateObj)
                            ->where('checkout_date', '>=', $checkOutDateObj);
                    });
            })->get();
    
        return count($reservations) > 0;
    }
    
    public function GetRoomGuestCount(Request $request){
        $roomNo = $request->input('room_no');
        $room = Manage_Room::where('id', $roomNo)->first();
    
        if ($room){
            $maxCapacity = $room->max_capacity;
            return response()->json(['max_capacity' => $maxCapacity]);
        } else {
            return response()->json(['error' => 'Room type not found']);
        }
    }
     
     public function FrontdeskReservationSave(Request $request)
    {
        if (Auth::guard('frontdesk')->check()) {
            $frontdesk_id = Auth::guard('frontdesk')->id();
        } else {
            return abort(401, 'Unauthorized');
        }
        
        $phone_number = $request->validate([
            'phone_number' => 'required|regex:/^09[0-9]{9}$/',
        ], [
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.regex' => 'The phone number must contain 11 digit.'
        ]);

        $room_id = $request->input('room_no');
        $checkin_date = $request->input('check_in_date');
        $checkout_date = $request->input('check_out_date');
        
        $checkin_date_formatted = date('Y-m-d', strtotime($checkin_date));
        $checkout_date_formatted = date('Y-m-d', strtotime($checkout_date));
        $reservations = Reservations::where('room_id', $room_id)
        ->where('checkout_date', '>', $checkin_date_formatted) // Check if room is available after the selected check-in date
        ->where('checkin_date', '<', $checkout_date_formatted) // Check if room is available before the selected check-out date
        ->get();

    if (!$reservations->isEmpty()){
        // room is already reserved, return an error message or redirect back with an error message
        return redirect()->back()->with('error', 'The room is already reserved for the selected dates.');
    
    }else{
            // $request->validate([
            //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            //     'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
            // ]);
            $useraccount = User::where('email', $request->input('email'))->orderBy('id', 'DESC')->first();

            if(!$useraccount){
                $user = User::create([
                    'name' => $request->input('first_name').' '.$request->input('last_name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'Acc_Stat' => 'Activate',
                ]);
    
                event(new Registered($user));

                $useraccount = User::where('email', $request->input('email'))->orderBy('id', 'DESC')->first();
            }

            $room_id = $request->input('room_no');
            $checkin_date = $request->input('check_in_date');
            $checkout_date = $request->input('check_out_date');
            $numGuests = $request->input('guest_num');
            $numNights = $request->input('number_of_nights');
            
            $checkindateSave = date('Y-m-d', strtotime($checkin_date));
            $checkoutdateSave = date('Y-m-d', strtotime($checkout_date));

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
            }
            $totalPrice = $total_roomPrice +  $total_numGuestFee;

            $reservation = new Reservations();
            $reservation->guest_id = $useraccount->id;
            $reservation->frontdesk_id = $frontdesk_id;
            $reservation->room_id = $room_id;
            $reservation->checkin_date = $checkindateSave;
            $reservation->checkout_date = $checkoutdateSave;
            $reservation->nights = $numNights;
            $reservation->booking_status = 'Pending';
            $reservation->booking_types = 'Walk-in';    
            $reservation->base_price = $roomPrice;
            $reservation->total_price = $totalPrice;
            $reservation->guests_num = $numGuests;
            $reservation->additional_guests = $numAdditionalGuests;
            $reservation->guests_Fee = $total_numGuestFee;
            $reservation->save();
            // dd($reservation);

         
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
            $guestInformation->guest_id = $useraccount->id;
            $guestInformation->frontdesk_id = $frontdesk_id;
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
            // return redirect()->back()->with('success', 'Save reservation');
            
        }
        // Session::flash('success', 'Your reservation was successful.');
        return redirect()->route('frontdesk.view.invoice');

    }
    public function FrontdeskBookingDetails(){

        $reservations = GuestInformation::join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.reservation_id','guest_information.first_name','guest_information.last_name','guest_information.payment_status', 'guest_information.payment_method','reservations.booking_status', 'reservations.checkin_date','reservations.total_price', 'reservations.checkout_date','reservations.is_checkedin')
        ->orderBy('guest_information.first_name', 'asc')
        ->get();

        return view('frontdesk.frontdesk_bookingdetails', [
            'reservationData' => $reservations,

        ]);
    }

    // SOFT DELETE
    public function softDeletesReservation($reservation_id)
    {
        // $reservations = Reservations::findorFail($reservation_id);
        $reservations = GuestInformation::join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.id', 'reservations.id as reservation_id', 'guest_information.first_name', 'guest_information.last_name', 'guest_information.payment_method',
        'guest_information.payment_status','reservations.booking_status', 'reservations.checkin_date', 'reservations.total_price', 'reservations.checkout_date',)
        ->where('guest_information.reservation_id', '=', $reservation_id)
        
        ->get();
        
        if ($reservations->count() > 0) {
            foreach ($reservations as $reservation) {
                DB::table('reservations')->where(['id' => $reservation_id])->update(['booking_status' => 'Cancelled']);

                $reservation->delete(); // Soft delete the record
                // $booking_status = new Reservations();
                // $booking_status->booking_status = 'Cancelled';
            } 
            return redirect()->back()->with('success', 'Item soft deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Reservation not found');
        }
    }
   // RESTORE SOFT DELETE ITEMS
    public function viewDeletedGuestInformation()
    {
        $deletedGuestInformation = GuestInformation::withTrashed()->onlyTrashed()->get();
        return view('deleted-guest-information', ['guestInformation' => $deletedGuestInformation]);
    }


    public function FrontdeskReports(){
        $status = '';
        $checkinDate = '';
        $checkoutDate = '';
        $curroomtype = '';
        $curroomnumber = '';

        $getrooms = DB::table('manage_rooms')->pluck('room_number');
        $getroomtypes = DB::table('room_types')->pluck('name');
      
        $reports = DB::table('guest_information')->join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.reservation_id','guest_information.first_name',
        'guest_information.last_name', 'reservations.booking_status','reservations.nights'
        ,'reservations.checkin_date','reservations.total_price', 'reservations.checkout_date','manage_rooms.room_type',
        'manage_rooms.room_number', 'guest_information.*')
        ->orderBy('guest_information.first_name', 'asc')
        ->get();

        return view('frontdesk.frontdesk_reports', [
            'reports' => $reports,
            'status' => $status,
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
            'curroomtype' => $curroomtype,
            'curroomnumber' => $curroomnumber,
            'room_numbers' => $getrooms,
            'roomtypes' => $getroomtypes,
        ]);
    }

    public function preview(Request $request)
    {
        // Retrieve the input values from the request
        $status = $request->input('status', '');
        $checkinDate = $request->input('checkin_date');
        $checkoutDate = $request->input('checkout_date');
        $curroomtype = $request->input('room_type');
        $curroomnumber = $request->input('room_number');

        if ($request->has('clear')) {
            return redirect()->route('frontdesk.reports.clear');
        }

        $getrooms = DB::table('manage_rooms')->pluck('room_number');
        $getroomtypes = DB::table('room_types')->pluck('name');

        // Retrieve the filtered orders
        $reports = DB::table('guest_information')->leftJoin('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->leftJoin('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.first_name','guest_information.last_name','reservations.booking_status', 'reservations.checkin_date', 'reservations.checkout_date', 'reservations.total_price', 'reservations.nights', 'manage_rooms.room_number', 'manage_rooms.room_type', 'guest_information.*')
        
        ->when($status, function ($query, $status) {
            return $query->where('reservations.booking_status', $status);
        })
        ->when($checkinDate, function ($query, $checkinDate) {
            return $query->where('reservations.checkin_date', '>=', $checkinDate);
        })
        ->when($checkoutDate, function ($query, $checkoutDate) {
            return $query->where('reservations.checkout_date', '<=', $checkoutDate);
        })
        ->when($curroomtype, function ($query, $curroomtype) {
            return $query->where('manage_rooms.room_type', $curroomtype);
        })
        ->when($curroomnumber, function ($query, $curroomnumber) {
            return $query->where('manage_rooms.room_number', $curroomnumber);
        })
        ->get();
        // ->paginate(10);
        

        // Pass the orders and input values to the view
        return view('frontdesk.frontdesk_reports', [
            'reports' => $reports,
            'status' => $status,
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
            'curroomtype' => $curroomtype,
            'curroomnumber' => $curroomnumber,
            'room_numbers' => $getrooms,
            'roomtypes' => $getroomtypes,
        ]);
    }

    public function printPDF(Request $request)
    {
        
        if (Auth::guard('frontdesk')->check()) {
            $frontdesk_id = Auth::guard('frontdesk')->id();
        } else {
            return abort(401, 'Unauthorized');
        }

        $frontdeskinfo = Frontdesk::where('id', $frontdesk_id)->first();

        // Retrieve the input values from the request
        $status = $request->input('status', '');
        $checkinDate = $request->input('checkin_date');
        $checkoutDate = $request->input('checkout_date');
        $curroomtype = $request->input('room_type');
        $curroomnumber = $request->input('room_number');
    
        // Retrieve the filtered orders
        $reports = GuestInformation::leftJoin('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
            ->leftJoin('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
            ->select('guest_information.first_name', 'guest_information.last_name', 'reservations.booking_status', 'reservations.checkin_date', 'reservations.checkout_date', 'reservations.total_price', 'reservations.nights', 'manage_rooms.room_number', 'manage_rooms.room_type')
            ->when($status, function ($query, $status) {
                return $query->where('reservations.booking_status', $status);
            })
            ->when($checkinDate, function ($query, $checkinDate) {
                return $query->where('reservations.checkin_date', '>=', $checkinDate);
            })
            ->when($checkoutDate, function ($query, $checkoutDate) {
                return $query->where('reservations.checkout_date', '<=', $checkoutDate);
            })
            ->when($curroomtype, function ($query, $curroomtype) {
                return $query->where('manage_rooms.room_type', $curroomtype);
            })
            ->when($curroomnumber, function ($query, $curroomnumber) {
                return $query->where('manage_rooms.room_number', $curroomnumber);
            })
            ->get();

        // Pass the orders and input values to the view
        $data = [
            'reports' => $reports,
            'authname' => $frontdeskinfo->name,
            'date' => date('d/m/Y'),
            // 'image_url' => public_path('images/DWCCLOGO.png'),
        ];

        $pdf = app('dompdf.wrapper')->loadView('frontdesk.frontdesk_reports-details', $data)->setPaper('letter', 'landscape');
        return $pdf->stream();

    }

    public function inactive($id)
    {
        $frontdesk = Frontdesk::findOrFail($id);
        $frontdesk->Acc_Stat = 'Inactive';
        $frontdesk->save();
        return redirect()->back()->with('deactivate', 'User deactivated successfully!');
    }
    public function active($id)
    {
        $frontdesk = Frontdesk::findOrFail($id);
        $frontdesk->Acc_Stat = 'Active';
        $frontdesk->save();
        return redirect()->back()->with('success', 'User activated successfully!');
    }


    public function FrontdeskPayment(){
        $reservations = GuestInformation::join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.reservation_id','guest_information.first_name','guest_information.last_name', 'guest_information.payment_method','guest_information.payment_status','reservations.booking_types', 'reservations.checkin_date','reservations.total_price', 'reservations.checkout_date',)
        ->orderBy('guest_information.first_name', 'asc')
        ->get();
        return view('frontdesk.frontdesk_payment', [
            'reservationData' => $reservations,
        ]);
    }
    
    public function FrontdeskConfirmedBooking(){
        $reservations = GuestInformation::join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.reservation_id','guest_information.first_name','guest_information.last_name', 'guest_information.payment_method','guest_information.payment_status','reservations.booking_types', 'reservations.checkin_date','reservations.total_price', 'reservations.is_checkedin', 'reservations.checkout_date',)
        ->whereDate('reservations.checkin_date', '<=', today())
        ->whereDate('reservations.checkout_date', '>=', today())
        ->orderBy('guest_information.first_name', 'asc')
        ->get();
        return view('frontdesk.frontdesk_confirmedbooking', [
            'reservationData' => $reservations,
        ]);
    }
    
    public function FrontdeskGuestToday(){
        $reservations = GuestInformation::join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.reservation_id','guest_information.first_name','guest_information.last_name', 'guest_information.payment_method','guest_information.payment_status','reservations.booking_types', 'reservations.checkin_date','reservations.total_price', 'reservations.is_checkedin', 'reservations.checkout_date',)
        ->whereDate('checkin_date', '<=', today())
        ->whereDate('checkout_date', '>=', today())
        ->where('is_checkedin', 1)
        ->orderBy('guest_information.first_name', 'asc')
        ->get();
        return view('frontdesk.frontdesk_guesttoday', [
            'reservationData' => $reservations,
        ]);
    }

    public function updateBookingStatus(Request $request)
    {
        $request->validate([
            'receipt_no' => ['required'],
        ]);
        
        $invoice_no = $request->input('receipt_no');
        $guestInformation = GuestInformation::where('reservation_id', $invoice_no)->first();

        if ($guestInformation) {
            // Check if the reservation ID in the guest information table matches the reservation ID in the reservation table
            if ($guestInformation->reservation_id == $request->input('reservation_id')) {
                $guestInformation->payment_status = 'Paid';    
                $guestInformation->save();
            
                $reservation = $guestInformation->reservation;
                $reservation->booking_status = 'Completed';
                $reservation->save();
        
                return redirect()->back()->with('success', 'The payment status was verified successfully.');
            } else {
                return redirect()->back()->with('error', 'The invoice number does not match the reservation ID.');
            }
        } else {
            return redirect()->back()->with('error', 'The input invoice number is incorrect');
        }
    }
    

    public function updateBookingCheckin(Request $request)
    {
        $request->validate([
            'receipt_no' => ['required'],
        ]);
        $invoice_no = $request->input('receipt_no');
        $guestInformation = GuestInformation::where('reservation_id', $invoice_no)->first();
        
        if ($guestInformation) {
            // Check if the reservation ID in the guest information table matches the reservation ID in the reservation table
            if ($guestInformation->reservation_id === $guestInformation->reservation->id) {
                $reservation = $guestInformation->reservation;

                $reservation->is_checkedin = '1';
                $reservation->save();
        
                return redirect()->back()->with('success', 'Checked-in successfully.');
            } else {
                return redirect()->back()->with('error', 'The invoice number does not match the reservation ID.');
            }
        } else {
            return redirect()->back()->with('error', 'The input invoice number is incorrect');
        }
    }
    

    public function updateBookingCheckout(Request $request)
    {
        $request->validate([
            'receipt_no' => ['required'],
        ]);
        $invoice_no = $request->input('receipt_no');
        $guestInformation = GuestInformation::where('reservation_id', $invoice_no)->first();
        
        if ($guestInformation) {
            // Check if the reservation ID in the guest information table matches the reservation ID in the reservation table
            if ($guestInformation->reservation_id === $guestInformation->reservation->id) {
                $reservation = $guestInformation->reservation;

                $reservation->is_checkedin = '2';
                $reservation->save();
        
                return redirect()->back()->with('success', 'Checked-out successfully.');
            } else {
                return redirect()->back()->with('error', 'The invoice number does not match the reservation ID.');
            }
        } else {
            return redirect()->back()->with('error', 'The input invoice number is incorrect');
        }
    }
    
    
}
