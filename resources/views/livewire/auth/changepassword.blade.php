<div class="max-w-md mx-auto p-6 mt-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Ganti Password</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updatePassword">
        <div class="mb-4">
            <label for="old_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
            <input type="password" id="old_password" wire:model.defer="old_password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('old_password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" id="new_password" wire:model.defer="new_password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('new_password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password
                Baru</label>
            <input type="password" id="new_password_confirmation" wire:model.defer="new_password_confirmation"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div class="flex justify-center">
            <a href="{{ route('login') }}" type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Ganti Password
            </a>
        </div>
    </form>
</div>
