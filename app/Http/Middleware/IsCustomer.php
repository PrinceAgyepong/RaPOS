<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCustomer
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
        $staff_id = UserType::all()->where('type', 'customer')->first()->id;
        if (Auth::user()->user_type_id == $staff_id) {
            return $next($request);
        } else {
            return redirect('/dashboard');
        }
    }
}
