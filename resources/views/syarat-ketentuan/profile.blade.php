<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEXORA · Who We Are</title>
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
    </style>
</head>

<body class="bg-white font-sans antialiased">

    <!-- CONTAINER FULL WIDTH dengan padding minimal (SAMA PERSIS DENGAN HAK CIPTA) -->
    <div class="max-w-[1600px] mx-auto p-3 sm:p-4 lg:p-6">

        <!-- TOP NAVIGATION - SAMA PERSIS -->
        <nav class="flex flex-col sm:flex-row justify-between items-center pb-3 border-b border-gray-200 mb-4 sm:mb-6 lg:mb-8 gap-3 sm:gap-0">
            <!-- Logo - di tengah di mobile, kiri di desktop -->
            <div class="flex items-center justify-center sm:justify-start w-full sm:w-auto">
                <img src="{{ asset('assets/images/logo-copy.jpeg') }}"
                     class="h-14 sm:h-12 md:h-10 object-contain"
                     alt="Vexora Logo">
            </div>

            <!-- Navigation Links - dibungkus dengan container yang responsive -->
            <div class="flex flex-wrap justify-center sm:justify-end items-center gap-2 sm:gap-3 md:gap-4 lg:gap-6 w-full sm:w-auto">
                <a href="{{ route('who-we-are') }}" class="text-blue-600 border-b-2 border-blue-500 pb-0.5 font-semibold text-xs sm:text-sm md:text-base px-2 py-1 whitespace-nowrap">Profile</a>
                <a href="{{ route('syarat-ketentuan') }}" class="text-gray-600 hover:text-blue-600 transition text-xs sm:text-sm md:text-base font-medium px-2 py-1 whitespace-nowrap">Hak Kekayaan Intelektual</a>
                <a href="{{ route('ruang-edukasi') }}" class="text-gray-600 hover:text-blue-600 transition text-xs sm:text-sm md:text-base font-medium px-2 py-1 whitespace-nowrap">Ruang Edukasi Vexora</a>
            </div>
        </nav>

        <!-- MAIN TWO-COLUMN (SAMA PERSIS STRUKTURNYA DENGAN HAK CIPTA) -->
        <div class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-12">

            <!-- LEFT COLUMN: gambar -->
            <div class="md:w-[60%]">
                <img src="{{ asset('assets/images/profile.jpeg') }}" alt="Vexora Team - Who We Are"
                    class="w-full h-auto object-contain max-h-[250px] sm:max-h-[350px] md:max-h-[700px] mx-auto rounded-lg md:rounded-none"
                    onerror="this.src='https://placehold.co/800x600/2563eb/ffffff?text=Vexora+Team'">
            </div>

            <!-- RIGHT COLUMN: teks dengan SCROLLER -->
            <div class="md:w-[40%]">
                <div class="max-h-none md:max-h-[700px] md:overflow-y-auto pr-0 md:pr-3 scrollable-content">
                    <div class="space-y-4 md:space-y-6">
                        <!-- main title -->
                        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-1 border-l-4 border-blue-400 pl-3">
                            Who <span class="text-blue-600">We Are</span>
                        </h1>

                        <div class="text-gray-700 text-sm sm:text-base leading-relaxed space-y-4 md:space-y-6">
                            <!-- Description paragraphs -->
                            <div>
                                <p class="mt-2">
                                    <span class="font-semibold text-blue-800">Vexora</span> telah berdiri sejak 2026, berfokus pada IT E-Commerce dan Online Forum Discussion. We aspire to be the best Digital E-Commerce IT Provider in Indonesia.
                                </p>
                                <p class="mt-3">
                                    Kami selalu berusaha memastikan kepuasan pelanggan dengan memberikan solusi terbaik dalam hal produk, teknologi, dan layanan profesional.
                                </p>
                            </div>

                            <!-- Vision Block -->
                            <div class="mt-4 md:mt-6 pt-3 md:pt-4 border-t border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-blue-800 text-base sm:text-lg">Vision</h3>
                                        <p class="text-sm sm:text-base text-gray-700 mt-1">
                                            Menjadi platform layanan e-commerce IT untuk membantu mahasiswa Indonesia.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Mission Block (with two points) -->
                            <div class="mt-4 md:mt-6 pt-3 md:pt-4 border-t border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-blue-800 text-base sm:text-lg">Mission</h3>
                                        <ul class="list-disc pl-4 sm:pl-5 text-gray-700 mt-1 space-y-1 text-sm sm:text-base">
                                            <li>Membangun wadah sebagai penyedia layanan produk dan jasa berbasis teknologi dengan solusi efektif.</li>
                                            <li>Memberikan kepuasan pelanggan melebihi ekspektasi.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Motto Block -->
                            <div class="mt-4 md:mt-6 pt-3 md:pt-4 border-t border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.982-3.172M5.25 4.236c-.982.143-1.954.487-2.86 1.03a45.03 45.03 0 014.417 6.262m-4.417-7.29a44.98 44.98 0 018.61 0m-8.61 0c.092.046.185.09.277.135M18.75 4.236c.982.143 1.954.487 2.86 1.03a45.04 45.04 0 01-4.417 6.262m4.417-7.292c-.092.046-.185.09-.277.135M12 6.75a3 3 0 00-3 3v2.25m6-5.25a3 3 0 013 3v2.25" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-blue-800 text-base sm:text-lg">Motto</h3>
                                        <p class="text-sm sm:text-base text-gray-700 italic mt-1">"Powering the Next Digital Generation."</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Since 2026 badge -->
                            <div class="mt-4 md:mt-6 pt-3 md:pt-4 border-t border-gray-200">
                                <div class="bg-blue-50 p-3 sm:p-4 rounded-lg border border-blue-100">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg">2026</div>
                                        <div>
                                            <p class="font-medium text-blue-800">Berdiri sejak 2026</p>
                                            <p class="text-xs text-gray-600">IT E-Commerce & Online Forum Discussion</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tiny extra highlight -->
                            <div class="text-xs text-blue-500 font-medium flex items-center gap-1 mt-4 pt-2">
                                <span class="inline-block w-2 h-2 bg-blue-400 rounded-full"></span>
                                © VEXORA – technology & community
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer (SAMA PERSIS) -->
        <div class="mt-8 sm:mt-10 md:mt-14 text-center text-gray-400 text-xs border-t border-gray-200 pt-4 sm:pt-5">
            <span class="bg-white px-3 sm:px-4 py-1 sm:py-1.5 rounded-full border border-gray-100">Who We Are · Vexora 2025</span>
        </div>
    </div>
</body>

</html>
