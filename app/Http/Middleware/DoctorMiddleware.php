<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (!Auth::guard('doctor')->check()) {
        return redirect('/doctor/login');
    }

    return $next($request);
}

}
