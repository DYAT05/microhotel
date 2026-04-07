<?php

namespace App\Http\Controllers;

//Login
use Barryvdh\DomPDF\PDF;
use App\Models\BeaneryUser;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

// Reports
use Illuminate\Validation\Rules\Password;

class BeaneryController extends Controller
{
    public function inactive($id)
    {
        $frontdesk = BeaneryUser::findOrFail($id);
        $frontdesk->status = 'Inactive';
        $frontdesk->save();
        return redirect()->back()->with('Inactive', 'User deactivated successfully!');
    }

    public function active($id)
    {
        $frontdesk = BeaneryUser::findOrFail($id);
        $frontdesk->status = 'Active';
        $frontdesk->save();
        return redirect()->back()->with('success', 'User activated successfully!');
    }
    
    public function CashierRegisterCreate(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'max:255', 'unique:'.BeaneryUser::class],
            'password' => ['required', 'confirmed', 
            Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);

        $cashier = BeaneryUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5(base64_encode(md5($request->password))),
            'status' => 'Active',
            'usertype' => 'cashier'
        ]);

        event(new Registered($cashier));
        // return redirect('/frontdesk/login');
        return redirect()->route('admin.cashierList')->with('registered', 'Cashier account is successfully registered.');

    }

    //DYAT

    public function KitchenRegisterCreate(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'max:255', 'unique:'.BeaneryUser::class],
            'password' => ['required', 'confirmed', 
            Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);

        $kitchen = BeaneryUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5(base64_encode(md5($request->password))),
            'status' => 'Active',
            'usertype' => 'kitchen'
        ]);

        event(new Registered($kitchen));
        // return redirect('/frontdesk/login');
        return redirect()->route('admin.kitchenList')->with('registered', 'Kitchen account is successfully registered.');

    }
    // DYAT
    
    public function StockcontrollerRegisterCreate(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'max:255', 'unique:'.BeaneryUser::class],
            'password' => ['required', 'confirmed', 
            Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);

        $cashier = BeaneryUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5(base64_encode(md5($request->password))),
            'status' => 'Active',
            'usertype' => 'stockcontroller'
        ]);

        event(new Registered($cashier));
        // return redirect('/frontdesk/login');
        return redirect()->route('admin.stockcontrollerList')->with('registered', 'Cashier account is successfully registered.');

    }
}
