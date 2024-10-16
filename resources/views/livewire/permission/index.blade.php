<div class="container mx-auto mt-8">
    <a href="{{ route('permission.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow mt-4 inline-block">
        Tambah Permission
    </a>

    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($permissions as $permission)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $permission->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('permission.show', $permission->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded shadow mt-10">
                            Detail
                        </a>
                        <a href="{{ route('permission.edit', $permission->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded shadow">
                            Edit
                        </a>
                        <a href="{{ route('permission.index', $permission->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded shadow">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
