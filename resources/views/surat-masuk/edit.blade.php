<x-app-layout>
    <x-slot name="header">Edit Surat Masuk</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Edit Data Surat Masuk</h2>
            
            <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Surat</label>
                        <input type="text" name="no_surat" value="{{ old('no_surat', $surat->no_surat) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nomor Surat Resmi" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Terima</label>
                        <input type="date" name="tanggal_terima" value="{{ old('tanggal_terima', $surat->tanggal_terima) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Asal Instansi / Pengirim</label>
                        <input type="text" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nama Instansi Pengirim" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Perihal</label>
                        <textarea name="perihal" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Ringkasan isi surat..." required>{{ old('perihal', $surat->perihal) }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload File Surat (PDF/Gambar)</label>
                        @if($surat->file_path)
                            <div class="mb-2 text-sm text-gray-600">
                                File saat ini: <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
                            </div>
                        @endif
                        <div x-data="{ fileName: '' }" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span x-text="fileName ? 'Ganti file' : 'Upload file baru'"></span>
                                        <input id="file-upload" name="file" type="file" class="sr-only" @change="fileName = $event.target.files[0].name">
                                    </label>
                                    <p class="pl-1" x-show="!fileName">atau drag and drop</p>
                                </div>
                                <p class="text-sm text-gray-900 font-bold" x-text="fileName"></p>
                                <p class="text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah file (Max 5MB)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('surat-masuk.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 shadow-lg shadow-blue-600/30">Update Surat Masuk</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
