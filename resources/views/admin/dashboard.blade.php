@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-mcd-dark mb-6">Admin Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-mcd-dark mb-2">Total Products</h2>
                <p class="text-3xl font-bold text-mcd-red">{{ $productsCount }}</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-mcd-dark mb-2">Total Orders</h2>
                <p class="text-3xl font-bold text-mcd-red">{{ $ordersCount }}</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-mcd-dark mb-2">Pending Orders</h2>
                <p class="text-3xl font-bold text-mcd-red">{{ $pendingOrdersCount }}</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-mcd-dark mb-4">Recent Orders</h2>
                
                @if($recentOrders->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-mcd-gray">
                                <th class="text-left py-2 px-4">Order ID</th>
                                <th class="text-left py-2 px-4">Customer</th>
                                <th class="text-left py-2 px-4">Status</th>
                                <th class="text-left py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                            <tr class="border-b">
                                <td class="py-2 px-4">#{{ $order->id }}</td>
                                <td class="py-2 px-4">{{ $order->user->name }}</td>
                                <td class="py-2 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                        @if($order->status == 'completed') bg-green-100 text-green-800
                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('orders.show', $order) }}" class="text-mcd-red hover:text-mcd-dark">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-gray-600">No recent orders.</p>
                @endif
                
                <div class="mt-4">
                    <a href="{{ route('orders.index') }}" class="text-mcd-red hover:text-mcd-dark">View All Orders &rarr;</a>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-mcd-dark mb-4">Quick Actions</h2>
                
                <div class="space-y-4">
                    <a href="{{ route('products.create') }}" class="block btn-mcd btn-mcd-yellow text-center">Add New Product</a>
                    <a href="{{ route('products.index') }}" class="block btn-mcd btn-mcd-red text-center">Manage Products</a>
                    <a href="{{ route('orders.index') }}" class="block btn-mcd bg-mcd-dark hover:bg-gray-800 text-center">Manage Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection