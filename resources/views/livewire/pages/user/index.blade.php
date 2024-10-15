<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Users
    </h2>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Nrp</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Role</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($users as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $user->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->nrp }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if ($user->is_active == true)
                                    Aktif
                                @else
                                    Tidak Aktif
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">

                                @if ($user->getRoleNames())
                                    {{ $user->getRoleNames()[0] }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- paginate --}}
        {{ $users->links() }}

    </div>
</div>
