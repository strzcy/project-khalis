<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $pendingOrdersCount = Order::where('status', 'pending')->count();
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'productsCount', 
            'ordersCount', 
            'pendingOrdersCount',
            'recentOrders'
        ));
    }
}