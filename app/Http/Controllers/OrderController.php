<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $orders = Order::with('user')->latest()->get();
        } else {
            $orders = Order::where('user_id', Auth::id())->latest()->get();
        }
        
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Check if user is authorized to view this order
        if (Auth::user()->isCustomer() && $order->user_id !== Auth::id()) {
            abort(403);
        }
        
        $order->load('items.product');
        
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $this->middleware('admin');
        
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);
        
        $order->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}