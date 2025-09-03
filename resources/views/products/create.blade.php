@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-mcd-dark mb-6">{{ isset($product) ? 'Edit' : 'Create' }} Product</h1>
        
        <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mcd-red focus:ring focus:ring-mcd-red focus:ring-opacity-50" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mcd-red focus:ring focus:ring-mcd-red focus:ring-opacity-50" required>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mcd-red focus:ring focus:ring-mcd-red focus:ring-opacity-50" required>
                        <option value="">Select Category</option>
                        <option value="food" {{ old('category', $product->category ?? '') == 'food' ? 'selected' : '' }}>Food</option>
                        <option value="drink" {{ old('category', $product->category ?? '') == 'drink' ? 'selected' : '' }}>Drink</option>
                        <option value="dessert" {{ old('category', $product->category ?? '') == 'dessert' ? 'selected' : '' }}>Dessert</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mcd-red focus:ring focus:ring-mcd-red focus:ring-opacity-50">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    @if(isset($product) && $product->image)
                        <div class="mt-2">
                            <img src="{{ $product->image_url }}" alt="Current image" class="h-20 object-cover rounded">
                        </div>
                    @endif
                </div>
                
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-mcd-red focus:ring focus:ring-mcd-red focus:ring-opacity-50" required>{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', isset($product) ? $product->is_active : true) ? 'checked' : '' }} class="rounded border-gray-300 text-mcd-red focus:ring-mcd-red">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">Active Product</label>
                    </div>
                    @error('is_active')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="btn-mcd btn-mcd-red">Save Product</button>
                <a href="{{ route('products.index') }}" class="ml-4 btn-mcd btn-mcd-yellow">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection