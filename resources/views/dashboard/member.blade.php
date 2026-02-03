<x-app-layout>
    <x-slot name="header">Dashboard Petugas</x-slot>

    <div class="space-y-6">
        <h2 class="text-2xl font-bold text-gray-900">Selamat Datang, {{ explode(' ', Auth::user()->name)[0] }}!</h2>
        <p class="text-gray-500">Berikut adalah ringkasan aktivitas pengarsipan Anda bulan ini.</p>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                         <div class="p-3 bg-blue-100 rounded-xl text-blue-600 w-fit mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-gray-600">Surat Masuk Saya</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $my_surat_masuk }}</h3>
                    </div>
                     <span class="bg-green-100 text-green-600 text-xs font-bold px-2 py-1 rounded-full">↗ +12%</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="p-3 bg-purple-100 rounded-xl text-purple-600 w-fit mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-gray-600">Surat Keluar Saya</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $my_surat_keluar }}</h3>
                    </div>
                     <span class="bg-green-100 text-green-600 text-xs font-bold px-2 py-1 rounded-full">↗ +5%</span>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="p-3 bg-orange-100 rounded-xl text-orange-600 w-fit mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-gray-600">Menunggu Verifikasi</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">12</h3>
                    </div>
                </div>
            </div>

             <!-- Card 4 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="p-3 bg-green-100 rounded-xl text-green-600 w-fit mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-gray-600">Total Arsip Bulan Ini</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $total_arsip }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 rounded-3xl p-8 text-white relative overflow-hidden shadow-lg shadow-blue-600/20">
            <div class="relative z-10 max-w-2xl">
                <h2 class="text-3xl font-bold mb-4">Mulai Pekerjaan Anda</h2>
                <p class="mb-8 text-blue-50 opacity-90 leading-relaxed">Segera proses dokumen fisik menjadi digital atau catat surat keluar terbaru untuk menjaga integritas data arsip Inspektorat.</p>
                <div class="flex gap-4">
                    <a href="{{ route('surat-masuk.create') }}" class="px-6 py-3 bg-white text-blue-600 font-bold rounded-xl shadow-lg hover:bg-gray-50 transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                        Scan Surat Masuk
                    </a>
                    <a href="{{ route('surat-keluar.create') }}" class="px-6 py-3 bg-blue-500/30 text-white font-bold rounded-xl hover:bg-blue-500/40 transition border border-white/20 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        Input Surat Keluar
                    </a>
                </div>
            </div>
            <!-- Background Decoration -->
            <div class="absolute right-0 top-0 bottom-0 opacity-10 pattern-dots"></div>
        </div>
    </div>
</x-app-layout>
