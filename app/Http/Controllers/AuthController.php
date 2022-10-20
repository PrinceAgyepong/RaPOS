<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    function showLogin()
    {
        return view('auth.login');
    }


    public function showRegister()
    {
        return view('auth.register');
    }


    function login(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // dd('voila');
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Authentication passed...
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function register(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'confirmed|required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        
        User::create(compact('name', 'email', 'password'));
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Authentication passed...
            return redirect()->route('shop');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
