<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seller;
use App\Models\Catigore;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderitem;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $sellersCount = Seller::count();
        $categoriesCount = Catigore::count();
        $productsCount = Product::count();
        $ordersCount = Order::count();

        $totalRevenue = Orderitem::with('product')->get()->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        $recentOrders = Order::with(['user', 'orderitems.product'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'usersCount',
            'sellersCount',
            'categoriesCount',
            'productsCount',
            'ordersCount',
            'totalRevenue',
            'recentOrders'
        ));
    }
}