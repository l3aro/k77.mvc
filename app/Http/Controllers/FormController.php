<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function get(Request $request)
    {
        return view('form');
    }

    public function post(Request $request)
    {
        app()->setLocale('vi');

        $request->validate([
            'title' => 'required|max:20'
        ], [
            'title.max' => 'Nhiều ký tự quá'
        ]);

        $attributes = $request->all();
        if ($request->has('class_php')) {
            echo "PHP checked";
        }
        if ($request->has('class_laravel')) {
            echo "Laravel checked";
        }
        print_r($attributes);die;
    }
}
