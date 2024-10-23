<div class="container mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Role
        @can('manageRole-create')
            <a href="{{ route('role.create') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + Tambah Data
            </a>
        @endcan
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Permissions</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($roles as $role)
                    <tr>
                        <td class="px-4 py-3">{{ $role->name }}</td>
                        <td class="px-4 py-3">
                            @if ($role->permissions->isEmpty())
                                <span class="badge bg-secondary">No Permissions</span>
                            @else
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge text-white bg-primary px-2 py-1 rounded">{{ $permission->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center space-x-4 text-sm">
                                @can('manageRole-edit')
                                    <a href="{{ route('role.edit', $role->id) }}"
                                        class="flex items-center justify-center w-10 h-10 text-blue-500 bg-blue-100 rounded-full hover:bg-blue-200"
                                        title="Edit">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a1 1 0 00-1.415 0L7.5 11.5V14h2.5l6.318-6.318a1 1 0 000-1.415z" />
                                        </svg>
                                    </a>
                                @endcan
                                @can('manageRole-view')
                                    <a href="{{ route('role.show', $role->id) }}"
                                        class="flex items-center justify-center w-10 h-10 text-green-500 bg-green-100 rounded-full hover:bg-green-200"
                                        title="Show">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6 3 2 12 2 12s4 9 10 9 10-9 10-9-4-9-10-9zm0 12a3 3 0 110-6 3 3 0 010 6z" />
                                        </svg>
                                    </a>
                                @endcan
                                @can('manageRole-delete')
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="flex items-center justify-center w-10 h-10 text-red-500 bg-red-100 rounded-full hover:bg-red-200"
                                            title="Delete" onclick="confirmDelete({{ $role->id }})" <!-- Panggil fungsi
                                            JavaScript -->
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    @endcan

                                    <!-- Modal Konfirmasi -->
                                    <div id="popup-modal" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Are you sure you want to delete this user?</h3>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                                        id="confirmDeleteBtn" <!-- Tambahkan ID untuk tombol konfirmasi
                                                        -->
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                        cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- paginate --}}
        {{ $roles->links() }}

    </div>
    <script>
        function confirmDelete(RoleId) {
            // Tampilkan modal konfirmasi
            const modal = document.getElementById('popup-modal');
            modal.classList.remove('hidden');

            // Tambahkan event listener ke tombol konfirmasi
            const confirmBtn = document.getElementById('confirmDeleteBtn');
            confirmBtn.onclick = function() {
                @this.destroy(RoleId); // Panggil metode destroy di Livewire dengan ID user
                modal.classList.add('hidden'); // Sembunyikan modal setelah menghapus
            }
        }
    </script>
</div>
