@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-mcd-dark mb-6">Order #{{ $order->id }}</h1>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-mcd-dark mb-2">Order Details</h2>
                        <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y, h:i A') }}</p>
                        <p><strong>Status:</strong> 
                            <span class="px-2 py-1 rounded-full text-xs 
                                @if($order->status == 'completed') bg-green-100 text-green-800
                                @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </p>
                        <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                    
                    @if(Auth::user()->isAdmin())
                    <div>
                        <h2 class="text-lg font-semibold text-mcd-dark mb-2">Customer Information</h2>
                        <p><strong>Name:</strong> {{ $order->user->name }}</p>
                        <p><strong>Email:</strong> {{ $order->user->email }}</p>
                    </div>
                    @endif
                </div>
                
                @if(Auth::user()->isAdmin())
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-mcd-dark mb-2">Update Order Status</h2>
                    <form action="{{ route('orders.update', $order) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="rounded border-gray-300 mr-2">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn-mcd btn-mcd-yellow">Update Status</button>
                    </form>
                </div>
                @endif
                
                <h2 class="text-lg font-semibold text-mcd-dark mb-4">Order Items</h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-mcd-gray">
                                <th class="text-left py-2 px-4">Product</th>
                                <th class="text-left py-2 px-4">Price</th>
                                <th class="text-left py-2 px-4">Quantity</th>
                                <th class="text-left py-2 px-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr class="border-b">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="h-12 w-12 object-cover rounded">
                                        <div class="ml-3">
                                            <h3 class="font-semibold">{{ $item->product->name }}</h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4">${{ number_format($item->price, 2) }}</td>
                                <td class="py-3 px-4">{{ $item->quantity }}</td>
                                <td class="py-3 px-4">${{ number_format($item->total, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right py-3 px-4 font-semibold">Total:</td>
                                <td class="py-3 px-4 font-semibold">${{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="flex justify-between">
            <a href="{{ route('orders.index') }}" class="btn-mcd btn-mcd-yellow">&larr; Back to Orders</a>
            
            @if(Auth::user()->isCustomer() && $order->status == 'pending')
            <form action="{{ route('orders.cancel', $order) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-mcd bg-red-600 hover:bg-red-700">Cancel Order</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection