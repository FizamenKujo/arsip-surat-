<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Arsip Deli Serdang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="antialiased bg-gray-50">
    <div class="relative min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-600 p-1.5 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900 tracking-tight">E-Arsip Deli Serdang</span>
                    </div>
                    <div class="flex items-center gap-6 text-sm font-medium text-gray-600">
                        <a href="#" class="hover:text-blue-600 transition">Beranda</a>
                        <a href="#" class="hover:text-blue-600 transition">Tentang Kami</a>
                        <a href="{{ route('login') }}" class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-600/30">Login Pegawai</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-sm font-semibold">
                            <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                            Portal Resmi Inspektorat Kab. Deli Serdang
                        </div>
                        <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 leading-tight">
                            Sistem Informasi <span class="text-blue-600">E-Arsip</span> Surat Digital
                        </h1>
                        <p class="text-lg text-gray-600 leading-relaxed max-w-lg">
                            Kelola arsip surat di lingkungan Kabupaten Deli Serdang secara efisien, aman, dan mudah diakses. Solusi digital terintegrasi untuk administrasi pemerintahan yang transparan.
                        </p>
                        <div class="flex gap-4">
                            <a href="{{ route('login') }}" class="px-8 py-4 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/30 flex items-center gap-2">
                                Login Pegawai
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                            <a href="#" class="px-8 py-4 bg-white text-gray-700 font-semibold rounded-xl border border-gray-200 hover:bg-gray-50 transition">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                    <div class="relative">
                        <!-- Placeholder for Hero Image -->
                        <div class="rounded-3xl overflow-hidden shadow-2xl relative bg-gray-900 border-8 border-white">
                            <img src="https://source.unsplash.com/random/800x600/?meeting,office" alt="Hero Image" class="w-full h-full object-cover opacity-80">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>
                        </div>
                        
                        <!-- Floating Cards Stats -->
                        <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl max-w-xs border border-gray-100 hidden lg:block">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-blue-100 text-blue-600 rounded-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 text-lg">100% Aman</h3>
                                    <p class="text-sm text-gray-500">Terenskripsi & Terjaga</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="bg-gray-50 py-24 border-t border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Fitur Unggulan</span>
                        <h2 class="mt-2 text-3xl font-bold text-gray-900">Transformasi Digital Kearsipan</h2>
                        <p class="mt-4 max-w-2xl mx-auto text-gray-500">Layanan E-Arsip Inspectorat Kabupaten Deli Serdang hadir dengan fitur modern untuk mendukung kinerja aparatur.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Digitalisasi Dokumen</h3>
                            <p class="text-gray-500 leading-relaxed">Konversi dokumen fisik menjadi Secure PDF yang aman. Memastikan integritas data arsip terjaga.</p>
                        </div>
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.2-2.85.5-4m1.5 8l.495-.495C5.722 17.65 6.472 16.91 6.666 16.126A4 4 0 0110 12a4 4 0 014 4c0 .926.356 1.756.972 2.396.619.64 1.503 1.028 2.478 1.028.975 0 1.859-.388 2.478-1.028C20.644 13.756 21 12.926 21 12s-.356-1.756-.972-2.396A3.996 3.996 0 0116.522 9.5"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Autentikasi NIP</h3>
                            <p class="text-gray-500 leading-relaxed">Sistem login yang aman menggunakan Nomor Induk Pegawai (NIP), menjamin akses hanya pada personil berwenang.</p>
                        </div>
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Pencarian Cepat</h3>
                            <p class="text-gray-500 leading-relaxed">Teknologi Fast Retrieval memungkinkan penemuan arsip dalam hitungan detik berdasarkan metadatanya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
