<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function loginCart(Cart $cart){

        dd($cart);
        return view('auth.login-cart', $cart);
    }
    public function loginCartProcess(Request $request, Cart $cart){
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

    public function registerCart(Cart $cart){
        return view('auth.login-cart');
    }

    public function registerCartProcess(Request $request, Cart $cart){
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
