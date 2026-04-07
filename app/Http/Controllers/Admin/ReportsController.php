<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuestInformation;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class ReportsController extends Controller
{
    public function index(){
        $status = '';
        $checkinDate = '';
        $checkoutDate = '';
        $curroomtype = '';
        $curroomnumber = '';

        $reports = DB::table('guest_information')->leftJoin('reservations', 'guest_information.reservation_id', '=', 'reservations.id')
        ->leftJoin('manage_rooms', 'reservations.room_id', '=', 'manage_rooms.id')
        ->select('guest_information.reservation_id','guest_information.first_name',
        'guest_information.last_name', 'reservations.booking_status','reservations.nights'
        ,'reservations.checkin_date','reservations.total_price', 'reservations.checkout_date', 'manage_rooms.room_type', 'manage_rooms.room_number', 'guest_information.*')
        ->orderBy('guest_information.first_name', 'asc')
        ->get();
        // ->paginate(10);

        $getrooms = DB::table('manage_rooms')->pluck('room_number');
        $getroomtypes = DB::table('room_types')->pluck('name');

        return view('admin.admin_reports', [
            'reports' => $reports,
            'status' => $status,
            'curroomtype' => $curroomtype,
            'curroomnumber' => $curroomnumber,
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
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
            return redirect()->route('admin.reports.clear');
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
        return view('admin.admin_reports', [
            'reports' => $reports,
            'status' => $status,
            'curroomtype' => $curroomtype,
            'curroomnumber' => $curroomnumber,
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
            'room_numbers' => $getrooms,
            'roomtypes' => $getroomtypes,
        ]);
    }

    public function printPDF(Request $request)
    {
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
            'date' => date('d/m/Y'),
            'authname' => Auth::guard('admin')->user()->name,
                // 'image_url' => public_path('images/DWCCLOGO.png'),
        ];

        $pdf = PDF::loadView('admin.admin_reports-details', $data)
        ->setPaper('letter', 'landscape');

        return $pdf->stream();

    
    }

    public function overallSales(){
        $dateFrom = '';
        $dateTo = '';

        $reports = DB::table('order_header')->join('beanery_users', 'beanery_users.id', '=', 'order_header.user_id')
        ->select('beanery_users.name AS cashiername','order_header.*')
        ->orderBy('order_header.id', 'desc')
        ->get();
        // ->paginate(10);

        return view('admin.admin_overallsales', [
            'reports' => $reports,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ]);
    }
//DYAT
    // public function overallSalesPreview(Request $request){
    //     $dateFrom = $request->input('dateFrom');
    //     $dateTo = $request->input('dateTo');

    //     $reports = DB::table('order_header')->join('beanery_users', 'beanery_users.id', '=', 'order_header.user_id')
    //     ->select('beanery_users.name AS cashiername','order_header.*')
    //     ->orderBy('order_header.id', 'desc')
    //     ->when($dateFrom, function ($query, $dateFrom) {
    //         return $query->where('order_header.created_at', '>=', $dateFrom.' 00:00:00');
    //     })
    //     ->when($dateTo, function ($query, $dateTo) {
    //         return $query->where('order_header.created_at', '<=', $dateTo.' 23:59:59');
    //     })
    //     ->get();
    //     // ->paginate(10);

    //     return view('admin.admin_overallsales', [
    //         'reports' => $reports,
    //         'dateFrom' => $dateFrom,
    //         'dateTo' => $dateTo,
    //     ]);
    // }

public function overallSalesPreview(Request $request){
    $dateFrom = $request->input('dateFrom');
    $dateTo   = $request->input('dateTo');
    $timeFrom = $request->input('timeFrom');
    $timeTo   = $request->input('timeTo');

    // Combine date + time
    $from = $dateFrom ? $dateFrom . ' ' . ($timeFrom ?: '00:00:00') : null;
    $to   = $dateTo   ? $dateTo   . ' ' . ($timeTo ?: '23:59:59') : null;

    $reports = DB::table('order_header')
        ->join('beanery_users', 'beanery_users.id', '=', 'order_header.user_id')
        ->select('beanery_users.name AS cashiername','order_header.*')
        ->orderBy('order_header.id', 'desc')
        ->when($from, function ($query) use ($from) {
            return $query->where('order_header.created_at', '>=', $from);
        })
        ->when($to, function ($query) use ($to) {
            return $query->where('order_header.created_at', '<=', $to);
        })
        ->get();

    return view('admin.admin_overallsales', [
        'reports' => $reports,
        'dateFrom' => $dateFrom,
        'dateTo'   => $dateTo,
        'timeFrom' => $timeFrom,
        'timeTo'   => $timeTo,
    ]);
}
//DYAT

    // public function restaurantReport(){
    //     $dateFrom = '';
    //     $dateTo = '';

    //     $sql = "SELECT COUNT(oh.user_id) AS 'counttransaction', SUM(oh.total_amount) AS 'grandtotalamount', DATE_FORMAT(oh.created_at, '%Y-%m-%d') AS created_at, bu.name 
    //             FROM microhotel.order_header AS oh
    //             INNER JOIN beanery_users AS bu
    //                 ON bu.id = oh.user_id
    //             WHERE order_status <> 'pending' GROUP BY DATE_FORMAT(oh.created_at, '%Y-%m-%d'), bu.name ORDER BY DATE_FORMAT(oh.created_at, '%Y-%m-%d') DESC";

    //     $reports = DB::select($sql);
    //     // ->paginate(10);

    //     return view('admin.admin_restaurantreport', [
    //         'reports' => $reports,
    //         'dateFrom' => $dateFrom,
    //         'dateTo' => $dateTo,
    //     ]);
    // }

    // public function restaurantReportPreview(Request $request){
    //     $dateFrom = $request->input('dateFrom');
    //     $dateTo = $request->input('dateTo');

    //     $sql = "SELECT COUNT(oh.user_id) AS 'counttransaction', SUM(oh.total_amount) AS 'grandtotalamount', DATE_FORMAT(oh.created_at, '%Y-%m-%d') AS created_at, bu.name 
    //             FROM microhotel.order_header AS oh
    //             INNER JOIN beanery_users AS bu
    //                 ON bu.id = oh.user_id
    //             WHERE order_status <> 'pending'";

    //     if($dateFrom != ""){
    //         $sql .= " AND DATE_FORMAT(oh.created_at, '%Y-%m-%d') >= '".$dateFrom."'";
    //     }

    //     if($dateTo != ""){
    //         $sql .= " AND DATE_FORMAT(oh.created_at, '%Y-%m-%d') <= '".$dateTo."'";
    //     }
        
    //     $sql .= "GROUP BY DATE_FORMAT(oh.created_at, '%Y-%m-%d'), bu.name ORDER BY DATE_FORMAT(oh.created_at, '%Y-%m-%d') DESC";

    //     $reports = DB::select($sql);
    //     // ->paginate(10);

    //     return view('admin.admin_restaurantreport', [
    //         'reports' => $reports,
    //         'dateFrom' => $dateFrom,
    //         'dateTo' => $dateTo,
    //     ]);
    // }

    //DYAT

    public function restaurantReport(){
        $dateFrom = '';
        $dateTo = '';

        $sql = "SELECT COUNT(oh.user_id) AS 'counttransaction', SUM(oh.total_amount) AS 'grandtotalamount', DATE_FORMAT(oh.created_at, '%Y-%m-%d') AS created_at, bu.name 
                -- FROM microhotel.order_header AS oh
                FROM `test-mb`.order_header AS oh
                INNER JOIN beanery_users AS bu
                    ON bu.id = oh.user_id
                WHERE order_status <> 'pending' GROUP BY DATE_FORMAT(oh.created_at, '%Y-%m-%d'), bu.name ORDER BY DATE_FORMAT(oh.created_at, '%Y-%m-%d') DESC";

        $reports = DB::select($sql);
        // ->paginate(10);

        return view('admin.admin_restaurantreport', [
            'reports' => $reports,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ]);
    }

    public function restaurantReportPreview(Request $request){
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');

        $sql = "SELECT COUNT(oh.user_id) AS 'counttransaction', SUM(oh.total_amount) AS 'grandtotalamount', DATE_FORMAT(oh.created_at, '%Y-%m-%d') AS created_at, bu.name 
                -- FROM microhotel.order_header AS oh
                FROM `test-mb`.order_header AS oh
                INNER JOIN beanery_users AS bu
                    ON bu.id = oh.user_id
                WHERE order_status <> 'pending'";

        if($dateFrom != ""){
            $sql .= " AND DATE_FORMAT(oh.created_at, '%Y-%m-%d') >= '".$dateFrom."'";
        }

        if($dateTo != ""){
            $sql .= " AND DATE_FORMAT(oh.created_at, '%Y-%m-%d') <= '".$dateTo."'";
        }
        
        $sql .= "GROUP BY DATE_FORMAT(oh.created_at, '%Y-%m-%d'), bu.name ORDER BY DATE_FORMAT(oh.created_at, '%Y-%m-%d') DESC";

        $reports = DB::select($sql);
        // ->paginate(10);

        return view('admin.admin_restaurantreport', [
            'reports' => $reports,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ]);
    }

    //DYAT

    public function inventoryReport(){
        $category = '';
        $unit_mode = '';

        $getcategories = DB::table('inventory')->groupBy('category')->pluck('category');
        $getunitmodes = DB::table('inventory')->groupBy('unit_mode')->pluck('unit_mode');

        $reports = DB::table('inventory')
        ->select('inventory.*')
        ->orderBy('inventory.category', 'asc')
        ->orderBy('inventory.item', 'asc')
        ->get();
        // ->paginate(10);

        return view('admin.admin_inventoryreport', [
            'reports' => $reports,
            'category_list' => $getcategories,
            'unit_mode_list' => $getunitmodes,
            'curcategory' => $category,
            'curunit_mode' => $unit_mode
        ]);
    }

    public function inventoryReportPreview(Request $request){
        $category = $request->input('category');
        $unit_mode = $request->input('unit_mode');

        $getcategories = DB::table('inventory')->groupBy('category')->pluck('category');
        $getunitmodes = DB::table('inventory')->groupBy('unit_mode')->pluck('unit_mode');

        $reports = DB::table('inventory')
        ->select('inventory.*')
        ->orderBy('inventory.category', 'asc')
        ->orderBy('inventory.item', 'asc')
        ->when($category, function ($query, $category) {
            return $query->where('category', $category);
        })
        ->when($unit_mode, function ($query, $unit_mode) {
            return $query->where('unit_mode', $unit_mode);
        })
        ->get();

        return view('admin.admin_inventoryreport', [
            'reports' => $reports,
            'category_list' => $getcategories,
            'unit_mode_list' => $getunitmodes,
            'curcategory' => $category,
            'curunit_mode' => $unit_mode
        ]);
    }
}
