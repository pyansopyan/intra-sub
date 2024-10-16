<div class="p-6 bg-white rounded-lg shadow-md mt-4">
    <h2 class="text-2xl font-semibold mb-4">Detail Role: {{ $role->name }}</h2>

    <p class="font-semibold mb-2">Permissions:</p>
    <ul class="list-none p-0">
        @if ($role->permissions->isEmpty())
            <li class="flex items-center mb-2">
                <span class="mr-2 text-red-600">&#10007;</span>
                <span>No Permissions</span>
            </li>
        @else
            @foreach ($role->permissions as $permission)
                <li class="flex items-center mb-2">
                    <span class="mr-2 text-green-600">&#10003;</span>
                    <span>{{ $permission->name }}</span>
                </li>
            @endforeach
        @endif
    </ul>

    <a href="{{ route('role.index') }}" class="inline-block px-4 py-2 mt-4 bg-gray-600 text-white rounded hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300">
        Kembalii
    </a>
</div>
