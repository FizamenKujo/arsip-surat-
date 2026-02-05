<x-app-layout>
    <x-slot name="header">Arsip Surat Masuk</x-slot>

    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <p class="text-gray-500">Kelola data surat masuk dan dokumen digital inspektorat.</p>
            <a href="{{ route('surat-masuk.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 shadow-lg shadow-blue-600/30 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                    </path>
                </svg>
                Scan/Upload PDF
            </a>
        </div>

            <!-- Search Only -->
            <form action="{{ route('surat-masuk.index') }}" method="GET" class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="pl-10 pr-4 py-2 border border-gray-200 bg-gray-50 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                    placeholder="Cari No. Surat, Instansi, atau Perihal...">
            </form>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase font-bold text-gray-500 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4">No. Surat</th>
                            <th class="px-6 py-4">Tgl Terima</th>
                            <th class="px-6 py-4">Asal Instansi</th>
                            <th class="px-6 py-4">Perihal</th>
                            <th class="px-6 py-4">Diinput Oleh</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($suratMasuk as $surat)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-bold text-blue-600">{{ $surat->no_surat }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $surat->tanggal_terima }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="w-6 h-6 rounded bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-500">
                                            {{ substr($surat->pengirim, 0, 1) }}
                                        </span>
                                        <span class="font-medium text-gray-900">{{ $surat->pengirim }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-900 max-w-xs truncate">{{ $surat->perihal }}</td>
                                <td class="px-6 py-4">
                                    <p class="text-xs font-bold text-gray-900">{{ $surat->user->name }}</p>
                                    <p class="text-[10px] uppercase text-gray-400">{{ $surat->user->role }}</p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('surat-masuk.show', $surat->id) }}"
                                            class="text-gray-400 hover:text-blue-600" title="Lihat">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                                            class="text-gray-400 hover:text-yellow-600" title="Edit">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-600" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada data surat masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $suratMasuk->links() }}
            </div>
        </div>
    </div>
</x-app-layout>