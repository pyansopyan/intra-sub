<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Edit Role</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Role Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Permissions:</label>
            <div>
                @foreach ($permissions as $permission)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" wire:model="Getpermissions" value="{{ $permission->id }}" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label class="ml-2">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Update Role</button>
            <a href="{{ route('role.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300">Back</a>
        </div>
    </form>
</div>
