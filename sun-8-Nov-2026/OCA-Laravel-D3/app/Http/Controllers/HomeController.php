<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome(){
        $name='Omar';
        $city='Russeifeh';
        $cart=['zaatar','olive oil'];
        return view('home',compact('name','city','cart'));
    }
}
