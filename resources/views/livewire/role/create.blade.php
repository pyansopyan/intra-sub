<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Tambah Role</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Role Name:</label>
            <input type="text" id="name" name="name" wire:model="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Masukkan nama role...">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Permissions:</label>
            <div>
                @foreach ($permissions as $permission)
                    <div class="flex items-center mb-2">
                        <input type="checkbox"
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                               name="permission"
                               id="permission{{ $permission->id }}"
                               wire:model="Getpermissions"
                               value="{{ $permission->id }}">
                        <label class="ml-2 text-gray-700" for="permission{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
                Save
            </button>
            <a href="{{ route('role.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300">
                Back
            </a>
        </div>
    </form>
</div>
