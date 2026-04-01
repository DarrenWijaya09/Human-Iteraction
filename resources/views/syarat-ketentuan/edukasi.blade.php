<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEXORA · Seller Center</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .list-disc ul,
        .list-disc ol {
            list-style-type: circle;
            margin-top: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .list-disc ul ul {
            list-style-type: square;
        }

        /* Custom scrollbar styling */
        .scrollable-content::-webkit-scrollbar {
            width: 6px;
        }

        .scrollable-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .scrollable-content::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 10px;
        }

        .scrollable-content::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }

        /* Modern card hover effects */
        .rule-card {
            transition: all 0.2s ease;
        }

        .rule-card:hover {
            transform: translateX(4px);
            background-color: #f9fafb;
        }

        /* Color swatch untuk identitas visual brand */
        .color-swatch {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            margin-right: 8px;
            vertical-align: middle;
            border: 1px solid #e2e8f0;
        }
    </style>
</head>

<body class="bg-white font-sans antialiased">

    <!-- CONTAINER FULL WIDTH dengan padding minimal -->
    <div class="max-w-[1600px] mx-auto p-3 sm:p-4 lg:p-6">

        <!-- TOP NAVIGATION -->
        <nav class="flex flex-col sm:flex-row justify-between items-center pb-3 border-b border-gray-200 mb-4 sm:mb-6 lg:mb-8 gap-3 sm:gap-0">
            <!-- Logo -->
            <div class="flex items-center justify-center sm:justify-start w-full sm:w-auto">
                <img src="{{ asset('assets/images/logo-copy.jpeg') }}"
                     class="h-14 sm:h-12 md:h-10 object-contain"
                     alt="Vexora Logo">
            </div>

            <!-- Navigation Links -->
            <div class="flex flex-wrap justify-center sm:justify-end items-center gap-2 sm:gap-3 md:gap-4 lg:gap-6 w-full sm:w-auto">
                <a href="{{ route('who-we-are') }}" class="text-gray-600 hover:text-blue-600 transition text-xs sm:text-sm md:text-base font-medium px-2 py-1 whitespace-nowrap">Profile</a>
                <a href="{{ route('syarat-ketentuan') }}" class="text-gray-600 hover:text-blue-600 transition text-xs sm:text-sm md:text-base font-medium px-2 py-1 whitespace-nowrap">Hak Kekayaan Intelektual</a>
                <a href="{{ route('ruang-edukasi') }}" class="text-blue-600 border-b-2 border-blue-500 pb-0.5 font-semibold text-xs sm:text-sm md:text-base px-2 py-1 whitespace-nowrap">Ruang Edukasi Vexora</a>
            </div>
        </nav>

        <!-- MAIN TWO-COLUMN -->
        <div class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-12">

            <!-- LEFT COLUMN: gambar -->
            <div class="md:w-[60%]">
                <img src="{{ asset('assets/images/edukasi.jpeg') }}" alt="Seller Center - Edukasi untuk Seller"
                    class="w-full h-auto object-contain max-h-[250px] sm:max-h-[350px] md:max-h-[700px] mx-auto rounded-lg md:rounded-none shadow-sm"
                    onerror="this.src='https://placehold.co/800x600/2563eb/ffffff?text=Seller+Education'">
            </div>

            <!-- RIGHT COLUMN: teks dengan SCROLLER - DESAIN MODERN -->
            <div class="md:w-[40%]">
                <div class="max-h-none md:max-h-[700px] md:overflow-y-auto pr-0 md:pr-3 scrollable-content">
                    <div class="space-y-5 md:space-y-7">
                        <!-- main title dengan icon -->
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                                Seller Center
                            </h1>
                        </div>

                        <!-- Badge pembuka -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl border border-blue-100">
                            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                                <span class="font-semibold text-blue-600">Ruang Edukasi Vexora</span> merupakan pusat pengetahuan bagi para seller untuk memahami cara berjualan yang profesional, aman, dan sesuai dengan kebijakan platform.
                            </p>
                            <div class="flex items-center gap-2 mt-3 text-xs text-blue-500">
                                <span class="inline-block w-2 h-2 bg-blue-400 rounded-full"></span>
                                <span>Bangun reputasi · Tingkatkan kualitas · Ekosistem sehat</span>
                            </div>
                        </div>

                        <!-- Daftar aturan dengan desain modern -->
                        <div class="space-y-5">
                            <!-- 1. Aturan Penamaan Jasa -->
                            <div class="rule-card p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">1</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Aturan Penamaan Jasa</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <p class="text-gray-600 text-sm">
                                        <span class="text-red-500 font-medium">✕ Tidak diperbolehkan:</span> kata yang mengarah pada aktivitas joki
                                    </p>

                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs rounded-full border border-red-100">Joki tugas</span>
                                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs rounded-full border border-red-100">Joki skripsi</span>
                                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs rounded-full border border-red-100">Joki ujian</span>
                                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs rounded-full border border-red-100">Joki project</span>
                                    </div>

                                    <p class="text-gray-600 text-sm mt-2">
                                        <span class="text-green-500 font-medium">✓ Alternatif profesional:</span>
                                    </p>

                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs rounded-full border border-green-100">Konsultasi tugas</span>
                                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs rounded-full border border-green-100">Bimbingan project</span>
                                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs rounded-full border border-green-100">Bantuan revisi tugas</span>
                                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs rounded-full border border-green-100">Pendampingan project</span>
                                    </div>

                                    <p class="text-xs text-gray-500 italic mt-2">
                                        Menjaga integritas akademik & reputasi platform
                                    </p>
                                </div>
                            </div>

                            <!-- 2. Larangan Duplikasi Produk -->
                            <div class="rule-card p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">2</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Larangan Duplikasi Produk</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <p class="text-gray-600 text-sm">
                                        Satu layanan untuk satu jenis produk yang sama.
                                    </p>

                                    <div class="bg-yellow-50 p-3 rounded-lg border border-yellow-100">
                                        <p class="text-xs font-medium text-yellow-700 mb-1">Contoh pelanggaran:</p>
                                        <p class="text-xs text-gray-600">Memposting layanan desain logo 5x dengan judul berbeda tapi isi sama</p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-2 mt-2">
                                        <div class="bg-blue-50 p-2 rounded-lg text-center">
                                            <p class="text-xs font-medium text-blue-700">Paket Basic</p>
                                        </div>
                                        <div class="bg-blue-50 p-2 rounded-lg text-center">
                                            <p class="text-xs font-medium text-blue-700">Paket Standard</p>
                                        </div>
                                        <div class="bg-blue-50 p-2 rounded-lg text-center col-span-2">
                                            <p class="text-xs font-medium text-blue-700">Paket Premium</p>
                                        </div>
                                    </div>

                                    <p class="text-xs text-gray-500">
                                        ✅ Gunakan paket dalam satu postingan untuk variasi layanan
                                    </p>
                                </div>
                            </div>

                            <!-- 3. Deskripsi Layanan yang Jelas -->
                            <div class="rule-card p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">3</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Deskripsi Layanan</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <p class="text-gray-600 text-sm">Wajib jelas & transparan, mencakup:</p>

                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="flex items-center gap-1">
                                            <span class="text-green-500">✓</span>
                                            <span class="text-xs text-gray-600">Jenis layanan</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <span class="text-green-500">✓</span>
                                            <span class="text-xs text-gray-600">Detail pekerjaan</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <span class="text-green-500">✓</span>
                                            <span class="text-xs text-gray-600">Estimasi waktu</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <span class="text-green-500">✓</span>
                                            <span class="text-xs text-gray-600">Revisi</span>
                                        </div>
                                        <div class="flex items-center gap-1 col-span-2">
                                            <span class="text-green-500">✓</span>
                                            <span class="text-xs text-gray-600">Hasil yang diterima</span>
                                        </div>
                                    </div>

                                    <p class="text-xs text-blue-600 italic">
                                        ↑ Meningkatkan kepercayaan pembeli
                                    </p>
                                </div>
                            </div>

                            <!-- 4. Transparansi Harga -->
                            <div class="rule-card p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">4</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Transparansi Harga</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <p class="text-gray-600 text-sm">Cantumkan harga jelas, tanpa biaya tersembunyi</p>

                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="flex justify-between items-center text-xs">
                                            <span>Harga dasar</span>
                                            <span class="font-medium">Rp 100.000</span>
                                        </div>
                                        <div class="flex justify-between items-center text-xs mt-1">
                                            <span>Revisi tambahan</span>
                                            <span class="font-medium">+ Rp 25.000</span>
                                        </div>
                                        <div class="flex justify-between items-center text-xs mt-1">
                                            <span>Pengerjaan cepat</span>
                                            <span class="font-medium">+ Rp 50.000</span>
                                        </div>
                                    </div>

                                    <p class="text-xs text-gray-500 italic">
                                        Hindari konflik antara buyer dan seller
                                    </p>
                                </div>
                            </div>

                            <!-- 5. Kualitas Layanan -->
                            <div class="rule-card p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">5</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Kualitas & Profesionalitas</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <div class="flex items-start gap-2">
                                        <span class="text-blue-500 text-sm">•</span>
                                        <span class="text-xs text-gray-600">Hasil sesuai deskripsi</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <span class="text-blue-500 text-sm">•</span>
                                        <span class="text-xs text-gray-600">Hindari plagiarisme</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <span class="text-blue-500 text-sm">•</span>
                                        <span class="text-xs text-gray-600">Komunikasi baik dengan pembeli</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <span class="text-blue-500 text-sm">•</span>
                                        <span class="text-xs text-gray-600">Selesaikan tepat waktu</span>
                                    </div>

                                    <div class="flex items-center gap-1 text-xs text-yellow-600 bg-yellow-50 p-2 rounded-lg">
                                        <span>⭐</span>
                                        <span>Reputasi meningkat dengan layanan konsisten</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 6. Sistem Penilaian -->
                            <div class="rule-card p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">6</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Penilaian & Reputasi</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <div class="flex items-center gap-2">
                                        <div class="flex">
                                            <span class="text-yellow-400">★★★★★</span>
                                        </div>
                                        <span class="text-xs text-gray-600">Rating & ulasan dari buyer</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-1 text-center">
                                        <div class="bg-gray-50 p-2 rounded-lg">
                                            <p class="text-xs font-medium text-blue-600">Kepercayaan</p>
                                        </div>
                                        <div class="bg-gray-50 p-2 rounded-lg">
                                            <p class="text-xs font-medium text-blue-600">Reputasi</p>
                                        </div>
                                        <div class="bg-gray-50 p-2 rounded-lg">
                                            <p class="text-xs font-medium text-blue-600">Peluang</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 7. Keamanan Transaksi -->
                            <div class="rule-card p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">7</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Keamanan Transaksi</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <p class="text-xs text-green-600 bg-green-50 p-2 rounded-lg">
                                        ✓ Transaksi melalui sistem resmi Vexora
                                    </p>

                                    <div class="text-xs text-red-600 bg-red-50 p-2 rounded-lg">
                                        <p class="font-medium mb-1">✕ Dilarang:</p>
                                        <ul class="list-disc pl-4 space-y-0.5">
                                            <li>Transaksi di luar platform</li>
                                            <li>Bagikan kontak pribadi</li>
                                            <li>Penipuan/manipulasi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- 8. Pengembangan Seller -->
                            <div class="rule-card p-4 rounded-xl border border-blue-200 bg-blue-50/50 shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-7 h-7 bg-blue-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">8</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Pengembangan Seller</h2>
                                </div>

                                <div class="space-y-3 pl-10">
                                    <p class="text-xs text-gray-600">Materi edukasi untuk berkembang:</p>

                                    <div class="grid grid-cols-1 gap-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-blue-500">📈</span>
                                            <span class="text-xs">Tips meningkatkan penjualan</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-blue-500">📝</span>
                                            <span class="text-xs">Deskripsi produk menarik</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-blue-500">🏆</span>
                                            <span class="text-xs">Strategi reputasi toko</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-blue-500">💬</span>
                                            <span class="text-xs">Panduan komunikasi</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-blue-500">⭐</span>
                                            <span class="text-xs">Tingkatkan rating</span>
                                        </div>
                                    </div>

                                    <p class="text-xs font-medium text-blue-700 bg-white p-2 rounded-lg border border-blue-200">
                                        🚀 Dengan panduan ini, performa toko meningkat berkelanjutan
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- tiny extra highlight -->
                        <div class="text-xs text-blue-500 font-medium flex items-center gap-1 mt-4 pt-2">
                            <span class="inline-block w-2 h-2 bg-blue-400 rounded-full"></span>
                            © VEXORA – edukasi seller profesional
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="mt-8 sm:mt-10 md:mt-14 text-center text-gray-400 text-xs border-t border-gray-200 pt-4 sm:pt-5">
            <span class="bg-white px-3 sm:px-4 py-1 sm:py-1.5 rounded-full border border-gray-100">Seller Center · Ruang Edukasi Vexora 2025</span>
        </div>
    </div>
</body>

</html>
