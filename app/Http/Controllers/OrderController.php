<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
       $orders = Cart::all()->where('submitted', true);
       return view('orders', compact('orders'));
    }
}
