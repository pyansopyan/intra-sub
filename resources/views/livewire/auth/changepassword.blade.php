<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="img/logo-intra-new.svg" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Ganti Password</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form wire:submit.prevent="updatePassword" class="space-y-6">
            @csrf

            @if (session()->has('message'))
                <div class="mb-4 text-green-500">
                    {{ session('message') }}
                </div>
            @endif

            <div>
                <label for="old_password" class="block text-sm font-medium text-gray-900">Password Lama</label>
                <div class="mt-2 relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Ganti dengan ikon dari BoxIcons -->
                        <box-icon name='lock-alt' class="h-5 w-5 text-gray-400"></box-icon>
                    </div>
                    <input id="old_password" name="old_password" type="password" placeholder="Masukkan Password Lama" wire:model.defer="old_password" required class="block w-full pl-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('old_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="new_password" class="block text-sm font-medium text-gray-900">Password Baru</label>
                <div class="mt-2 relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Ikon baru untuk Password Baru: Key -->
                        <box-icon name='key' class="h-5 w-5 text-gray-400"></box-icon>
                    </div>
                    <input id="new_password" name="new_password" type="password" placeholder="Masukkan Password Baru" wire:model.defer="new_password" required class="block w-full pl-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('new_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-900">Konfirmasi Password Baru</label>
                <div class="mt-2 relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Ikon untuk Konfirmasi Password Baru -->
                        <box-icon name='lock-open-alt' class="h-5 w-5 text-gray-400"></box-icon>
                    </div>
                    <input id="new_password_confirmation" name="new_password_confirmation" type="password" placeholder="Konfirmasi Password Baru" wire:model.defer="new_password_confirmation" required class="block w-full pl-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>


            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Ganti Password
                </button>
            </div>
        </form>
    </div>
</div>
