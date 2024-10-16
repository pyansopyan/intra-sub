<div>
    <a href="{{ route('role.create') }}" class="btn btn-md btn-success mt-3">TAMBAH ROLE!</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">PERMISSIONS</th>
                <th scope="col" class="text-center">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @if ($role->permissions->isEmpty())
                            <span class="badge bg-secondary">No Permissions</span>
                        @else
                            @foreach ($role->permissions as $permission)
                                <span class="badge text-white bg-primary">{{ $permission->name }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group flex justify-center space-x-2">
                            <a href="{{ route('role.show', $role->id) }}" class="flex items-center justify-center w-10 h-10 text-green-500 bg-green-100 rounded-full hover:bg-green-200" title="Show">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6 3 2 12 2 12s4 9 10 9 10-9 10-9-4-9-10-9zm0 12a3 3 0 110-6 3 3 0 010 6z" />
                                </svg>
                            </a>
                            <a href="{{ route('role.edit', $role->id) }}" class="flex items-center justify-center w-10 h-10 text-blue-500 bg-blue-100 rounded-full hover:bg-blue-200" title="Edit">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a1 1 0 00-1.415 0L7.5 11.5V14h2.5l6.318-6.318a1 1 0 000-1.415z" />
                                </svg>
                            </a>
                            <button wire:click="destroy({{ $role->id }})" class="flex items-center justify-center w-10 h-10 text-red-500 bg-red-100 rounded-full hover:bg-red-200"
                                    onclick="return confirm('Are you sure you want to delete this role?')" title="Delete">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </td>

            @endforeach
        </tbody>
    </table>
    {{ $roles->links() }}
</div>
