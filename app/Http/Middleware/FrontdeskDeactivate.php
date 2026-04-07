<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class FrontdeskDeactivate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (Auth::guard('frontdesk')->check() && Auth::guard('frontdesk')->user()->Acc_Stat == "Inactive") {
        $message = 'Your account has been deactivated. Please contact the administrator.';
        Auth::guard('frontdesk')->logout();

        return redirect()->route('frontdesk_login_form')
            ->with('status', $message)
            ->withErrors(['email' => $message]);
    }

    return $next($request);
}

}
