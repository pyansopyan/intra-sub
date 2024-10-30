<div class="p-6 shadow-md rounded-lg mt-4">
    <h2 class="text-2xl font-semibold mb-4 dark:text-gray-300 dark:focus:shadow-outline-gray text-black">Edit Profile
    </h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex mb-4">
        <div class="flex justify-center mb-4">
            @if ($currentAvatar)
                <img src="{{ asset('storage/avatars/' . $currentAvatar) }}" alt="current avatar" class="h-60 w-30 rounded-full border-2 border-black-500/50">
            @else
                <p class="text-gray-700 dark:text-gray-400">No avatar</p>
            @endif
        </div>
        <div class="w-2/3 pl-4">
            <input type="file" wire:model="avatar"
                class="mb-4 dark:text-gray-300 dark:focus:shadow-outline-gray text-black max-w-xs overflow-hidden text-ellipsis whitespace-nowrap">
            <br>
            @error('avatar')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-400">Nama</label>
            <input type="text" wire:model="name"
                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm dark:text-gray-300 dark:focus:shadow-outline-gray text-black"
                required>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-400">Email</label>
            <input type="email" wire:model="email"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray text-black"
                required>
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <small><i>*jika password lupa, lapor kepada admin intra-sub</i></small>
        </div>
        <button type="submit"
            class="btn btn-md btn-primary text-black hover:text-white dark:text-white px-4 py-2 rounded">Save
            Changes</button> <a href="{{ route('welcome') }}"
            class="btn btn-md btn-success text-white mt-4 justify-content-end">
            << Back</a>
    </form>
</div>
