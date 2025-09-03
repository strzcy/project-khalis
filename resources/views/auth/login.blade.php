@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-mcd-pattern py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-lg shadow-lg">
        <div>
            <img class="mx-auto h-16 w-auto" src="https://www.mcdonalds.com/content/dam/sites/usa/nfl/icons/arches-logo_108x108.jpg" alt="McDonald's">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-[#27251F]">
                Sign in to your account
            </h2>
        </div>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-[#DA291C] focus:border-[#DA291C] focus:z-10 sm:text-sm" placeholder="Email address" value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-[#DA291C] focus:border-[#DA291C] focus:z-10 sm:text-sm" placeholder="Password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-[#DA291C] focus:ring-[#DA291C] border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-[#DA291C] hover:text-[#c42115]" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#DA291C] hover:bg-[#c42115] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#DA291C]">
                    Sign in
                </button>
            </div>
            
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-[#DA291C] hover:text-[#c42115]">
                        Register now
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection