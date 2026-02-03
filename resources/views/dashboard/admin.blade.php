<x-app-layout>
    <x-slot name="header">Dashboard Overview</x-slot>

    <div class="space-y-6">
        <h2 class="text-2xl font-bold text-gray-900">Statistik NIP Anda</h2>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-blue-600">Surat Diinput Saya</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $total_surat_masuk ?? 145 }}</h3>
                        <p class="text-xs text-green-500 mt-1 flex items-center font-semibold">
                            <span class="bg-green-100 rounded px-1 py-0.5 mr-1">↗ +12%</span> Bulan ini
                        </p>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                 <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-purple-600">Total Surat Masuk</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $total_surat_masuk }}</h3>
                        <p class="text-xs text-green-500 mt-1 flex items-center font-semibold">
                            <span class="bg-green-100 rounded px-1 py-0.5 mr-1">↗ +5%</span> Semua Arsip
                        </p>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-xl text-purple-600">
                         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                 <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-orange-600">Total Surat Keluar</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $total_surat_keluar }}</h3>
                         <p class="text-xs text-green-500 mt-1 flex items-center font-semibold">
                            <span class="bg-green-100 rounded px-1 py-0.5 mr-1">↗ +8%</span> Semua Arsip
                        </p>
                    </div>
                    <div class="p-3 bg-orange-50 rounded-xl text-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                 <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-teal-600">Petugas Aktif</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $total_petugas }}</h3>
                        <p class="text-xs text-green-500 mt-1 flex items-center font-semibold">
                            <span class="bg-green-100 rounded px-1 py-0.5 mr-1">↗ +2</span> Hari ini
                        </p>
                    </div>
                    <div class="p-3 bg-teal-50 rounded-xl text-teal-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Chart Section -->
            <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Aktivitas Bulanan</h3>
                    <select class="text-sm border-gray-300 rounded-lg text-gray-600 bg-gray-50">
                        <option>Tahun Ini</option>
                    </select>
                </div>
                
                <div class="h-64 flex items-end justify-between gap-2 px-2">
                    <!-- Placeholder Bars -->
                    @foreach(['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] as $month)
                        <div class="flex flex-col items-center gap-2 group w-full">
                            <div class="w-full bg-blue-100 rounded-t-lg relative group-hover:bg-blue-200 transition-all duration-300" style="height: {{ rand(30, 90) }}%">
                                @if($month == 'Apr')
                                    <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded shadow opacity-100 z-10">
                                        Apr: 85
                                    </div>
                                     <div class="absolute inset-x-0 bottom-0 top-0 bg-blue-600 rounded-t-lg"></div>
                                @endif
                            </div>
                            <span class="text-xs text-gray-500 {{ $month == 'Apr' ? 'font-bold text-blue-600' : '' }}">{{ $month }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Users -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Petugas Teraktif</h3>
                    <a href="#" class="text-sm text-blue-600 font-medium">Lihat Semua</a>
                </div>
                <div class="space-y-6">
                    @foreach($recent_users as $user)
                    <div class="flex items-center justify-between">
                         <div class="flex items-center gap-3">
                             <img class="w-10 h-10 rounded-full bg-gray-200" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" alt="">
                             <div>
                                 <p class="text-sm font-bold text-gray-900">NIP. {{ substr($user->nip, 0, 8) }}...</p>
                                 <p class="text-xs text-gray-500">{{ $user->name }}</p>
                             </div>
                         </div>
                         <div class="text-right">
                             <p class="text-sm font-bold text-green-600">{{ rand(10, 100) }}</p>
                             <p class="text-[10px] text-gray-400 uppercase">Input</p>
                         </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
