<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VEXORA · Modern Marketplace</title>
    @vite('resources/css/app.css')
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        input[type="search"]::-webkit-search-decoration,
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-results-button,
        input[type="search"]::-webkit-search-results-decoration {
            display: none;
        }

        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Dropdown animation */
        .dropdown-enter {
            opacity: 0;
            transform: translateY(-10px);
        }

        .dropdown-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 200ms, transform 200ms;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">

    <div class="w-full min-h-screen">

        <!-- ========== 1. HEADER / NAVBAR ========== -->
        <header class="sticky top-0 z-30 bg-white/95 backdrop-blur-sm border-b border-gray-200 shadow-sm">
            <div class="w-full px-4 md:px-8 lg:px-12 py-3 md:py-4">
                <div class="flex items-center justify-between gap-4 flex-wrap md:flex-nowrap">
                    <!-- Logo -->
                    <div class="shrink-0">
                        <a href="/" class="flex items-center group">
                            <img src="{{ asset('assets/images/logo-copy.jpeg') }}" alt="Vexora Logo"
                                class="h-8 md:h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                        </a>
                    </div>

                    <!-- Search Bar -->
                    <div class="flex-1 min-w-[160px] max-w-2xl mx-2 md:mx-4">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <i class="fas fa-search text-gray-400 text-sm"></i>
                            </div>
                            <input type="search" placeholder="Cari produk, brand, atau toko..."
                                class="w-full bg-gray-100 border border-gray-200 rounded-full py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 shadow-inner">
                        </div>
                    </div>

                    <!-- Right Icons -->
                    <div class="flex items-center gap-3 sm:gap-5 shrink-0">
                        <button class="relative text-gray-600 hover:text-blue-600 transition-all duration-300">
                            <i class="fas fa-shopping-bag text-xl"></i>
                            <span
                                class="absolute -top-1.5 -right-2 bg-red-500 text-white text-[10px] font-bold rounded-full px-1.5 py-0.5">3</span>
                        </button>
                        <button class="text-gray-600 hover:text-blue-600 transition-all duration-300">
                            <i class="far fa-bell text-xl"></i>
                        </button>

                        <!-- ========== CONDITIONAL PROFILE SECTION ========== -->
                        @guest
                            <!-- Guest Mode: Login & Register Buttons -->
                            <div class="flex items-center gap-2 ml-2">
                                <a href="{{ route('login') }}"
                                    class="text-gray-700 hover:text-blue-600 transition-all duration-300 font-medium text-sm px-3 py-1.5 rounded-full">
                                    Login
                                </a>
                                <a href="{{ route('register') }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-full text-sm transition-all duration-300 shadow-sm hover:shadow-md">
                                    Register
                                </a>
                            </div>
                        @endguest

                        @auth
                            <!-- Auth Mode: Profile Dropdown -->
                            <div class="relative">
                                <button id="profileButton"
                                    class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition-all duration-300 focus:outline-none group">
                                    <!-- Avatar -->
                                    <div
                                        class="w-8 h-8 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">

                                        @php
                                            $avatar = Auth::user()->avatar;
                                        @endphp

                                        @if ($avatar)
                                            @if (\Illuminate\Support\Str::startsWith($avatar, ['http://', 'https://']))
                                                <img src="{{ $avatar }}" alt="{{ Auth::user()->name }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <img src="{{ asset('storage/' . $avatar) }}" alt="{{ Auth::user()->name }}"
                                                    class="w-full h-full object-cover">
                                            @endif
                                        @else
                                            <span class="text-white text-sm font-bold">
                                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                            </span>
                                        @endif

                                    </div>
                                    <span class="hidden md:inline text-sm font-medium text-gray-700">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-300"
                                        id="chevronIcon"></i>
                                </button>

                                <!-- Dropdown Menu -->
                                <div id="profileDropdown"
                                    class="absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible transition-all duration-300 transform -translate-y-2 z-50">
                                    <div class="p-4 border-b border-gray-100">
                                        <div class="flex items-center gap-3">
                                            <!-- Avatar besar di dropdown -->
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl overflow-hidden">

                                                @if (Auth::user()->avatar)

                                                    @if (Str::startsWith(Auth::user()->avatar, ['http://', 'https://']))
                                                        <img src="{{ Auth::user()->avatar }}"
                                                            alt="{{ Auth::user()->name }}"
                                                            class="w-full h-full object-cover">
                                                    @else
                                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                                            alt="{{ Auth::user()->name }}"
                                                            class="w-full h-full object-cover">
                                                    @endif
                                                @else
                                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                                @endif

                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-800">{{ Auth::user()->name }}</h4>
                                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                                <span
                                                    class="inline-block mt-1 text-[10px] bg-green-100 text-green-600 px-2 py-0.5 rounded-full">
                                                    Member {{ Auth::user()->role ?? 'Regular' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2">
                                        <a href=""
                                            class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-50 transition-all duration-300">
                                            <i class="fas fa-user-circle w-5 text-gray-400"></i>
                                            <span class="text-sm">Profile Saya</span>
                                        </a>
                                        <a href=""
                                            class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-50 transition-all duration-300">
                                            <i class="fas fa-tachometer-alt w-5 text-gray-400"></i>
                                            <span class="text-sm">Dashboard</span>
                                        </a>
                                        <a href=""
                                            class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-50 transition-all duration-300">
                                            <i class="fas fa-shopping-bag w-5 text-gray-400"></i>
                                            <span class="text-sm">Pesanan Saya</span>
                                            <span
                                                class="ml-auto text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">3</span>
                                        </a>
                                        <a href=""
                                            class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-gray-50 transition-all duration-300">
                                            <i class="fas fa-heart w-5 text-gray-400"></i>
                                            <span class="text-sm">Wishlist</span>
                                        </a>
                                        <div class="border-t border-gray-100 my-1"></div>

                                        <!-- Logout Form (Laravel Standard) -->
                                        <form method="POST" action="{{ route('logout') }}" id="logout-form-dropdown">
                                            @csrf
                                            <button type="submit"
                                                class="w-full flex items-center gap-3 px-4 py-2.5 text-red-600 hover:bg-red-50 transition-all duration-300">
                                                <i class="fas fa-sign-out-alt w-5"></i>
                                                <span class="text-sm font-medium">Logout</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth

                        <!-- Toggle Toko/User -->
                        <div class="hidden sm:flex items-center bg-gray-100 rounded-full p-1 ml-1">
                            <button
                                class="px-3 py-1.5 text-xs font-semibold rounded-full bg-white text-blue-600 shadow-sm transition-all duration-300">Toko</button>
                            <button
                                class="px-3 py-1.5 text-xs font-semibold rounded-full text-gray-600 hover:bg-gray-200 transition-all duration-300">User</button>
                        </div>
                        <div class="sm:hidden flex bg-gray-100 rounded-full p-1">
                            <button
                                class="px-2 py-1 text-xs font-medium rounded-full bg-white text-blue-600">Toko</button>
                            <button class="px-2 py-1 text-xs font-medium text-gray-600">User</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== 2. HERO BANNER ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-6">
            <div
                class="w-full h-48 md:h-56 lg:h-64 bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50 rounded-2xl shadow-sm flex items-center justify-center relative overflow-hidden border border-gray-200">
                <div class="text-center px-4">
                    <i class="fas fa-arrow-circle-right text-gray-400 text-3xl mb-2 block"></i>
                    <span class="text-gray-500 font-medium text-base md:text-lg">🎯 Gambar Iklan → Geser
                        kesamping</span>
                    <p class="text-xs text-gray-400 mt-1">Promo spesial menanti | Swipe untuk lihat lebih banyak</p>
                </div>
                <div class="absolute right-4 top-1/2 -translate-y-1/2 hidden md:block animate-pulse">
                    <i class="fas fa-chevron-circle-right text-gray-300 text-2xl"></i>
                </div>
            </div>
        </section>

        <!-- ========== 3. KATEGORI & TENTANG PRODUK ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-4">
                        <i class="fas fa-th-large text-blue-500 text-lg"></i> Kategori Produk
                    </h3>
                    <div class="flex flex-wrap gap-3">
                        <button
                            class="bg-gray-100 hover:bg-blue-500 hover:text-white transition-all duration-300 text-gray-700 font-medium px-5 py-2 rounded-full text-sm">IT
                            Services</button>
                        <button
                            class="bg-gray-100 hover:bg-blue-500 hover:text-white transition-all duration-300 text-gray-700 font-medium px-5 py-2 rounded-full text-sm">Digital
                            Products</button>
                        <button
                            class="bg-gray-100 hover:bg-blue-500 hover:text-white transition-all duration-300 text-gray-700 font-medium px-5 py-2 rounded-full text-sm">Software
                            License</button>
                        <button
                            class="bg-gray-100 hover:bg-blue-500 hover:text-white transition-all duration-300 text-gray-700 font-medium px-5 py-2 rounded-full text-sm">Cloud
                            Hosting</button>
                    </div>
                </div>
                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-4">
                        <i class="fas fa-info-circle text-blue-500"></i> Tentang Produk
                    </h3>
                    <div class="flex flex-wrap gap-4 items-center">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-xl shadow-md transition-all duration-300 text-sm">✨
                            Rekomendasi Produk</button>
                        <button
                            class="bg-gray-100 border border-gray-300 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-xl transition-all duration-300 text-sm">🔥
                            Produk Tren</button>
                    </div>
                    <p class="text-xs text-gray-400 mt-3">*Berdasarkan aktivitas belanja & preferensi kamu</p>
                </div>
            </div>
        </section>

        <!-- ========== 4. PROMO BANNER ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div
                    class="bg-gradient-to-br from-red-50 to-orange-50 rounded-xl p-5 shadow-sm border border-gray-200 text-center transition-all duration-300 hover:shadow-md hover:scale-[1.02]">
                    <div class="text-3xl mb-2">⚡</div>
                    <h4 class="font-bold text-gray-800 text-base">DISKON S.D. 90%</h4>
                    <p class="text-sm text-gray-500 mt-1">Khusus Pengguna VIP</p>
                    <span
                        class="inline-block mt-3 bg-white/80 rounded-full px-3 py-1 text-xs font-semibold text-red-600">Limited</span>
                </div>
                <div
                    class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 shadow-sm border border-gray-200 text-center transition-all duration-300 hover:shadow-md hover:scale-[1.02]">
                    <div class="text-3xl mb-2">🎟️</div>
                    <h4 class="font-bold text-gray-800 text-base">DAPATKAN VOUCHER 150 RIBU</h4>
                    <p class="text-sm text-gray-500 mt-1">TANPA MIN. BELANJA</p>
                    <span
                        class="inline-block mt-3 bg-white/80 rounded-full px-3 py-1 text-xs font-semibold text-blue-700">Ambil
                        sekarang</span>
                </div>
                <div
                    class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-xl p-5 shadow-sm border border-gray-200 text-center transition-all duration-300 hover:shadow-md hover:scale-[1.02]">
                    <div class="text-3xl mb-2">⏰</div>
                    <h4 class="font-bold text-gray-800 text-base">FLASH SALE SPESIAL HARI INI!!</h4>
                    <p class="text-sm text-gray-500 mt-1">Terbatas, buruan!</p>
                    <span
                        class="inline-block mt-3 bg-white/80 rounded-full px-3 py-1 text-xs font-semibold text-orange-600">00:12:45</span>
                </div>
            </div>
        </section>

        <!-- ========== 5. TABS ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-12">
            <div class="flex flex-wrap border-b border-gray-200 gap-2 md:gap-8">
                <button id="tabForUser"
                    class="tab-btn py-2.5 px-1 text-base font-semibold transition-all duration-300 border-b-2 border-blue-500 text-blue-600">
                    For User
                </button>
                <button id="tabTren"
                    class="tab-btn py-2.5 px-1 text-base font-semibold transition-all duration-300 border-b-2 border-transparent text-gray-500 hover:text-blue-500">
                    Produk Tren
                </button>
                <button id="tabPromo"
                    class="tab-btn py-2.5 px-1 text-base font-semibold transition-all duration-300 border-b-2 border-transparent text-gray-500 hover:text-blue-500">
                    Promo Hari Ini
                </button>
            </div>
        </section>

        <!-- ========== 6. PRODUCT GRID ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-8 pb-10">
            <div id="productGridContainer"
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5 gap-y-8"></div>
            <div class="text-center mt-10">
                <button
                    class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium py-2.5 px-8 rounded-full shadow-sm text-sm transition-all duration-300 hover:shadow-md">
                    Lihat Lainnya <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </section>

        <!-- ========== 7. KATEGORI PILIHAN ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Kategori Pilihan</h2>
                <a href="#"
                    class="text-blue-600 hover:text-blue-700 text-sm font-medium transition-all duration-300">Lihat
                    Semua <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
                <a href="#"
                    class="group bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-3 group-hover:bg-blue-100 transition-all duration-300">
                        <i class="fas fa-server text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Hosting</h3>
                    <p class="text-xs text-gray-400 mt-1">124 produk</p>
                </a>
                <a href="#"
                    class="group bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-3 group-hover:bg-blue-100 transition-all duration-300">
                        <i class="fas fa-paint-brush text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Web Design</h3>
                    <p class="text-xs text-gray-400 mt-1">89 produk</p>
                </a>
                <a href="#"
                    class="group bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-3 group-hover:bg-blue-100 transition-all duration-300">
                        <i class="fas fa-code text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Software</h3>
                    <p class="text-xs text-gray-400 mt-1">256 produk</p>
                </a>
                <a href="#"
                    class="group bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-3 group-hover:bg-blue-100 transition-all duration-300">
                        <i class="fas fa-chart-line text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Digital Marketing</h3>
                    <p class="text-xs text-gray-400 mt-1">67 produk</p>
                </a>
                <a href="#"
                    class="group bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-3 group-hover:bg-blue-100 transition-all duration-300">
                        <i class="fas fa-laptop-code text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">IT Services</h3>
                    <p class="text-xs text-gray-400 mt-1">145 produk</p>
                </a>
                <a href="#"
                    class="group bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-3 group-hover:bg-blue-100 transition-all duration-300">
                        <i class="fas fa-cloud text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Cloud Computing</h3>
                    <p class="text-xs text-gray-400 mt-1">98 produk</p>
                </a>
            </div>
        </section>

        <!-- ========== 8. TOKO TERPERCAYA (SCROLLABLE) ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Toko Terpercaya</h2>
                <a href="#"
                    class="text-blue-600 hover:text-blue-700 text-sm font-medium transition-all duration-300">Lihat
                    Semua <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            <div class="flex overflow-x-auto gap-5 pb-4 scrollbar-hide">
                <div
                    class="flex-shrink-0 w-40 bg-white rounded-2xl p-4 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-store text-3xl text-blue-500"></i>
                        </div>
                        <i class="fas fa-check-circle text-blue-500 absolute top-0 right-8 bg-white rounded-full"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">VEXORA Official</h3>
                    <div class="flex items-center justify-center gap-1 mt-1">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <span class="text-xs font-medium">4.9</span>
                        <span class="text-xs text-gray-400">• 1240 produk</span>
                    </div>
                    <span
                        class="inline-block mt-2 text-[10px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full">Verified</span>
                </div>
                <div
                    class="flex-shrink-0 w-40 bg-white rounded-2xl p-4 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-microchip text-3xl text-blue-500"></i>
                        </div>
                        <i class="fas fa-check-circle text-blue-500 absolute top-0 right-8 bg-white rounded-full"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Tech Galaxy</h3>
                    <div class="flex items-center justify-center gap-1 mt-1">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <span class="text-xs font-medium">4.8</span>
                        <span class="text-xs text-gray-400">• 890 produk</span>
                    </div>
                    <span
                        class="inline-block mt-2 text-[10px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full">Verified</span>
                </div>
                <div
                    class="flex-shrink-0 w-40 bg-white rounded-2xl p-4 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-globe text-3xl text-blue-500"></i>
                        </div>
                        <i class="fas fa-check-circle text-blue-500 absolute top-0 right-8 bg-white rounded-full"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Digital Haven</h3>
                    <div class="flex items-center justify-center gap-1 mt-1">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <span class="text-xs font-medium">4.7</span>
                        <span class="text-xs text-gray-400">• 567 produk</span>
                    </div>
                    <span
                        class="inline-block mt-2 text-[10px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full">Verified</span>
                </div>
                <div
                    class="flex-shrink-0 w-40 bg-white rounded-2xl p-4 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div
                        class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-headset text-3xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Gear Pro</h3>
                    <div class="flex items-center justify-center gap-1 mt-1">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <span class="text-xs font-medium">4.8</span>
                        <span class="text-xs text-gray-400">• 432 produk</span>
                    </div>
                </div>
                <div
                    class="flex-shrink-0 w-40 bg-white rounded-2xl p-4 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-terminal text-3xl text-blue-500"></i>
                        </div>
                        <i class="fas fa-check-circle text-blue-500 absolute top-0 right-8 bg-white rounded-full"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">CodeSpace</h3>
                    <div class="flex items-center justify-center gap-1 mt-1">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <span class="text-xs font-medium">4.9</span>
                        <span class="text-xs text-gray-400">• 321 produk</span>
                    </div>
                    <span
                        class="inline-block mt-2 text-[10px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full">Verified</span>
                </div>
                <div
                    class="flex-shrink-0 w-40 bg-white rounded-2xl p-4 text-center border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div
                        class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-rocket text-3xl text-blue-500"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">InnoTech</h3>
                    <div class="flex items-center justify-center gap-1 mt-1">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <span class="text-xs font-medium">4.6</span>
                        <span class="text-xs text-gray-400">• 278 produk</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== 9. REKOMENDASI UNTUK KAMU ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Rekomendasi Untuk Kamu</h2>
                <a href="#"
                    class="text-blue-600 hover:text-blue-700 text-sm font-medium transition-all duration-300">Lihat
                    Semua <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:scale-[1.02]">
                    <div
                        class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i
                            class="fas fa-headphones text-gray-400 text-3xl group-hover:scale-110 transition-all duration-300"></i>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 mb-1">VEXORA Premium TWS</h4>
                        <p class="text-xs text-gray-500 mb-2 line-clamp-1">VEXORA Official</p>
                        <div class="mb-2">
                            <span class="font-bold text-gray-800 text-base">Rp 459.000</span>
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <i class="fas fa-star text-yellow-400 text-[10px]"></i>
                            <span>4.8</span>
                            <span class="mx-1">•</span>
                            <span>3.420 terjual</span>
                        </div>
                    </div>
                </div>
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:scale-[1.02]">
                    <div
                        class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i
                            class="fas fa-mouse text-gray-400 text-3xl group-hover:scale-110 transition-all duration-300"></i>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 mb-1">Gaming Mouse Pro</h4>
                        <p class="text-xs text-gray-500 mb-2 line-clamp-1">Tech Galaxy</p>
                        <div class="mb-2">
                            <span class="font-bold text-gray-800 text-base">Rp 289.000</span>
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <i class="fas fa-star text-yellow-400 text-[10px]"></i>
                            <span>4.7</span>
                            <span class="mx-1">•</span>
                            <span>2.156 terjual</span>
                        </div>
                    </div>
                </div>
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:scale-[1.02]">
                    <div
                        class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i
                            class="fas fa-keyboard text-gray-400 text-3xl group-hover:scale-110 transition-all duration-300"></i>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 mb-1">Mechanical Keyboard</h4>
                        <p class="text-xs text-gray-500 mb-2 line-clamp-1">Gear Pro</p>
                        <div class="mb-2">
                            <span class="font-bold text-gray-800 text-base">Rp 599.000</span>
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <i class="fas fa-star text-yellow-400 text-[10px]"></i>
                            <span>4.9</span>
                            <span class="mx-1">•</span>
                            <span>1.876 terjual</span>
                        </div>
                    </div>
                </div>
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:scale-[1.02]">
                    <div
                        class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i
                            class="fas fa-hdd text-gray-400 text-3xl group-hover:scale-110 transition-all duration-300"></i>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 mb-1">External SSD 1TB</h4>
                        <p class="text-xs text-gray-500 mb-2 line-clamp-1">VEXORA Official</p>
                        <div class="mb-2">
                            <span class="font-bold text-gray-800 text-base">Rp 1.250.000</span>
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <i class="fas fa-star text-yellow-400 text-[10px]"></i>
                            <span>4.8</span>
                            <span class="mx-1">•</span>
                            <span>987 terjual</span>
                        </div>
                    </div>
                </div>
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:scale-[1.02]">
                    <div
                        class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i
                            class="fas fa-charging-station text-gray-400 text-3xl group-hover:scale-110 transition-all duration-300"></i>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 mb-1">Wireless Charger</h4>
                        <p class="text-xs text-gray-500 mb-2 line-clamp-1">CodeSpace</p>
                        <div class="mb-2">
                            <span class="font-bold text-gray-800 text-base">Rp 189.000</span>
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <i class="fas fa-star text-yellow-400 text-[10px]"></i>
                            <span>4.5</span>
                            <span class="mx-1">•</span>
                            <span>5.432 terjual</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== 10. KENAPA PILIH VEXORA ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-12">
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Kenapa Pilih Vexora?</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center group hover:scale-105 transition-all duration-300">
                        <div
                            class="w-16 h-16 mx-auto bg-blue-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-all duration-300">
                            <i class="fas fa-shield-alt text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Pembayaran Aman</h3>
                        <p class="text-sm text-gray-500">Sistem keamanan terenkripsi & perlindungan data</p>
                    </div>
                    <div class="text-center group hover:scale-105 transition-all duration-300">
                        <div
                            class="w-16 h-16 mx-auto bg-blue-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-all duration-300">
                            <i class="fas fa-box-check text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Produk Berkualitas</h3>
                        <p class="text-sm text-gray-500">100% original & garansi resmi</p>
                    </div>
                    <div class="text-center group hover:scale-105 transition-all duration-300">
                        <div
                            class="w-16 h-16 mx-auto bg-blue-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-all duration-300">
                            <i class="fas fa-headset text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Dukungan 24/7</h3>
                        <p class="text-sm text-gray-500">Layanan pelanggan siap membantu kapan saja</p>
                    </div>
                    <div class="text-center group hover:scale-105 transition-all duration-300">
                        <div
                            class="w-16 h-16 mx-auto bg-blue-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-all duration-300">
                            <i class="fas fa-truck-fast text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Pengiriman Cepat</h3>
                        <p class="text-sm text-gray-500">Gratis ongkir & tracking realtime</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== 11. NEWSLETTER CTA ========== -->
        <section class="w-full px-4 md:px-8 lg:px-12 mt-12">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 md:p-12 text-center shadow-lg">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">Dapatkan promo terbaru dari Vexora</h2>
                <p class="text-blue-100 mb-6">Berlangganan newsletter dan dapatkan voucher diskon eksklusif!</p>
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto"
                    onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan!');">
                    <input type="email" placeholder="Masukkan email Anda"
                        class="flex-1 px-4 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-300">
                    <button type="submit"
                        class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-blue-50 transition-all duration-300 shadow-md hover:shadow-lg">
                        Subscribe <i class="fas fa-paper-plane ml-2"></i>
                    </button>
                </form>
                <p class="text-blue-100 text-xs mt-4">*Dapatkan diskon 10% untuk pembelian pertama</p>
            </div>
        </section>

        <!-- ========== 12. FOOTER ========== -->
        <footer class="w-full bg-white border-t border-gray-200 mt-12">
            <div class="px-4 md:px-8 lg:px-12 py-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold text-blue-600 mb-4">VEXORA</h3>
                        <p class="text-sm text-gray-500 mb-4 leading-relaxed">Marketplace digital terpercaya untuk
                            kebutuhan IT dan produk digital Anda.</p>
                        <div class="flex gap-3">
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-blue-500 transition-all duration-300 group">
                                <i class="fab fa-facebook-f text-sm text-gray-500 group-hover:text-white"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-blue-500 transition-all duration-300 group">
                                <i class="fab fa-twitter text-sm text-gray-500 group-hover:text-white"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-blue-500 transition-all duration-300 group">
                                <i class="fab fa-instagram text-sm text-gray-500 group-hover:text-white"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-blue-500 transition-all duration-300 group">
                                <i class="fab fa-youtube text-sm text-gray-500 group-hover:text-white"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-4">Beli</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Rekomendasi
                                    Untukmu</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Promo Hari
                                    Ini</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Produk
                                    Tren</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Voucher &
                                    Diskon</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-4">Bantuan</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Bantuan dan
                                    Panduan</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Ruang Edukasi
                                    Vexora</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Hak Kekayaan
                                    Intelektual</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Kebijakan
                                    Privasi</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-4">Layanan</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Vexora
                                    Profile</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Digital
                                    Products</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">IT
                                    Services</a></li>
                            <li><a href="#"
                                    class="text-gray-500 hover:text-blue-600 transition-all duration-300">Forum
                                    Komunitas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-200 mt-8 pt-6 text-center text-sm text-gray-400">
                    <p>&copy; {{ date('Y') }} VEXORA. All rights reserved. Marketplace digital terpercaya di
                        Indonesia.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Dropdown functionality for Auth Mode Only
        @auth
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');
        const chevronIcon = document.getElementById('chevronIcon');
        let isDropdownOpen = false;

        if (profileButton) {
            function toggleDropdown() {
                isDropdownOpen = !isDropdownOpen;
                if (isDropdownOpen) {
                    profileDropdown.classList.remove('opacity-0', 'invisible', '-translate-y-2');
                    profileDropdown.classList.add('opacity-100', 'visible', 'translate-y-0');
                    if (chevronIcon) chevronIcon.style.transform = 'rotate(180deg)';
                } else {
                    profileDropdown.classList.add('opacity-0', 'invisible', '-translate-y-2');
                    profileDropdown.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    if (chevronIcon) chevronIcon.style.transform = 'rotate(0deg)';
                }
            }

            profileButton.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleDropdown();
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!profileButton?.contains(e.target) && !profileDropdown?.contains(e.target)) {
                    if (isDropdownOpen) {
                        toggleDropdown();
                    }
                }
            });
        }
        @endauth

        // Data produk
        const forUserProducts = [{
                name: "MacBook Pro 14\" M3",
                price: 22999000,
                rating: 4.8,
                sold: 1243,
                badge: null
            },
            {
                name: "VEXORA Wireless Mouse",
                price: 125000,
                rating: 4.5,
                sold: 892,
                badge: null
            },
            {
                name: "Mechanical Keyboard RGB",
                price: 589000,
                rating: 4.7,
                sold: 543,
                badge: null
            },
            {
                name: "USB-C Hub 8-in-1",
                price: 299000,
                rating: 4.6,
                sold: 2100,
                badge: null
            },
            {
                name: "Monitor 27\" 4K",
                price: 3899000,
                rating: 4.9,
                sold: 421,
                badge: null
            },
            {
                name: "SSD External 1TB",
                price: 1250000,
                rating: 4.7,
                sold: 675,
                badge: null
            },
            {
                name: "Webcam Full HD",
                price: 450000,
                rating: 4.3,
                sold: 352,
                badge: null
            },
            {
                name: "VEXORA Smartwatch",
                price: 789000,
                rating: 4.4,
                sold: 1520,
                badge: null
            },
            {
                name: "Laptop Stand Aluminium",
                price: 199000,
                rating: 4.8,
                sold: 3400,
                badge: null
            },
            {
                name: "Power Bank 20000mAh",
                price: 325000,
                rating: 4.6,
                sold: 2780,
                badge: null
            }
        ];

        const trenProducts = [{
                name: "iPhone 15 Pro Max",
                price: 18999000,
                rating: 4.9,
                sold: 3421,
                badge: "🔥 Hot"
            },
            {
                name: "VEXORA TWS Earbuds",
                price: 459000,
                rating: 4.8,
                sold: 5680,
                badge: "🎧 Trending"
            },
            {
                name: "Smart Home Camera",
                price: 599000,
                rating: 4.5,
                sold: 1734,
                badge: null
            },
            {
                name: "Drone Mini 4K",
                price: 2450000,
                rating: 4.7,
                sold: 890,
                badge: "✨ New"
            },
            {
                name: "VEXORA Backpack",
                price: 379000,
                rating: 4.8,
                sold: 2230,
                badge: null
            },
            {
                name: "GPU RTX 4060",
                price: 4999000,
                rating: 4.9,
                sold: 450,
                badge: "Gaming"
            }
        ];

        const promoProducts = [{
                name: "VEXORA Hoodie Exclusive",
                price: 99000,
                originalPrice: 299000,
                rating: 4.6,
                sold: 1245,
                badge: "Diskon 67%"
            },
            {
                name: "Smart Band 7",
                price: 199000,
                originalPrice: 499000,
                rating: 4.5,
                sold: 2780,
                badge: "60% OFF"
            },
            {
                name: "Wireless Charger Pad",
                price: 89000,
                originalPrice: 199000,
                rating: 4.4,
                sold: 3450,
                badge: "Flash Sale"
            },
            {
                name: "VEXORA Mousepad XL",
                price: 45000,
                originalPrice: 99000,
                rating: 4.7,
                sold: 5412,
                badge: "Hari Ini"
            }
        ];

        function renderProducts(products, isPromo = false) {
            const container = document.getElementById('productGridContainer');
            if (!container) return;
            container.innerHTML = '';
            products.forEach(prod => {
                const formattedPrice = new Intl.NumberFormat('id-ID').format(prod.price);
                const ratingStar = prod.rating || 4.5;
                const soldCount = prod.sold || 0;
                const badgeHtml = prod.badge ?
                    `<span class="absolute top-2 left-2 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full z-10 shadow">${prod.badge}</span>` :
                    '';

                let priceExtraHtml = '';
                if (isPromo && prod.originalPrice) {
                    const formattedOriginal = new Intl.NumberFormat('id-ID').format(prod.originalPrice);
                    priceExtraHtml =
                        `<span class="text-xs text-gray-400 line-through ml-2">Rp ${formattedOriginal}</span>`;
                }

                const card = document.createElement('div');
                card.className =
                    'group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:scale-[1.02]';
                card.innerHTML = `
                    <div class="relative">
                        ${badgeHtml}
                        <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <i class="fas fa-box-open text-gray-400 text-3xl group-hover:scale-110 transition-all duration-300"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 mb-1">${prod.name}</h4>
                        <div class="flex items-baseline flex-wrap gap-1 mb-2">
                            <span class="font-bold text-gray-800 text-base">Rp ${formattedPrice}</span>
                            ${priceExtraHtml}
                        </div>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star text-[10px]"></i>
                                <span class="ml-1 text-gray-600">${ratingStar}</span>
                            </div>
                            <span class="mx-1">•</span>
                            <span><i class="fas fa-shopping-bag mr-1 text-gray-400"></i>${soldCount} terjual</span>
                        </div>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        function updateTab(activeTabId) {
            const tabBtns = document.querySelectorAll('.tab-btn');
            tabBtns.forEach(btn => {
                btn.classList.remove('border-blue-500', 'text-blue-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            const activeBtn = document.getElementById(activeTabId);
            if (activeBtn) {
                activeBtn.classList.remove('border-transparent', 'text-gray-500');
                activeBtn.classList.add('border-blue-500', 'text-blue-600');
            }

            if (activeTabId === 'tabForUser') {
                renderProducts(forUserProducts, false);
            } else if (activeTabId === 'tabTren') {
                renderProducts(trenProducts, false);
            } else if (activeTabId === 'tabPromo') {
                renderProducts(promoProducts, true);
            }
        }

        document.getElementById('tabForUser')?.addEventListener('click', () => updateTab('tabForUser'));
        document.getElementById('tabTren')?.addEventListener('click', () => updateTab('tabTren'));
        document.getElementById('tabPromo')?.addEventListener('click', () => updateTab('tabPromo'));
        updateTab('tabForUser');
    </script>
</body>

</html>
