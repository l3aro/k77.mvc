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
            'attributes' => array(
                'avatar' => $product->avatar
            )
        ));

        return response()->json(['quantity' => Cart::getTotalQuantity()>9?'9+':Cart::getTotalQuantity()], 200);
    }

    public function update(Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        $summedPrice = Cart::get($request->id)->getPriceSum();

        return response()->json([
            'summedPrice' => number_format($summedPrice),
            'subTotal' => number_format(Cart::getSubTotal())
        ], 200);
    }

    public function destroy(Request $request)
    {
        Cart::remove($request->id);

        return response()->json([], 204);
    }
}
