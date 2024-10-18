<div>
    <div class="mb-8 md:grid-cols-2 mt-4">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 flex flex-col">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Detail Bagian
            </h4>
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>ID:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $bagian->id }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Nama Bagian:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $bagian->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('bagian.index') }}" class="btn btn-md btn-success text-white mt-4 justify-content-end"><< Kembali</a>
    </div>
</div>
