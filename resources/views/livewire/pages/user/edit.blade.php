<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit User
    </h2>

    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input text-black"
                    placeholder="Masukkan nama user" wire:model="name" />
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">NRP</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input text-black"
                    placeholder="Masukkan NRP" wire:model="nrp" />
                @error('nrp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">E-mail</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input text-black"
                    placeholder="Masukkan E-mail" type="email" wire:model="email" />
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Status</span>
                <select wire:model="is_active"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray text-black">
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Non-aktif</option>
                </select>
                @error('is_active') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Avatar</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="file" wire:model="avatar" />
                @error('avatar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </label>

            <label for="role" class="block text-sm mt-4">Role</label>
            <select wire:model="role" id="role"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray text-black">
                <option value="">Pilih Role</option>
                <option value="superadmin">Super Admin</option>
                <option value="staff">Staff</option>
            </select>
            @error('role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input text-black"
                    type="password" wire:model="password" placeholder="Kosongkan jika tidak ingin mengubah password" />
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </label>
        </div>

        <a href="{{ route('user.index') }}" class="btn btn-md btn-success text-white"><< Kembali</a>
        <button type="submit" class="btn btn-md btn-primary">Ubah</button>
    </form>
</div>

