<div>
    <div class="mb-8 md:grid-cols-2 mt-4">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 flex flex-col">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Detail Role
            </h4>
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>ID:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Role Name:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Permissions:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center">
                                        @if ($role->hasPermissionTo($permission->name))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        @endif
                                        <span class="ml-2 text-sm text-gray-700">{{ $permission->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('role.index') }}" class="btn btn-md btn-success text-white mt-4 justify-content-end">
            << Back</a>
    </div>
</div>
