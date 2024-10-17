<div class="container mx-auto mt-8">
    @can('manageJabatan')
    <a href="{{ route('jabatan.create') }}"
        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow mt-4 inline-block">
        Tambah Jabatan
    </a>
    @endcan

    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($jabatan as $jabatan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $jabatan->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            @can('manageJabatan-view')
                            <a href="{{ route('jabatan.show', $jabatan->id) }}"
                                class="flex items-center justify-center w-10 h-10 text-green-500 bg-green-100 rounded-full hover:bg-green-200"
                                title="Show">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3C6 3 2 12 2 12s4 9 10 9 10-9 10-9-4-9-10-9zm0 12a3 3 0 110-6 3 3 0 010 6z" />
                                </svg>
                            </a>
                            @endcan
                            @can('manageJabatan-edit')
                            <a href="{{ route('jabatan.edit', $jabatan->id) }}"
                                class="flex items-center justify-center w-10 h-10 text-blue-500 bg-blue-100 rounded-full hover:bg-blue-200"
                                title="Edit">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232a1 1 0 00-1.415 0L7.5 11.5V14h2.5l6.318-6.318a1 1 0 000-1.415z" />
                                </svg>
                            </a>
                            @endcan

                            @can('manageJabatan-edit')
                            <button wire:click='destroy({{ $jabatan->id }})'
                                class="flex items-center justify-center w-10 h-10 text-red-500 bg-red-100 rounded-full hover:bg-red-200"
                                onclick="return confirm('Are you sure you want to delete this user?')" title="Delete">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
