<div>
<div x-data="{ open: false }">
    <!-- Breadcrumbs and Back Button -->
    <div class="breadcrumbs text-sm mt-4">
        <ul>
            <li><a href="{{ route('welcome') }}">Dashboard</a></li>
            <li><a href="{{ route('project.index') }}">Project</a></li>
            <li><a class="text-gray-400 font-semibold">Detail data Project</a></li>
        </ul>
    </div>
    <a href="{{ route('project.index') }}" class="btn btn-md bg-white text-black mt-2">
        <i class="bx bx-arrow-back text-xl"></i>
    </a>

    <!-- Project Details Section -->
    <div class="mb-8 md:grid-cols-2 mt-4">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 flex flex-col">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Detail User
            </h4>
            <div class="flex justify-center mb-4">
                @if ($project->cover_image)
                    <!-- Main image with modal trigger (responsive size) -->
                    <img src="{{ asset('storage/projects/' . $project->cover_image) }}" alt="cover" class="rounded-lg cursor-pointer hover:shadow-lg transition-shadow max-h-80 w-auto" @click="open = true" />
                @else
                    <p class="text-gray-700 dark:text-gray-400">Tidak ada Cover</p>
                @endif
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Name:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Description:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $project->description }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Ticket Prefix</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $project->ticket_prefix }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Owner:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $project->owner->name ?? 'Tidak ada owner' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Status:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ $project->status->name ?? 'Tidak ada status' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Enlarged Image Display -->
    <div x-show="open" x-transition.opacity class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-64 z-64">
        <div class="bg-white p-4 rounded-lg shadow-lg relative max-w-4xl mx-auto">
            <!-- Close (X) Button -->
            <button @click="open = false" class="absolute top-5 right-5 text-gray-500 hover:text-gray-700 text-xl font-bold">
                &times;
            </button>

            <!-- Display the larger image in the modal -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/projects/' . $project->cover_image) }}" alt="cover" class="rounded-lg max-w-full max-h-screen" />
            </div>
        </div>
    </div>
</div>
    <!-- Detail Attach User Section -->
    <div class="mb-8 md:grid-cols-2 mt-4">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 flex flex-col">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Pilih User dan Project
        </h4>

        <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-white-700 dark:divide-white-600">
                <!-- User Selection -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                        <strong>User:</strong>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                        <select id="user" name="user_id" wire:model="user_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-white-700 dark:text-black-300">
                            <option value="">Attach User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}" {{ $user->user_id == $user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            <strong>Project:</strong>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                            {{ optional($project->firstWhere('id', $projectId))->name ?? 'Tidak ada project' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        {{-- </div>
        <a href="{{ route('attach-user.index') }}" class="btn btn-md btn-success text-white mt-4 justify-content-end"><< Back</a>
    </div> --}}
</div>
