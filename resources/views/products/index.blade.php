@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-mcd-dark mb-6">Our Menu</h1>
        
        @if(Auth::check() && Auth::user()->isAdmin())
        <div class="mb-6">
            <a href="{{ route('products.create') }}" class="btn-mcd btn-mcd-yellow">Add New Product</a>
        </div>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-mcd-dark mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-2xl font-bold text-mcd-red">${{ number_format($product->price, 2) }}</span>
                        <span class="px-3 py-1 bg-mcd-gray rounded-full text-sm">{{ ucfirst($product->category) }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <a href="{{ route('products.show', $product) }}" class="btn-mcd btn-mcd-red">View Details</a>
                        
                        @auth
                            @if(Auth::user()->isCustomer())
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-mcd btn-mcd-yellow">Add to Cart</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn-mcd btn-mcd-yellow">Login to Order</a>
                        @endauth
                    </div>
                    
                    @if(Auth::check() && Auth::user()->isAdmin())
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection