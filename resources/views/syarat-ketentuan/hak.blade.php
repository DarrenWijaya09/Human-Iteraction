<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEXORA · Hak Kekayaan Intelektual</title>
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

        /* Modern card hover effects */
        .ip-card {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .ip-card:hover {
            transform: translateX(4px);
            border-left-color: #3b82f6;
            background-color: #f9fafb;
        }

        .ip-section {
            scroll-margin-top: 20px;
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
                <a href="{{ route('syarat-ketentuan') }}" class="text-blue-600 border-b-2 border-blue-500 pb-0.5 font-semibold text-xs sm:text-sm md:text-base px-2 py-1 whitespace-nowrap">Hak Kekayaan Intelektual</a>
                <a href="{{ route('ruang-edukasi') }}" class="text-gray-600 hover:text-blue-600 transition text-xs sm:text-sm md:text-base font-medium px-2 py-1 whitespace-nowrap">Ruang Edukasi Vexora</a>
            </div>
        </nav>

        <!-- MAIN TWO-COLUMN -->
        <div class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-12">

            <!-- LEFT COLUMN: gambar -->
            <div class="md:w-[60%]">
                <img src="{{ asset('assets/images/hak-cipta.jpeg') }}" alt="Ilustrasi Hak Cipta - kode program"
                    class="w-full h-auto object-contain max-h-[250px] sm:max-h-[350px] md:max-h-[700px] mx-auto rounded-lg md:rounded-none shadow-sm">
            </div>

            <!-- RIGHT COLUMN: teks dengan SCROLLER - DESAIN MODERN -->
            <div class="md:w-[40%]">
                <div class="max-h-none md:max-h-[700px] md:overflow-y-auto pr-0 md:pr-3 scrollable-content">
                    <div class="space-y-5 md:space-y-7">
                        <!-- main title dengan icon -->
                        <div class="flex items-center gap-3 mb-2 sticky top-0 bg-white pt-2 pb-3 z-10 border-b border-gray-100">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                                    Hak Cipta <span class="text-blue-600">(Copyright)</span>
                                </h1>
                                <p class="text-xs text-gray-500 mt-0.5">Perlindungan kekayaan intelektual Vexora</p>
                            </div>
                        </div>

                        <div class="text-gray-700 text-sm sm:text-base leading-relaxed space-y-4 md:space-y-6">

                            <!-- Statistik cepat -->
                            <div class="grid grid-cols-3 gap-2 mb-4">
                                <div class="bg-blue-50 p-2 rounded-lg text-center">
                                    <p class="text-lg font-bold text-blue-600">3</p>
                                    <p class="text-[10px] text-gray-500">Kategori Utama</p>
                                </div>
                                <div class="bg-blue-50 p-2 rounded-lg text-center">
                                    <p class="text-lg font-bold text-blue-600">15+</p>
                                    <p class="text-[10px] text-gray-500">Elemen Dilindungi</p>
                                </div>
                                <div class="bg-blue-50 p-2 rounded-lg text-center">
                                    <p class="text-lg font-bold text-blue-600">2026</p>
                                    <p class="text-[10px] text-gray-500">Berdiri</p>
                                </div>
                            </div>

                            <!-- Bagian A (Source Code) - Modern Card -->
                            <div class="ip-card p-4 rounded-xl border border-gray-200 bg-white shadow-sm ip-section">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">A</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Source Code & Sistem</h2>
                                </div>

                                <div class="space-y-3">
                                    <p class="text-gray-600 text-sm">Hak cipta mencakup seluruh kode program yang digunakan untuk membangun dan menjalankan platform.</p>

                                    <!-- Front-end code -->
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                            <p class="font-medium text-blue-700 text-sm">Front-end code</p>
                                        </div>
                                        <div class="flex flex-wrap gap-2 pl-4">
                                            <span class="px-2 py-1 bg-white text-xs rounded-md border border-gray-200">HTML</span>
                                            <span class="px-2 py-1 bg-white text-xs rounded-md border border-gray-200">CSS</span>
                                            <span class="px-2 py-1 bg-white text-xs rounded-md border border-gray-200">JavaScript</span>
                                            <span class="px-2 py-1 bg-white text-xs rounded-md border border-gray-200">React/Vue</span>
                                        </div>
                                    </div>

                                    <!-- Back-end code -->
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                            <p class="font-medium text-blue-700 text-sm">Back-end code</p>
                                        </div>
                                        <div class="grid grid-cols-2 gap-1 pl-4">
                                            <span class="text-xs text-gray-600">• Sistem API</span>
                                            <span class="text-xs text-gray-600">• Logika server</span>
                                            <span class="text-xs text-gray-600">• Autentikasi</span>
                                            <span class="text-xs text-gray-600">• Manajemen transaksi</span>
                                        </div>
                                    </div>

                                    <!-- Database structure -->
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                            <p class="font-medium text-blue-700 text-sm">Database structure</p>
                                        </div>
                                        <div class="pl-4 space-y-1">
                                            <p class="text-xs text-gray-600">• Struktur tabel database</p>
                                            <p class="text-xs text-gray-600">• Query sistem</p>
                                            <p class="text-xs text-gray-600">• Struktur relasi data</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bagian B (UI/UX) -->
                            <div class="ip-card p-4 rounded-xl border border-gray-200 bg-white shadow-sm ip-section">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">B</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Desain Antarmuka (UI/UX)</h2>
                                </div>

                                <div class="space-y-3">
                                    <p class="text-gray-600 text-sm">Hak cipta juga melindungi desain visual yang dirancang untuk pengalaman pengguna.</p>

                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="bg-gray-50 p-2 rounded-lg">
                                            <p class="text-xs font-medium text-gray-700">Layout halaman utama</p>
                                        </div>
                                        <div class="bg-gray-50 p-2 rounded-lg">
                                            <p class="text-xs font-medium text-gray-700">Struktur navigasi</p>
                                        </div>
                                        <div class="bg-gray-50 p-2 rounded-lg">
                                            <p class="text-xs font-medium text-gray-700">Dashboard pengguna</p>
                                        </div>
                                        <div class="bg-gray-50 p-2 rounded-lg">
                                            <p class="text-xs font-medium text-gray-700">Marketplace jasa</p>
                                        </div>
                                        <div class="bg-gray-50 p-2 rounded-lg col-span-2">
                                            <p class="text-xs font-medium text-gray-700">Desain halaman transaksi</p>
                                        </div>
                                    </div>

                                    <p class="text-xs text-gray-500 italic border-l-2 border-purple-200 pl-2">
                                        Karya kreatif dengan nilai estetika dan fungsionalitas
                                    </p>
                                </div>
                            </div>

                            <!-- Bagian C (Elemen Visual) -->
                            <div class="ip-card p-4 rounded-xl border border-gray-200 bg-white shadow-sm ip-section">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">C</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Elemen Visual & Grafis</h2>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs rounded-full border border-blue-100">Logo Vexora</span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs rounded-full border border-blue-100">Ikon layanan</span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs rounded-full border border-blue-100">Ilustrasi website</span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs rounded-full border border-blue-100">Desain banner</span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs rounded-full border border-blue-100">Visual marketing</span>
                                    </div>

                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <p class="text-xs font-medium text-gray-700 mb-2">Ikon khusus Vexora:</p>
                                        <div class="flex gap-3 justify-around">
                                            <div class="text-center">
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mx-auto">🔭</div>
                                                <span class="text-[10px]">binocular</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mx-auto">🚀</div>
                                                <span class="text-[10px]">rocket</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mx-auto">🏆</div>
                                                <span class="text-[10px]">trophy</span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-xs text-gray-500 italic">
                                        Identitas visual yang tidak boleh digunakan tanpa izin
                                    </p>
                                </div>
                            </div>

                            <!-- Merek Dagang (Trademark) -->
                            <div class="ip-card p-4 rounded-xl border border-gray-200 bg-white shadow-sm ip-section">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">®</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Merek Dagang</h2>
                                </div>

                                <div class="space-y-4">
                                    <!-- Nama Platform -->
                                    <div class="border-l-2 border-orange-200 pl-3">
                                        <p class="font-medium text-gray-700 text-sm mb-2">A. Nama Platform</p>
                                        <div class="bg-orange-50 inline-block px-3 py-1 rounded-full border border-orange-200 mb-2">
                                            <span class="font-bold text-orange-700">Vexora</span>
                                        </div>
                                        <div class="flex flex-wrap gap-2 text-xs text-gray-600">
                                            <span>Website</span>
                                            <span>•</span>
                                            <span>Aplikasi</span>
                                            <span>•</span>
                                            <span>Promosi</span>
                                            <span>•</span>
                                            <span>Branding</span>
                                        </div>
                                    </div>

                                    <!-- Logo Brand -->
                                    <div class="border-l-2 border-orange-200 pl-3">
                                        <p class="font-medium text-gray-700 text-sm mb-2">B. Logo & Simbol Brand</p>
                                        <ul class="text-xs text-gray-600 space-y-1 list-disc pl-4">
                                            <li>Logo utama</li>
                                            <li>Simbol grafis brand</li>
                                            <li>Bentuk visual logo</li>
                                            <li>Kombinasi warna</li>
                                        </ul>
                                    </div>

                                    <!-- Tagline -->
                                    <div class="border-l-2 border-orange-200 pl-3">
                                        <p class="font-medium text-gray-700 text-sm mb-2">C. Tagline Brand</p>
                                        <div class="bg-orange-50 p-2 rounded-lg italic text-sm text-orange-700">
                                            "Innovate. Create. Elevate."
                                        </div>
                                    </div>

                                    <!-- Identitas Visual Brand -->
                                    <div class="border-l-2 border-orange-200 pl-3">
                                        <p class="font-medium text-gray-700 text-sm mb-2">D. Warna Brand</p>
                                        <div class="flex flex-wrap gap-2">
                                            <div class="flex items-center gap-1">
                                                <span class="color-swatch" style="background-color: #2563EB;"></span>
                                                <span class="text-[10px]">Tech Blue</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <span class="color-swatch" style="background-color: #60A5FA;"></span>
                                                <span class="text-[10px]">Soft Blue</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <span class="color-swatch" style="background-color: #F8FAFC; border: 1px solid #cbd5e1;"></span>
                                                <span class="text-[10px]">Soft White</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <span class="color-swatch" style="background-color: #1F2937;"></span>
                                                <span class="text-[10px] text-white bg-gray-800 px-1 rounded">Dark Gray</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Desain Industri -->
                            <div class="ip-card p-4 rounded-xl border border-gray-200 bg-white shadow-sm ip-section">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-8 h-8 bg-teal-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">DI</div>
                                    <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Desain Industri</h2>
                                </div>

                                <div class="space-y-3">
                                    <p class="text-gray-600 text-sm">Tampilan visual produk digital dengan nilai estetika khas Vexora.</p>

                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="bg-teal-50 p-2 rounded-lg text-center">
                                            <p class="text-xs font-medium">Halaman utama</p>
                                        </div>
                                        <div class="bg-teal-50 p-2 rounded-lg text-center">
                                            <p class="text-xs font-medium">Marketplace</p>
                                        </div>
                                        <div class="bg-teal-50 p-2 rounded-lg text-center">
                                            <p class="text-xs font-medium">Kartu layanan</p>
                                        </div>
                                        <div class="bg-teal-50 p-2 rounded-lg text-center">
                                            <p class="text-xs font-medium">Profil user</p>
                                        </div>
                                        <div class="bg-teal-50 p-2 rounded-lg text-center col-span-2">
                                            <p class="text-xs font-medium">Dashboard pengguna</p>
                                        </div>
                                    </div>

                                    <!-- Contoh Navigasi -->
                                    <div class="bg-teal-50 p-3 rounded-lg border border-teal-100 mt-2">
                                        <p class="font-medium text-teal-700 text-xs mb-2">Sistem Navigasi:</p>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="px-2 py-1 bg-white text-xs rounded-md">Menu utama</span>
                                            <span class="px-2 py-1 bg-white text-xs rounded-md">Kategori layanan</span>
                                            <span class="px-2 py-1 bg-white text-xs rounded-md">Pencarian jasa</span>
                                        </div>
                                        <p class="text-[10px] text-gray-500 mt-2">Mempengaruhi pengalaman pengguna</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Penutup dengan kalimat HKI - Modern Callout -->
                            <div class="mt-4 md:mt-6 pt-2">
                                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-5 rounded-xl shadow-lg text-white">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">🔒</span>
                                        <p class="text-lg font-semibold">Perlindungan Berkelanjutan</p>
                                    </div>
                                    <p class="text-sm text-white/90 leading-relaxed">
                                        Hak Kekayaan Intelektual akan terus ditambah dan dipatenkan demi menjaga <span class="font-semibold text-yellow-300">kenyamanan, keamanan, dan privasi pengguna</span>.
                                    </p>
                                    <div class="flex items-center gap-2 mt-4 text-xs text-white/80">
                                        <span class="inline-block w-2 h-2 bg-white rounded-full"></span>
                                        <span>Komitmen Vexora untuk inovasi terpercaya</span>
                                    </div>
                                </div>
                            </div>

                            <!-- tiny extra highlight -->
                            <div class="text-xs text-blue-500 font-medium flex items-center gap-1 mt-4 pt-2">
                                <span class="inline-block w-2 h-2 bg-blue-400 rounded-full"></span>
                                © VEXORA – semua hak dilindungi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="mt-8 sm:mt-10 md:mt-14 text-center text-gray-400 text-xs border-t border-gray-200 pt-4 sm:pt-5">
            <span class="bg-white px-3 sm:px-4 py-1 sm:py-1.5 rounded-full border border-gray-100 shadow-sm">Hak Kekayaan Intelektual · Vexora 2025</span>
        </div>
    </div>
</body>

</html>
