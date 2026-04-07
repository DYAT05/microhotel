<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class BeaneryUserDeactivate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (Auth::guard('beanery_user')->check() && Auth::guard('beanery_user')->user()->status == "Deactivate") {
        $message = 'Your account has been deactivated. Please contact the administrator.';
        Auth::guard('beanery_user')->logout();

        return redirect()->route('beanery_user_login_form')
            ->with('status', $message)
            ->withErrors(['email' => $message]);
    }

    return $next($request);
}

}
