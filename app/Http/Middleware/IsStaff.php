<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $staff_id = UserType::all()->where('type', 'staff')->first()->id;
        $admin_id = UserType::all()->where('type', 'admin')->first()->id;
        if (Auth::user()->user_type_id == $staff_id || Auth::user()->user_type_id == $admin_id) {
            return $next($request);
        } else {
            return redirect('/shop');
        }
    }
}
