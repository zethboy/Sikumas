<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIKUMAS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-green-50 text-gray-800 font-sans min-h-screen flex flex-col">

    {{-- Navbar --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-green-500 text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 font-bold text-xl">
                <img src="{{ asset('images/sikumas-logo.png') }}" alt="SIKUMAS" class="h-8 w-auto">
                <span>SIKUMAS</span>
            </a>
            <div class="flex items-center gap-6 text-sm md:text-base">
                <a href="{{ route('products.index') }}" class="hover:text-green-100">Products</a>
                <a href="{{ route('education') }}" class="hover:text-green-100 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    Edukasi
                </a>
                @auth
                    <div class="flex items-center gap-4">
                        <!-- Pesanan Saya (baru) -->
                        <a href="{{ route('orders.my') }}" class="hover:text-green-100 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            Pesanan
                        </a>

                        <!-- Seller Monitoring (baru, kalau type penjual/dual) -->
                        @if(in_array(Auth::user()->type, ['penjual', 'dual']))
                        <a href="{{ route('seller.orders') }}" class="hover:text-green-100 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            Penjualan
                        </a>
                        @endif

                        <!-- Profile -->
                        <a href="{{ route('profile') }}" class="hover:text-green-100 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span class="truncate max-w-[100px] inline-block">{{ Auth::user()->first_name }}</span>
                        </a>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="m-0 p-0 inline-flex">
                            @csrf
                            <button type="submit" class="hover:text-green-100 flex items-center gap-1 bg-transparent border-none cursor-pointer text-white font-normal p-0 m-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hover:text-green-100 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Login
                    </a>
                @endauth
                <a href="{{ route('cart.index') }}" class="hover:text-green-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="pt-20 flex-grow container mx-auto p-4">
      @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-green-100 py-6 text-center text-sm">
        <div class="flex justify-center items-center gap-2 mb-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="font-bold">SIKUMAS</span>
        </div>
        <p class="text-gray-400">Transformasi limbah kelapa menjadi nilai ekonomi berkelanjutan</p>
        <p class="text-gray-500 mt-1 text-xs">&copy; 2026 SIKUMAS. All rights reserved.</p>
    </footer>

</body>

</html>
