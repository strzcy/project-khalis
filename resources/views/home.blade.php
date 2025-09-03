@extends('layouts.app')

@section('content')
<div class="bg-mcd-pattern py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-mcd-dark mb-4">Welcome to McDonald's</h1>
            <p class="text-xl text-gray-600 mb-8">I'm lovin' it</p>
            <a href="{{ route('products.index') }}" class="btn-mcd btn-mcd-red text-lg px-6 py-3">View Our Menu</a>
        </div>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-mcd-dark mb-8">Featured Products</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($products->take(3) as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-mcd-dark mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-mcd-red">${{ number_format($product->price, 2) }}</span>
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
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('products.index') }}" class="btn-mcd btn-mcd-red">View All Products</a>
        </div>
    </div>
</div>
@endsection