<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McDonald's App</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'mcd-red': '#DA291C',
                        'mcd-yellow': '#FFCC00',
                        'mcd-dark': '#27251F',
                        'mcd-gray': '#D9D9D9',
                        'mcd-light-gray': '#F5F5F5',
                    }
                }
            }
        }
    </script>
    
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        
        .btn-mcd {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: bold;
            text-align: center;
            transition: all 0.2s;
            text-decoration: none;
        }
        
        .btn-mcd-red {
            background-color: #DA291C;
            color: white;
        }
        
        .btn-mcd-red:hover {
            background-color: #c42115;
            transform: translateY(-2px);
        }
        
        .btn-mcd-yellow {
            background-color: #FFCC00;
            color: #27251F;
        }
        
        .btn-mcd-yellow:hover {
            background-color: #e6b800;
            transform: translateY(-2px);
        }
        
        .bg-mcd-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23FFCC00' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .header-gradient {
            background: linear-gradient(135deg, #DA291C 0%, #c42115 100%);
        }
        
        .footer-gradient {
            background: linear-gradient(135deg, #27251F 0%, #1a1914 100%);
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="header-gradient text-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-2xl font-bold flex items-center">
                        <span class="text-3xl mr-2">🍔</span>
                        <span class="text-white">McDonald's</span>
                    </a>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <!-- <a href="{{ url('/') }}" class="hover:text-mcd-yellow transition font-medium">Home</a> -->
                    <!-- <a href="{{ route('products.index') }}" class="hover:text-mcd-yellow transition font-medium">Menu</a> -->
                    
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-mcd-yellow transition font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('cart.index') }}" class="hover:text-mcd-yellow transition font-medium">Cart</a>
                            <a href="{{ route('orders.index') }}" class="hover:text-mcd-yellow transition font-medium">My Orders</a>
                        @endif
                    @endauth
                </nav>
                
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="hover:text-mcd-yellow transition font-medium">Login</a>
                        <a href="{{ route('register') }}" class="btn-mcd btn-mcd-yellow">Register</a>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:text-mcd-yellow transition font-medium">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-gradient text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4 flex items-center">
                        <span class="text-2xl mr-2">🍔</span>
                        McDonald's
                    </h3>
                    <p class="text-gray-400">The best fast food experience since 1955.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-mcd-yellow transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-mcd-yellow transition">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-mcd-yellow transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <p class="text-gray-400 mb-2">Email: info@mcdonalds.com</p>
                    <p class="text-gray-400">Phone: +1 234 567 890</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 McDonald's. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>