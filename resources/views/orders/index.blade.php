@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-mcd-dark mb-6">{{ Auth::user()->isAdmin() ? 'All Orders' : 'My Orders' }}</h1>
        
        @if($orders->count() > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-mcd-gray">
                            <th class="text-left py-3 px-4">Order ID</th>
                            @if(Auth::user()->isAdmin())
                            <th class="text-left py-3 px-4">Customer</th>
                            @endif
                            <th class="text-left py-3 px-4">Date</th>
                            <th class="text-left py-3 px-4">Total</th>
                            <th class="text-left py-3 px-4">Status</th>
                            <th class="text-left py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="border-b">
                            <td class="py-3 px-4">#{{ $order->id }}</td>
                            @if(Auth::user()->isAdmin())
                            <td class="py-3 px-4">{{ $order->user->name }}</td>
                            @endif
                            <td class="py-3 px-4">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="py-3 px-4">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    @if($order->status == 'completed') bg-green-100 text-green-800
                                    @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('orders.show', $order) }}" class="text-mcd-red hover:text-mcd-dark">View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-600 mb-4">No orders found</h2>
            <a href="{{ route('products.index') }}" class="btn-mcd btn-mcd-yellow">Start Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection