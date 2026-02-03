<x-app-layout>
    <x-slot name="header">Arsip Surat Keluar</x-slot>

    <div class="space-y-6">
         <div class="flex justify-between items-center">
            <p class="text-gray-500">Kelola dan pantau data surat keluar digital inspektorat.</p>
            <a href="{{ route('surat-keluar.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 shadow-lg shadow-blue-600/30 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Input Surat Keluar Baru
            </a>
        </div>

         <!-- Filter same as Masuk -->
        <div class="bg-white p-4 rounded-xl border border-gray-100 flex gap-4">
             <div class="relative flex-1">
                 <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" class="pl-10 pr-4 py-2 border border-gray-200 bg-gray-50 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-full" placeholder="Cari No. Surat, Tujuan, atau Perihal...">
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
             <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase font-bold text-gray-500 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4">No. Surat</th>
                            <th class="px-6 py-4">Tgl Surat</th>
                            <th class="px-6 py-4">Tujuan Instansi</th>
                            <th class="px-6 py-4">Perihal</th>
                            <th class="px-6 py-4">Petugas (NIP)</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($suratKeluar as $surat)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-900">{{ $surat->no_surat }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $surat->tanggal_surat }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold">
                                    {{ $surat->tujuan }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-900 max-w-xs truncate">{{ $surat->perihal }}</td>
                            <td class="px-6 py-4">
                                <p class="text-xs font-bold text-gray-900">{{ $surat->user->nip }}</p>
                                <p class="text-[10px] uppercase text-gray-400">Input</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-400 hover:text-blue-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada data surat keluar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
             <div class="px-6 py-4 border-t border-gray-100">
                {{ $suratKeluar->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
