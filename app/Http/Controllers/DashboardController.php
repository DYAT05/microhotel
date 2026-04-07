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
use App\Models\Admin;

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

class DashboardController extends Controller
{
    //Display the login view.
    public function Index(){

        $contents = DB::table('dashboard_content')->where('id', 1)->first();

        return view('welcome', 
                    [
                        'image1' => $contents->image1 ?? '',
                        'image2' => $contents->image2 ?? '',
                        'image3' => $contents->image3 ?? '',
                        'image4' => $contents->image4 ?? '',
                        'contents' => $contents->contents ?? ''
                    ]
                );
    }

    public function faq(){
        $faqs = DB::table('faq')->get();

        return view('faq', ['faqs' => $faqs]);
    }
}
