<?php

namespace App\Http\Controllers;

//Default
use Illuminate\Http\Request;

//Login
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

//Register
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;
use App\Models\Cashier;

//Count users
use App\Models\User;
use App\Models\Frontdesk;
use App\Models\BeaneryUser;
use App\Models\Manage_Room;
use Illuminate\Support\Facades\DB;

//Change Password
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class KitchenController extends Controller
{
    //Display the login view.
    public function Index(){

        return view('kitchen.kitchen_login');
    }

    //Display the dashboard view.
    public function Dashboard(){
        $totalGuest = DB::table('users')->count();
        $totalFrontdesk = DB::table('frontdesks')->count();
        $totalCashier = DB::table('beanery_users')->where('usertype', 'cashier')->count();
        $totalStockController = DB::table('beanery_users')->where('usertype', 'stockcontroller')->count();

        // DYAT
         $totalKitchen = DB::table('beanery_users')->where('usertype', 'kitchen')->count();
        //DYAT
        $totalRoom = DB::table('manage_rooms')->count();

        return view('kitchen.kitchen_dashboard', compact('totalGuest', 'totalFrontdesk', 'totalStockController', 'totalCashier', 'totalRoom', '$totalKitchen'));
    }

    //Handle an incoming login request.
    public function Login(LoginRequest $request): RedirectResponse
    {
        echo "d2"; exit;

        $request->authenticate_Kitchen();

        $request->session()->regenerate();

        return redirect()->route('kitchen.dashboard');
    }

    //Destroy an authenticated session or Logout.
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login_form');
        // return redirect('/admin/login');
    }
}
