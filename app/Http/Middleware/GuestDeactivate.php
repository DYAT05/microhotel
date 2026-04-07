<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth; 
class GuestDeactivate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->Acc_Stat == "Deactivate") {
            $message = 'Your account has been deactivated. Please contact the administrator';
            Auth::logout();

            return redirect()->route('login')
                ->with('status', $message)
                ->withErrors(['email' => $message]);
        }
        
        return $next($request);
    }

}
