@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-mcd-dark mb-6">Shopping Cart</h1>
        
        @if(count($cart) > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Product</th>
                                <th class="text-left py-2">Price</th>
                                <th class="text-left py-2">Quantity</th>
                                <th class="text-left py-2">Total</th>
                                <th class="text-left py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr class="border-b">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="h-16 w-16 object-cover rounded">
                                        <div class="ml-4">
                                            <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">${{ number_format($item['price'], 2) }}</td>
                                <td class="py-4">
                                    <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 rounded border-gray-300">
                                        <button type="submit" class="ml-2 text-sm text-blue-600">Update</button>
                                    </form>
                                </td>
                                <td class="py-4">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td class="py-4">
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-6 border-t pt-6">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Total: ${{ number_format($total, 2) }}</h3>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-mcd btn-mcd-red text-lg px-6 py-3">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-600 mb-4">Your cart is empty</h2>
            <a href="{{ route('products.index') }}" class="btn-mcd btn-mcd-yellow">Continue Shopping</a>
        </div>
        @endif
        
        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="text-mcd-red hover:text-mcd-dark">&larr; Continue Shopping</a>
        </div>
    </div>
</div>
@endsection