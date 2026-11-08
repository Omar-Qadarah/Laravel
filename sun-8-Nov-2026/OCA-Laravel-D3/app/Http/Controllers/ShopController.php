<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products=[
            ['name'=>'Green Zaatar','price'=>'5.00','in_stock'=>true],
            ['name'=>'Black Olives','price'=>'3.50','in_stock'=>false],
            ['name'=>'Nablusi Knafeh','price'=>'8.00','in_stock'=>true],
        ];
        return view('shop',compact('products'));
    }
}
