<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Bagian
        @can('manageBagian-create')
        <a href="{{ route('bagian.create') }}"
            class="px-4 py-2 text-sm font-medium justify-end leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            + Add Data
        </a>
        @endcan
    </h2>

    {{-- Message --}}
     @if (session()->has('message'))
        <div class="mb-4 text-sm text-green-600 bg-green-100 rounded-lg p-4" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Bagian</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($bagians as $bagian)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $bagian->name }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    @can('manageBagian-edit')
                                    <a href="{{ route('bagian.edit', $bagian->id) }}"
                                        class="flex items-center justify-center w-10 h-10 text-blue-500 bg-blue-100 rounded-full hover:bg-blue-200"
                                        title="Edit">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232a1 1 0 00-1.415 0L7.5 11.5V14h2.5l6.318-6.318a1 1 0 000-1.415z" />
                                        </svg>
                                    </a>
                                    @endcan
                                    @can('manageBagian-view')
                                    <a href="{{ route('bagian.show', $bagian->id) }}"
                                        class="flex items-center justify-center w-10 h-10 text-green-500 bg-green-100 rounded-full hover:bg-green-200"
                                        title="Show">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 3C6 3 2 12 2 12s4 9 10 9 10-9 10-9-4-9-10-9zm0 12a3 3 0 110-6 3 3 0 010 6z" />
                                        </svg>
                                    </a>
                                    @endcan
                                   @can('manageBagian-delete')
                                        <button onclick="my_modal_{{ $bagian->id }}.showModal()"
                                            class="flex items-center justify-center w-10 h-10 text-red-500 bg-red-100 rounded-full hover:bg-red-200"
                                            title="Delete">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    @endcan

                                   <!-- DaisyUI Modal Confirmation -->
                                   <dialog id="my_modal_{{ $bagian->id }}"
                                    class="modal fixed inset-0 flex items-center justify-center">
                                    <div
                                        class="modal-box bg-white text-gray-800 dark:bg-gray-800 dark:text-white p-4 md:p-5">
                                        <svg class="mx-auto mb-4 text-gray-400 w-20 h-20 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor 24 24" stroke="currentColor">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="text-lg font-bold">Apakah anda mau menghapus type ini</h3>
                                        <div class="modal-action">
                                            <button
                                                class="btn bg-red-500 text-white hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 border-none"
                                                wire:click="destroy({{ $bagian->id }})">
                                                Hapus
                                            </button>
                                            <button class="btn hover:bg-gray-900 dark:bg-gray-700 dark:text-white"
                                                onclick="my_modal_{{ $bagian->id }}.close()">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                </dialog>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- paginate --}}
        {{ $bagians->links() }}

    </div>
