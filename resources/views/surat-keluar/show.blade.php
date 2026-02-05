<x-app-layout>
    <x-slot name="header">Detail Surat Keluar</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $surat->perihal }}</h2>
                        <p class="text-sm text-gray-500 mt-1">No. Surat: <span class="font-mono text-gray-700 bg-gray-100 px-2 py-0.5 rounded">{{ $surat->no_surat }}</span></p>
                    </div>
                    <span class="px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">Surat Keluar</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tujuan Surat</h4>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                {{ substr($surat->tujuan, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium">{{ $surat->tujuan }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Informasi Tanggal</h4>
                        <p class="text-sm text-gray-600">Tanggal Surat: <span class="font-medium text-gray-900">{{ $surat->tanggal_surat }}</span></p>
                        <p class="text-sm text-gray-600 mt-1">Dibuat Pada: <span class="font-medium text-gray-900">{{ $surat->created_at->format('d M Y H:i') }}</span></p>
                    </div>
                </div>

                <div class="mb-8">
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Diinput Oleh</h4>
                    <div class="flex items-center gap-3">
                         <img class="h-8 w-8 rounded-full bg-gray-300" src="https://ui-avatars.com/api/?name={{ urlencode($surat->user->name) }}&background=random" alt="">
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $surat->user->name }}</p>
                            <p class="text-xs text-gray-500">{{ ucfirst($surat->user->role) }}</p>
                        </div>
                    </div>
                </div>

                @if($surat->file_path)
                    <div class="border rounded-xl overflow-hidden">
                        <div class="bg-gray-50 px-4 py-3 border-b flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700">Preview Dokumen</span>
                            <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Download / Buka Full</a>
                        </div>
                        <div class="bg-gray-200 aspect-[4/3] flex items-center justify-center">
                            @if(Str::endsWith($surat->file_path, '.pdf'))
                                <iframe src="{{ asset('storage/' . $surat->file_path) }}" class="w-full h-full"></iframe>
                            @else
                                <img src="{{ asset('storage/' . $surat->file_path) }}" class="object-contain max-h-full" alt="Surat Image">
                            @endif
                        </div>
                    </div>
                @else
                    <div class="p-4 bg-yellow-50 text-yellow-700 rounded-lg text-sm text-center">
                        Tidak ada file lampiran yang diupload untuk surat ini.
                    </div>
                @endif
            </div>

            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('surat-keluar.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50">Kembali</a>
                 <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="px-4 py-2 bg-yellow-400 text-yellow-900 border border-yellow-500 text-sm font-medium rounded-lg hover:bg-yellow-500">Edit Surat</a>
            </div>
        </div>
    </div>
</x-app-layout>