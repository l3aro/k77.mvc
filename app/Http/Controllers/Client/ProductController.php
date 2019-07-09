<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('client.detail', [
            'product' => $product
        ]);
    }

    public function shop()
    {
        $products = Product::orderBy('id', 'desc')->paginate(6);
        return view('client.shop', [
            'products' => $products
        ]);
    }
}
