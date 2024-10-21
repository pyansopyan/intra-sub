<div class="max-w-md mx-auto p-6 shadow-md rounded-lg mt-4">
    <h2 class="text-2xl font-semibold mb-4 dark:text-gray-300 dark:focus:shadow-outline-gra">Edit Profile</h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex mb-4">
        <div class="w-1/3">
            @if ($avatar instanceof Livewire\TemporaryUploadedFile)
                <img src="{{ $avatar->temporaryUrl() }}" class="rounded-full h-32 w-32 object-cover" alt="Avatar">
            @else
                <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" class="rounded-full h-32 w-32 object-cover" alt="Avatar">
            @endif
        </div>
        <div class="w-2/3 pl-4">
            <input type="file" wire:model="avatar" class="mb-4 dark:text-gray-300 dark:focus:shadow-outline-gra">
            @error('avatar') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-400">Nama</label>
            <input type="text" wire:model="name"
                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm dark:text-gray-300 dark:focus:shadow-outline-gra" required>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-400">Email</label>
            <input type="email" wire:model="email"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gra" required>
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-400">Password (kosongkan jika tidak diubah)</label>
            <input type="password" wire:model="password"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gra">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center dark:text-gray-300 dark:focus:shadow-outline-gra">
                <input type="checkbox" wire:model="is_active" class="form-checkbox dark:border-gray-600 dark:bg-gray-700">
                <span class="ml-2">Aktif</span>
            </label>
            @error('is_active') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-md btn-primary text-white px-4 py-2 rounded">Save Changes</button>  <a href="{{ route('user.index') }}" class="btn btn-md btn-success text-white mt-4 justify-content-end"><< Back</a>
    </form>
</div>
