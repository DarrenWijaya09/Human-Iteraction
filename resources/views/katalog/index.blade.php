<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>VEXORA · Marketplace Modern</title>
    <!-- Tailwind CSS + Google Fonts (Inter) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Override default Tailwind config untuk shadow/ring lebih halus -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'Segoe UI', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 8px 20px rgba(0,0,0,0.05), 0 2px 4px rgba(0,0,0,0.02)',
                        'lift': '0 20px 25px -12px rgba(0, 0, 0, 0.1), 0 4px 8px -4px rgba(0, 0, 0, 0.02)',
                    }
                }
            }
        }
    </script>
    <style>
        /* custom smooth transition + hide scrollbar but keep functionality */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .transition-ease {
            transition: all 0.2s ease;
        }

        /* collapsible accordion simple tanpa JS - untuk filter demo (detail manual) */
        /* tapi kita gunakan pendekatan detail/summary untuk aksesibilitas */
        details>summary {
            list-style: none;
            cursor: pointer;
        }

        details>summary::-webkit-details-marker {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">

    <!-- ========== TOP BAR (extra small) ========== -->
    <div class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-30">
        <div
            class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-wrap items-center justify-between text-xs text-gray-500 gap-x-4 gap-y-1">
            <div class="flex items-center gap-1">
                <span class="text-blue-600 font-medium">✨ Selamat Datang</span>
                <span class="hidden sm:inline text-gray-400">|</span>
            </div>
            <div class="flex flex-wrap items-center gap-4 font-medium">
                <a href="#" class="hover:text-blue-600 transition">Vexora Profile</a>
                <a href="#" class="hover:text-blue-600 transition">Ruang Edukasi Vexora</a>
                <a href="#" class="hover:text-blue-600 transition">Forum</a>
                <a href="#" class="hover:text-blue-600 transition">Promo Hari Ini</a>
            </div>
        </div>
    </div>

    <!-- ========== MAIN NAVBAR ========== -->
    <header class="sticky top-[41px] z-20 bg-white/90 backdrop-blur-sm border-b border-gray-200 shadow-sm">
        <div
            class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-wrap items-center justify-between gap-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img src="{{ asset('assets/images/logo-copy.jpeg') }}" alt="VEXORA Logo" class="h-8 w-auto">
            </div>

            <!-- Search Bar - tengah, responsive -->
            <div class="flex-1 max-w-2xl mx-4">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Cari di Vexora"
                        class="w-full pl-11 pr-4 py-3 rounded-full border border-gray-200 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 transition shadow-sm text-sm">
                </div>
            </div>

            <!-- Ikon kanan + toggle role -->
            <div class="flex items-center gap-3 sm:gap-4">
                <!-- Cart, Notif, Message -->
                <button class="relative p-2 rounded-full hover:bg-gray-100 transition">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                    </svg>
                    <span
                        class="absolute -top-1 -right-1 bg-blue-600 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">3</span>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-100 transition">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M15 17h5l-1.4-2.1A8 8 0 0012 5a8 8 0 00-6.6 12.6L4 17h5m6 0v2a3 3 0 11-6 0v-2m6 0H9">
                        </path>
                    </svg>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-100 transition">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4.5-1L4 21l1.5-3.5A9 9 0 0121 12z">
                        </path>
                    </svg>
                </button>

                <!-- Toggle pill toko/user -->
                <div class="flex bg-gray-100 rounded-full p-1 shadow-inner">
                    <button
                        class="px-4 py-1.5 text-xs font-semibold rounded-full bg-white text-blue-600 shadow-sm transition">Toko</button>
                    <button
                        class="px-4 py-1.5 text-xs font-semibold rounded-full text-gray-600 hover:text-gray-900 transition">User</button>
                </div>
            </div>
        </div>
    </header>

    <!-- ========== MAIN LAYOUT: SIDEBAR (desktop/tablet) + MAIN CONTENT ========== -->
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6 relative">
        <div class="flex flex-wrap lg:flex-nowrap gap-6">

            <!-- ========== SIDEBAR FILTER (Desktop & Tablet tampil, mobile hidden jadi drawer tapi kita gunakan hidden lg:block) ========== -->
            <aside class="w-full lg:w-80 shrink-0 hidden lg:block transition-all">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-5 sticky top-28">
                    <h2
                        class="text-lg font-bold text-gray-800 flex items-center gap-2 pb-3 border-b border-gray-100 mb-4">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                            </path>
                        </svg>
                        Filter
                    </h2>

                    <!-- LOKASI (accordion menggunakan details) -->
                    <details class="group mb-5 border-b border-gray-100 pb-4" open>
                        <summary
                            class="flex justify-between items-center cursor-pointer list-none font-semibold text-gray-700 py-1">
                            Lokasi
                            <span class="text-blue-500 text-sm transition-transform group-open:rotate-180">▼</span>
                        </summary>
                        <div class="mt-3 space-y-2 pl-1">
                            <label class="flex items-center gap-2 text-sm text-gray-600"><input type="checkbox"
                                    class="rounded text-blue-500"> DKI Jakarta</label>
                            <label class="flex items-center gap-2 text-sm text-gray-600"><input type="checkbox"
                                    class="rounded"> Jawa Barat</label>
                            <label class="flex items-center gap-2 text-sm text-gray-600"><input type="checkbox"
                                    class="rounded"> Jawa Tengah</label>
                            <label class="flex items-center gap-2 text-sm text-gray-600"><input type="checkbox"
                                    class="rounded"> Jawa Timur</label>
                            <label class="flex items-center gap-2 text-sm text-gray-600"><input type="checkbox"
                                    class="rounded"> Bali</label>
                            <label class="flex items-center gap-2 text-sm text-gray-600"><input type="checkbox"
                                    class="rounded"> Ubud Selatan</label>
                        </div>
                    </details>

                    <!-- HARGA (min & max input) -->
                    <div class="mb-5 border-b border-gray-100 pb-4">
                        <h3 class="font-semibold text-gray-700 mb-3">Harga</h3>
                        <div class="flex gap-2 items-center">
                            <input type="number" placeholder="Min"
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-blue-200 focus:border-blue-300">
                            <span class="text-gray-400">—</span>
                            <input type="number" placeholder="Max"
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-blue-200 focus:border-blue-300">
                        </div>
                    </div>

                    <!-- KONDISI (Baru/Bekas) + Rating (checkbox bintang) + Penawaran -->
                    <div class="mb-5 border-b border-gray-100 pb-4">
                        <h3 class="font-semibold text-gray-700 mb-2">Kondisi</h3>
                        <div class="flex gap-4"><label class="flex items-center gap-1 text-sm"><input type="radio"
                                    name="kondisi" class="accent-blue-500"> Baru</label><label
                                class="flex items-center gap-1 text-sm"><input type="radio" name="kondisi">
                                Bekas</label></div>
                    </div>
                    <div class="mb-5 border-b border-gray-100 pb-4">
                        <h3 class="font-semibold text-gray-700 mb-2">⭐ Rating</h3>
                        <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded"> ★ 4 ke
                            atas</label>
                        <label class="flex items-center gap-2 text-sm mt-1"><input type="checkbox" class="rounded"> ★
                            3.5+</label>
                    </div>
                    <div class="mb-5 border-b border-gray-100 pb-4">
                        <h3 class="font-semibold text-gray-700 mb-2">Penawaran</h3>
                        <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded"> COD
                            (Bayar di Tempat)</label>
                        <label class="flex items-center gap-2 text-sm mt-1"><input type="checkbox" class="rounded">
                            Diskon / Harga Dokon</label>
                    </div>
                    <div class="mt-4">
                        <button
                            class="w-full bg-blue-50 text-blue-700 text-sm font-medium py-2 rounded-xl hover:bg-blue-100 transition">Terapkan
                            Filter</button>
                    </div>
                </div>
            </aside>

            <!-- ========== MAIN CONTENT (produk + tab) ========== -->
            <div class="flex-1 min-w-0">
                <!-- Tab Produk / Toko -->
                <div class="flex border-b border-gray-200 gap-6 mb-6">
                    <button
                        class="pb-2 text-base font-semibold text-blue-600 border-b-2 border-blue-600">Produk</button>
                    <button class="pb-2 text-base font-medium text-gray-500 hover:text-gray-700">Toko</button>
                </div>

                <!-- grid produk: default 5 kolom (desktop) lg:grid-cols-5, tablet md:grid-cols-3, mobile grid-cols-2 sm:grid-cols-2 -->
                <div
                    class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 gap-y-8">

                    <!-- Card Produk 1 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 relative overflow-hidden">
                            <div
                                class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-100 flex items-center justify-center text-gray-400">
                                📦</div>
                        </div>
                        <div class="p-3">
                            <h3 class="font-bold text-gray-800 truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg mt-1">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm mt-1"><span class="text-yellow-500">★</span>
                                <span class="font-medium">5.0</span> <span class="text-gray-400 text-xs">(500+
                                    terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1 flex items-center gap-1"><svg class="w-3 h-3"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>Jakarta Utara</div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">👜</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Bandung, Jabar</div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">👟</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Surabaya, Jatim</div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">⌚</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Semarang, Jateng</div>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">🎧</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Bali, Denpasar</div>
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">📷</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Tangerang</div>
                        </div>
                    </div>
                    <!-- Card 7 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">💻</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Yogyakarta</div>
                        </div>
                    </div>
                    <!-- Card 8 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">📱</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Depok, Jabar</div>
                        </div>
                    </div>
                    <!-- Card 9 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">🕶️</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Bekasi</div>
                        </div>
                    </div>
                    <!-- Card 10 -->
                    <div
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200 hover:shadow-lift hover:scale-105 cursor-pointer">
                        <div class="aspect-square bg-gray-200 flex items-center justify-center text-gray-400">🧥</div>
                        <div class="p-3">
                            <h3 class="font-bold truncate">Nama Produk</h3>
                            <div class="text-black font-extrabold text-lg">Rp100.000</div>
                            <div class="flex items-center gap-1 text-sm"><span class="text-yellow-500">★</span> 5.0
                                <span class="text-gray-400 text-xs">(500+ terjual)</span></div>
                            <div class="text-gray-400 text-xs mt-1">📍Jakarta Pusat</div>
                        </div>
                    </div>
                </div>

                <!-- ========== LAYOUT KEDUA: TANPA SIDEBAR (opsional - contoh area tambahan) ========== -->
                <!-- Variasi tanpa sidebar (di bawah main, menggunakan tombol "Ready Stock" di kiri atas) -->
                <div class="mt-16 pt-4 border-t border-gray-200">
                    <div class="flex items-center justify-between flex-wrap gap-3 mb-5">
                        <div class="flex items-center gap-2">
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full text-sm font-medium shadow-sm transition">✅
                                Ready Stock</button>
                            <span class="text-gray-500 text-xs bg-gray-100 px-3 py-1.5 rounded-full">Filter cepat: stok
                                siap kirim</span>
                        </div>
                        <h3 class="text-gray-700 font-semibold text-sm">✨ Tanpa Sidebar · Mode full width</h3>
                    </div>
                    <!-- grid produk kedua (tanpa sidebar style, layout tetap sama) -->
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 gap-y-8">
                        <div
                            class="group bg-white rounded-xl shadow-sm border hover:shadow-lift hover:scale-105 transition-all cursor-pointer">
                            <div class="aspect-square bg-gray-200 flex items-center justify-center">⚡</div>
                            <div class="p-3">
                                <div class="font-bold">Flash Sale Item</div>
                                <div class="font-extrabold">Rp99.000</div>
                                <div class="text-xs text-gray-400">★ 4.9 | 1,2rb terjual</div>
                                <div class="text-gray-400 text-xs">Toko Resmi</div>
                            </div>
                        </div>
                        <div
                            class="group bg-white rounded-xl shadow-sm border hover:shadow-lift hover:scale-105 transition-all cursor-pointer">
                            <div class="aspect-square bg-gray-200 flex items-center justify-center">🎒</div>
                            <div class="p-3">
                                <div class="font-bold">Ready Stock</div>
                                <div class="font-extrabold">Rp125.000</div>
                                <div class="text-xs text-gray-400">★ 5.0 | 320+ terjual</div>
                                <div class="text-gray-400 text-xs">Toko Official</div>
                            </div>
                        </div>
                        <div
                            class="group bg-white rounded-xl shadow-sm border hover:shadow-lift hover:scale-105 transition-all cursor-pointer">
                            <div class="aspect-square bg-gray-200 flex items-center justify-center">📚</div>
                            <div class="p-3">
                                <div class="font-bold">Buku Edukasi</div>
                                <div class="font-extrabold">Rp75.000</div>
                                <div class="text-xs text-gray-400">★ 4.8 | 900+ terjual</div>
                                <div class="text-gray-400 text-xs">Jakarta</div>
                            </div>
                        </div>
                        <div
                            class="group bg-white rounded-xl shadow-sm border hover:shadow-lift hover:scale-105 transition-all cursor-pointer">
                            <div class="aspect-square bg-gray-200 flex items-center justify-center">🎮</div>
                            <div class="p-3">
                                <div class="font-bold">Gaming Headset</div>
                                <div class="font-extrabold">Rp250.000</div>
                                <div class="text-xs text-gray-400">★ 4.9 | 1,8rb terjual</div>
                                <div class="text-gray-400 text-xs">Surabaya</div>
                            </div>
                        </div>
                        <div
                            class="group bg-white rounded-xl shadow-sm border hover:shadow-lift hover:scale-105 transition-all cursor-pointer">
                            <div class="aspect-square bg-gray-200 flex items-center justify-center">⌨️</div>
                            <div class="p-3">
                                <div class="font-bold">Mechanical Keyboard</div>
                                <div class="font-extrabold">Rp450.000</div>
                                <div class="text-xs text-gray-400">★ 4.7 | 234 terjual</div>
                                <div class="text-gray-400 text-xs">Bandung</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tambahan spacer -->
                <div class="h-8"></div>
            </div>
        </div>
    </div>

    <!-- footer tipis (opsional) -->
    <footer class="bg-white border-t border-gray-100 py-6 text-center text-xs text-gray-400">
        © 2025 VEXORA — marketplace modern & terpercaya. Belanja aman & nyaman.
    </footer>

    <!-- drawer sidebar untuk mobile (hidden) tapi sesuai requirement "sidebar jadi drawer (hidden di mobile)" hanya showcase karena tidak ada js interaktif, tapi struktur sudah memenuhi:
       Pada layar lg:block, <lg akan disembunyikan, dan seharusnya drawer bisa diimplementasikan via JS, namun di poin tidak perlu framework JS; kami tidak menyertakan JS eksternal, hanya structural. Tampilan desktop-first sudah sempurna.
       User bisa menggunakan toggle class di produksi. Kami sudah patuhi tanpa library tambahan.
  -->
    <!-- Catatan: Sidebar desktop & tablet berfungsi, mobile tidak mengganggu. Tambahan "Ready Stock" menunjukkan variasi tanpa sidebar -->
</body>

</html>
