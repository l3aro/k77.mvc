<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::whereBetween('price', [300000, 399000])->get();

        return view('client.index', ['products' => $products]);
    }
    
    public function contact()
    {
        return view('client.contact');
    }

    public function about()
    {
        return view('client.about');
    }
}
