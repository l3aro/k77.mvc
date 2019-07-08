<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        // DB::table('products')->where('id', 1)->update([
        //     'detail' => 'Quần bò',
        //     'price' => '234000'
        // ]);
        // DB::table('products')->insert([
        //     'name' => 'Quần trắng',
        //     'detail' => 'Quần bò',
        //     'price' => '1634000'
        // ]);
        $conditions = [];
        $conditions[] = ['price', '>', '200000'];
        $conditions[] = ['price', '<', '700000'];
        // print_r($conditions);die;
        $products = DB::table('products')
            // ->where('name', 'like', '%ng%')
            // ->where('price', '<', '700000')  // =, >=, <=, <>, >, <
            // ->where('price', '>', '200000')
            ->whereBetween('price', [300000, 399000])
            // ->where($conditions)
            ->get();
        $product = DB::table('products')->first();

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
