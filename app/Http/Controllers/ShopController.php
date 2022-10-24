<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Http\Response;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all()->whereNotNull('price');

        if (auth()->user())
            $cart = Cart::firstOrCreate(['client_id' => auth()->user()->id, 'ordered_at' => null]);
        else
            $cart = null;
        return view('shop', compact('cart', 'products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        // dd($request);
        $cart =  Cart::create();

        $product_ids = $request->all();
        unset($product_ids['_token']);

        foreach ($product_ids as $id => $binary) {
            $cart->products()->attach($id);
        }
        // dd($cart->products);
        return redirect()->route('login.cart.show', $cart);

        // $data = $request->all();
        // app('redirect')->setIntendedUrl(route('cart', $cart->id));

        // if (auth()->user())
        //     dd('hi');
        // else{
        //     return redirect('/shop/cart/' . $cart->id);
        // }
    }

    public function cart_products(){

    }
    
}
