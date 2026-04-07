<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Reservations;
use App\Models\GuestInformation;
use App\Models\Manage_Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //  $bookings = Reservations::all();
         
        
        $bookings = GuestInformation::join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.first_name','guest_information.last_name','reservations.booking_status', 'reservations.checkin_date', 'reservations.checkout_date', 'reservations.total_price', 'reservations.created_at','manage_rooms.rate', 'manage_rooms.room_type')
        ->orderBy('reservations.created_at', 'asc')
        ->get();

         foreach ($bookings as $booking) {
            $booking->checkin_date = Carbon::parse($booking->checkin_date);
            $booking->checkout_date = Carbon::parse($booking->checkout_date);
            $booking->created_at = Carbon::parse($booking->created_at);
        }

        return response(view('admin.admin_booking-history', compact('bookings')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
    public function filter(Request $request)
{
    $query = GuestInformation::join('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->join('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select(
            'guest_information.first_name',
            'guest_information.last_name',
            'reservations.booking_status',
            'reservations.checkin_date',
            'reservations.checkout_date',
            'manage_rooms.room_type',
            'manage_rooms.rate',
            'reservations.total_price',
            'reservations.created_at'
        )
        ->orderBy('reservations.created_at', 'asc');

    $todayDate = Carbon::now()->format('Y-m-d');
    $bookings = $query->when($request->date != null, function($q) use ($request) {
            return $q->whereDate('reservations.created_at', $request->date);
        }, function($q) use ($todayDate) {
            return $q->whereDate('reservations.created_at', $todayDate);
        })
        ->paginate(10); 

    return view('admin.admin_booking-history', compact('bookings'));
}

}
