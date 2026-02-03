<x-app-layout>
    <x-slot name="header">Detail Surat Keluar</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-xl font-bold text-gray-900">Informasi Surat Keluar</h2>
                <div class="flex gap-2">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                        {{ ucfirst($surat->status ?? 'Draft') }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Nomor Surat</p>
                        <p class="text-lg font-bold text-gray-900">{{ $surat->no_surat }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Tujuan Instansi</p>
                        <div class="flex items-center gap-3">
                            <span
                                class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center text-green-600 font-bold">
                                {{ substr($surat->tujuan, 0, 1) }}
                            </span>
                            <p class="text-base text-gray-900">{{ $surat->tujuan }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Tanggal Surat</p>
                        <p class="text-base text-gray-900">
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }}</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Perihal</p>
                        <p class="text-base text-gray-900 leading-relaxed">{{ $surat->perihal }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Diinput Oleh</p>
                        <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-lg">
                            <div class="flex-1">
                                <p class="text-sm font-bold text-gray-900">{{ $surat->user->name }}</p>
                                <p class="text-xs text-gray-500">NIP. {{ $surat->user->nip }}</p>
                            </div>
                            <span class="px-2 py-1 bg-white rounded text-xs border border-gray-200 text-gray-500">
                                {{ $surat->user->role }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if($surat->file_path)
                <div class="mt-8 pt-8 border-t border-gray-100">
                    <p class="text-sm font-medium text-gray-500 mb-4">Dokumen Lampiran</p>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="p-3 bg-blue-100 text-blue-600 rounded-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l5.414 5.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-900">File Surat Keluar</p>
                            <p class="text-xs text-gray-500">Klik tombol di kanan untuk melihat atau mengunduh</p>
                        </div>
                        <a href="{{ Storage::url($surat->file_path) }}" target="_blank"
                            class="px-4 py-2 bg-white text-blue-600 text-sm font-medium rounded-lg border border-gray-200 hover:bg-blue-50 transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            Lihat File
                        </a>
                    </div>
                </div>
            @endif

            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                <a href="{{ route('surat-keluar.index') }}"
                    class="px-6 py-2.5 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>