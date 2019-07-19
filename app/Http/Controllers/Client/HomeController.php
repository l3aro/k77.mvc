<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Product;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        print_r('Good Morning');
        // Session::put('name', 'Baro');
        // session()->put('name2', 'Nil');
        // session(['name2' => 'Kwon']);

        // session()->flush();


        // Session::get('name2');
        // session()->get('name2');
        // echo session('name2', 'Baro Kiteeer');

        // Session::forget('name2');
        // session()->forget('name2');
        // echo session('name');

        // echo session()->has('name');

        // session()->flash('name3', 'Kiteer');

        // print_r(session()->all());



        // echo session()->get('name2');

        // $name = 34342;

        // echo $name;

        // die('im in');
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
