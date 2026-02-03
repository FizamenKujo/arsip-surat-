<x-app-layout>
    <x-slot name="header">Edit Data Petugas</x-slot>

    <div class="max-w-xl mx-auto">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Edit Informasi Petugas</h2>
            
            <form action="{{ route('petugas.update', $petugas->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                     <label class="block text-sm font-medium text-gray-700 mb-2">NIP</label>
                    <input type="text" name="nip" value="{{ old('nip', $petugas->nip) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                 <div>
                     <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $petugas->name) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                 <div>
                     <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $petugas->email) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                     <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru (Opsional)</label>
                    <input type="password" name="password" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Biarkan kosong jika tidak ingin mengubah">
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('petugas.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 shadow-lg shadow-blue-600/30">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
