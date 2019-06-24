<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // echo "2";
        $a = 3;
        $b = 9;
        echo '<a href="/user/13">Profile user 13</a>';
    }

    public function params($user_id)
    {
        echo "Đây là thông tin của user mang id: ". $user_id;
        echo "<br>";
        echo '<a href=" '. route('user.edit') .' ">Back</a>';
        echo route('user.edit');
    }

    public function user()
    {
        echo '<a href=" '. route('user.edit') .' ">Back</a>';
    }
}
