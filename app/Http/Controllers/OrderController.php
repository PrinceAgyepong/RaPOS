<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Sale;
use App\Models\SoldProduct;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (auth()->user()->userType->type == "admin")
            $orders = Cart::all()->where('submitted', true);
        else
            $orders = auth()->user()->carts->where('submitted', true);

        return view('orders', compact('orders'));
    }

    public function complete(Cart $order){
        $sale = new Sale();
        $sale->client_id = $order->client_id;
        $sale->user_id = $order->attendant_id;
        //checkout sale
        $status = 'balanced';
        $balance = 0;
        $sale->update(compact('status', 'balance'));

        SoldProduct::create([
            
        ]);

        $transaction = Transaction::create([
            'type' => 'sale (paid)',
            'amount' => null,
            'sale_id' => $sale->id
        ]);


        
        return redirect()->route('sales.index');
    }
}
