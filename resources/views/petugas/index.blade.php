<x-app-layout>
    <x-slot name="header">Manajemen Akun Petugas</x-slot>

    <div class="space-y-6">
        <p class="text-gray-500">Kelola data petugas (Member/Admin) dan hak akses sistem E-Arsip.</p>

        <!-- Form Input Cepat -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Form Input Cepat</h3>
            <p class="text-sm text-gray-500 mb-6">Masukkan NIP dan Nama Lengkap untuk mendaftarkan petugas baru.</p>

            <form action="{{ route('petugas.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-600 uppercase mb-2">NIP</label>
                    <input type="text" name="nip" class="w-full border-gray-200 rounded-lg bg-gray-50 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Contoh: 19850101..." required>
                </div>
                <div>
                     <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full border-gray-200 rounded-lg bg-gray-50 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Nama Petugas" required>
                </div>
                 <div>
                     <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Email</label>
                    <input type="email" name="email" class="w-full border-gray-200 rounded-lg bg-gray-50 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="email@instansi.com" required>
                </div>
                <div>
                     <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Password</label>
                    <input type="password" name="password" class="w-full border-gray-200 rounded-lg bg-gray-50 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Default: 123456" required>
                </div>
                <div class="md:col-span-4 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 transition">Simpan Data</button>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase font-bold text-gray-500">
                        <tr>
                            <th class="px-6 py-4">NIP</th>
                            <th class="px-6 py-4">Nama Lengkap</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($petugas as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $p->nip }}</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                    {{ substr($p->name, 0, 2) }}
                                </div>
                                {{ $p->name }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-medium border border-blue-100">
                                    Member
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-gray-400 hover:text-blue-600 mr-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                                <button class="text-gray-400 hover:text-red-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $petugas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
