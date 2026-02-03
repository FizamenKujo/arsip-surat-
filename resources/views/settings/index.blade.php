<x-app-layout>
    <x-slot name="header">Pengaturan</x-slot>

    <div class="space-y-6">
        <div class="bg-white p-4 sm:p-8 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Informasi Profil
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Perbarui informasi profil akun dan alamat email Anda.
                        </p>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="Auth::user()->name" disabled />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                :value="Auth::user()->email" disabled />
                        </div>
                        <p class="text-sm text-gray-500 italic">*Hubungi administrator untuk mengubah data profil.</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="bg-white p-4 sm:p-8 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Ganti Password
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Pastikan akun Anda menggunakan password yang aman.
                        </p>
                    </header>
                    <form method="post" action="#" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div>
                            <x-input-label for="current_password" :value="__('Password Saat Ini')" />
                            <x-text-input id="current_password" name="current_password" type="password"
                                class="mt-1 block w-full" autocomplete="current-password" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Password Baru')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                autocomplete="new-password" />
                        </div>
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password Baru')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>