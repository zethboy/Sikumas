<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>@yield('title', 'SIKUMAS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-green-50 text-gray-800 font-sans min-h-screen flex flex-col">

    {{-- Navbar --}}
    <nav class="fixed top-0 left-0 right-0 z-[999] bg-green-500 text-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl">
                    <img src="{{ asset('images/sikumas-logo.png') }}" alt="SIKUMAS" class="h-8 w-auto">
                    <span>SIKUMAS</span>
                </a>

                <!-- Hamburger Button (Mobile only) -->
                <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none p-1" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        id="icon-hamburger">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" id="icon-close">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-6 text-sm md:text-base">
                    <a href="{{ route('products.index') }}" class="hover:text-green-100 transition">Products</a>
                    <a href="{{ route('education') }}" class="hover:text-green-100 transition flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        Edukasi
                    </a>

                    @auth
                        <a href="{{ route('orders.my') }}" class="hover:text-green-100 transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Pesanan
                        </a>

                        <!-- Seller Monitoring (baru, kalau type penjual/dual) -->
                        @if (in_array(Auth::user()->type, ['penjual', 'dual']))
                            <a href="{{ route('seller.orders') }}" class="hover:text-green-100 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Penjualan
                            </a>
                        @endif
                    @endauth

                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" class="hover:text-green-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>

                    @auth
                        <a href="{{ route('profile') }}" class="hover:text-green-100 transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="truncate max-w-[100px]">{{ Auth::user()->first_name }}</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="m-0 p-0 inline-flex">
                            @csrf
                            <button type="submit"
                                class="hover:text-green-100 flex items-center gap-1 bg-transparent border-none cursor-pointer text-white font-normal p-0 m-0 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="hover:text-green-700 transition flex items-center gap-1 bg-white text-green-700 px-3 py-1.5 rounded-lg font-semibold text-sm hover:bg-green-50">
                            Login
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile Menu (Hidden by default) -->
            <div id="mobile-menu" class="hidden md:hidden mt-3 pb-3 space-y-1 border-t border-green-400/50 pt-3">
                <a href="{{ route('products.index') }}"
                    class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Products</a>
                <a href="{{ route('education') }}"
                    class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Edukasi</a>

                @auth
                    <a href="{{ route('orders.my') }}"
                        class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Pesanan Saya</a>

                    @if (in_array(Auth::user()->type, ['penjual', 'dual']))
                        <a href="{{ route('seller.dashboard') }}"
                            class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Seller Dashboard</a>
                        <a href="{{ route('seller.orders') }}"
                            class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Monitoring Penjualan</a>
                    @endif

                    <a href="{{ route('profile') }}"
                        class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Profil</a>

                    <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left hover:bg-green-600 transition rounded-lg px-3 py-2.5 bg-transparent border-none text-white cursor-pointer">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Login</a>
                    <a href="{{ route('register') }}"
                        class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Daftar</a>
                @endauth

                <a href="{{ route('cart.index') }}"
                    class="block hover:bg-green-600 transition rounded-lg px-3 py-2.5">Keranjang</a>
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
            <img src="{{ asset('images/sikumas-logo.png') }}" alt="SIKUMAS" class="h-8 w-auto">
            <span class="font-bold">SIKUMAS</span>
        </div>
        <p class="text-gray-400">Transformasi limbah kelapa menjadi nilai ekonomi berkelanjutan</p>
        <p class="text-gray-500 mt-1 text-xs">&copy; 2026 SIKUMAS. All rights reserved.</p>
    </footer>
    <script>
        // Init dark mode icons
        if (document.documentElement.classList.contains('dark')) {
            document.getElementById('icon-sun')?.classList.remove('hidden');
            document.getElementById('icon-moon')?.classList.add('hidden');
            document.getElementById('icon-sun-nav')?.classList.remove('hidden');
            document.getElementById('icon-moon-nav')?.classList.add('hidden');
        }

        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconHamburger = document.getElementById('icon-hamburger');
        const iconClose = document.getElementById('icon-close');

        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                iconHamburger.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            });
        }
    </script>
</body>

</html>
