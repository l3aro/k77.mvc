<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        // session()->flash('success', 'Tạo mới sản phẩm thành công.');

        return redirect()->route('admin.products.edit', $product->id)
            ->with('success', 'Tạo mới sản phẩm thành công.');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.products.edit', $product->id)
            ->with('success', 'Sửa sản phẩm thành công.');
    }
}
