<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
        return view('client.cart');
    }

    public function checkout()
    {
        return view('client.checkout');
    }

    public function complete()
    {
        return view('client.complete');
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);

        Cart::add(array(
            'id' => $request->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array()
        ));

        return response()->json([], 204);
    }
}
