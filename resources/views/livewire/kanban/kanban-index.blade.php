<div>
    <div class="flex justify-between items-center mb-4 mt-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Kanban Board - {{ $project->name ?? '' }}
        </h2>
        <a href="{{ route('board.index') }}" class="text-blue-600 text-sm">
            << Back to board</a>
    </div>

    {{-- Message --}}
    @if (session()->has('message'))
        <div class="toast toast-top toast-end mt-12 transform translate-x-full transition-transform duration-500 ease-out"
            x-data="{ show: true }" x-show="show" x-init="show = true;
            setTimeout(() => show = false, 5000)">
            <div class="flex flex-col gap-2 w-60 h-60 sm:w-72 text-[10px] sm:text-xs z-50 mt-6">
                <div
                    class="success-alert cursor-default flex items-center justify-between w-full h-12 sm:h-14 rounded-lg bg-gray-800 dark:bg-gray-900 px-[10px]">
                    <div class="flex gap-2">
                        <div class="text-green-500 bg-white/10 dark:bg-white/20 p-1 rounded-lg">
                            <i class='bx bx-check-circle text-3xl'></i>
                        </div>
                        <div>
                            <p class="text-white mt-3">{{ session('message') }}</p>
                        </div>
                    </div>
                    <button @click="show = false"
                        class="text-gray-400 hover:bg-white/5 p-1 rounded-md transition-colors ease-linear">
                        <i class='bx bx-x text-xl'></i>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="flex items-center space-x-4 mb-4">
        <button wire:click="openCreateTaskModal" class="bg-blue-500 text-white p-2 rounded">+ Create Task</button>
    </div>

    <div x-data="{ open: false }" class="relative w-full">
        <!-- Filters Button -->
        <button @click="open = !open" class="text-gray-600 text-sm bg-gray-100 p-2 px-4 rounded-md mb-3 w-full flex items-center justify-between border border-gray-300">
            <span class="flex items-center space-x-1 text-sm text-gray-400">
                <i class="bx bx-filter text-xl"></i> <!-- Ikon user -->
                <span>Filter</span> <!-- Teks nama user -->
            </span>
            <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <!-- Dropdown Menu for Filters -->
        <div x-show="open" x-transition.origin.top.duration.300ms class="mt-2 bg-white border border-gray-300 rounded-md shadow-lg w-full p-4" wire:ignore>
            <div class="flex flex-wrap gap-4">
                <!-- Owners / Responsibles Filter -->
                <div class="w-1/4">
                    <label class="block text-gray-600 text-sm mb-1">Owners / Responsibles</label>
                    <select class="bg-gray-100 p-2 rounded w-full border border-gray-300" wire:model.live="selectedResponsible">
                        <option value="">Select an option</option>
                        @foreach ($responsibles as $responsible)
                            <option value="{{ $responsible->id }}">{{ $responsible->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Ticket Types Filter -->
                <div class="w-1/4">
                    <label class="block text-gray-600 text-sm mb-1">Task types</label>
                    <select class="bg-gray-100 p-2 rounded w-full border border-gray-300" wire:model.live="selectedType">
                        <option value="">Select an option</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Task Priorities Filter -->
                <div class="w-1/4">
                    <label class="block text-gray-600 text-sm mb-1">Task priorities</label>
                    <select class="bg-gray-100 p-2 rounded w-full border border-gray-300" wire:model.live="selectedPriority">
                        <option value="">Select an option</option>
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Additional Filter Options -->
                <div class="w-1/4 flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600" wire:model.live="showOnlyNotAffected">
                </div>
            </div>

            <!-- Filter and Reset Buttons -->
            <div class="flex justify-end space-x-2 mt-4">
                <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded">Reset filters</button>
            </div>
        </div>
    </div>

    <div class="flex space-x-4">
        @foreach ($statuses as $status)
            <div class="w-1/3 text-white p-4 mt-4 rounded shadow-2xl" style="background-color: {{ $status->color }}"
                ondrop="drop(event, {{ $status->id }})" ondragover="allowDrop(event)">
                <h2 class="font-bold mb-2">{{ $status->name }}</h2>
                <div class="space-y-2">
                    @foreach ($status->tasks as $task)
                        <div class="bg-gray-800 p-2 rounded shadow-lg"
                            @if ($editingTaskId !== $task->id) draggable="true" ondragstart="drag(event, {{ $task->id }})" @endif>
                            <span class="flex justify-between items-center">
                                <span class="space-x-4 flex mb-4">
                                    <span wire:click="editTask({{ $task->id }}, '{{ $task->name }}')"
                                        class="cursor-pointer">
                                        {{ $task->name }}
                                    </span>
                                </span>
                            </span>
                            <span class="flex items-center space-x-1 text-sm text-gray-400">
                                <i class="bx bx-user-circle text-lg"></i> <!-- Ikon user -->
                                <span>{{ $task->responsible->name }}</span> <!-- Teks nama user -->
                            </span>
                            <div class="flex justify-between items-center">
                                <span class="flex items-center space-x-1 text-sm text-gray-400">
                                    <i class="bx bx-calendar text-lg"></i> <!-- Ikon user -->
                                    <span>{{ $task->updated_at->format('M d') }}</span> <!-- Teks nama user -->
                                </span>
                                <button onclick="my_modal_{{ $task->id }}.showModal()" class="flex items-center"
                                    title="Delete">
                                    <i class='bx bx-trash text-xl text-red-500'></i>
                                </button>
                            </div>

                        </div>
                        <dialog id="my_modal_{{ $task->id }}"
                            class="modal fixed inset-0 flex items-center justify-center">
                            <div class="modal-box bg-white text-gray-800 dark:bg-gray-800 dark:text-white p-4 md:p-5">
                                <svg class="mx-auto mb-4 text-black-400 w-20 h-20 dark:text-black-200"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="text-lg font-bold">Apakah anda mau menghapus task ini?</h3>
                                <div class="modal-action">
                                    <button
                                        class="btn bg-red-500 text-white hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 border-none"
                                        wire:click="destroy({{ $task->id }})">
                                        Hapus
                                    </button>
                                    <button class="btn hover:bg-gray-900 dark:bg-gray-700 dark:text-white"
                                        onclick="my_modal_{{ $task->id }}.close()">
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </dialog>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>


    @if ($editingTaskId)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg w-1/2 relative">
                <h3 class="text-xl font-semibold">Edit Task</h3>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <button wire:click="closeModal"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <!-- Task Name -->
                    <div class="col-span-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Task Name</label>
                        <input id="name" type="text" wire:model="editedTask.name" placeholder="Enter task name"
                            class="bg-gray-100 p-2 rounded w-full" wire:keyup="updateTaskRealTime" />
                    </div>

                    <!-- Content -->
                    <div class="col-span-1">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="content" wire:model="editedTask.content" placeholder="Enter task content"
                            class="bg-gray-100 p-2 rounded w-full" wire:keyup="updateTaskRealTime"></textarea>
                    </div>

                    <!-- Owner Dropdown -->
                    <div class="col-span-1">
                        <label for="owner_id" class="block text-sm font-medium text-gray-700">Owner</label>
                        <select id="owner_id" wire:model="editedTask.owner_id"
                            class="bg-gray-100 p-2 rounded w-full" wire:keyup="updateTaskRealTime">
                            <option value="">Select Owner</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Responsible Dropdown -->
                    <div class="col-span-1">
                        <label for="responsible_id"
                            class="block text-sm font-medium text-gray-700">Responsible</label>
                        <select id="responsible_id" wire:model="editedTask.responsible_id"
                            class="bg-gray-100 p-2 rounded w-full" wire:keyup="updateTaskRealTime">
                            <option value="">Select Responsible</option>
                            @foreach ($responsibles as $responsible)
                                <option value="{{ $responsible->id }}">{{ $responsible->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Type Dropdown -->
                    <div class="col-span-1">
                        <label for="type_id" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="type_id" wire:model="editedTask.type_id" class="bg-gray-100 p-2 rounded w-full"
                            wire:keyup="updateTaskRealTime">
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Priority Dropdown -->
                    <div class="col-span-1">
                        <label for="priority_id" class="block text-sm font-medium text-gray-700">Priority</label>
                        <select id="priority_id" wire:model="editedTask.priority_id"
                            class="bg-gray-100 p-2 rounded w-full" wire:keyup="updateTaskRealTime">
                            <option value="">Select Priority</option>
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Code -->
                    <div class="col-span-1">
                        <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                        <input id="code" type="text" wire:model="editedTask.code" placeholder="Enter Code"
                            class="bg-gray-100 p-2 rounded w-full" wire:keyup="updateTaskRealTime" />
                    </div>

                    <!-- Order -->
                    <div class="col-span-1">
                        <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                        <input id="order" type="number" wire:model="editedTask.order" placeholder="Enter Order"
                            class="bg-gray-100 p-2 rounded w-full" wire:keyup="updateTaskRealTime" />
                    </div>

                    <!-- Estimation -->
                    <div class="col-span-1">
                        <label for="estimation" class="block text-sm font-medium text-gray-700">Estimation</label>
                        <input id="estimation" type="number" wire:model="editedTask.estimation"
                            placeholder="Enter Estimation" class="bg-gray-100 p-2 rounded w-full"
                            wire:keyup="updateTaskRealTime" />
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- Modal for Creating Task -->
    @if ($creatingTask)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg w-1/2 relative">
                <button wire:click="resetCreateTask"
                    class="absolute top-2 right-2 text-xl text-gray-500 hover:text-gray-800">
                    &times;
                </button>
                <h3 class="text-xl font-semibold">Create Task</h3>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Task Name -->
                    <div class="col-span-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Task Name</label>
                        <input id="name" type="text" wire:model="newTask.name" placeholder="Enter task name"
                            class="bg-gray-100 p-2 rounded w-full" />
                    </div>

                    <!-- Content -->
                    <div class="col-span-1">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="content" wire:model="newTask.content" placeholder="Enter task content"
                            class="bg-gray-100 p-2 rounded w-full"></textarea>
                    </div>

                    <!-- Owner Dropdown -->
                    <div class="col-span-1">
                        <label for="owner_id" class="block text-sm font-medium text-gray-700">Owner</label>
                        <select id="owner_id" wire:model="newTask.owner_id" class="bg-gray-100 p-2 rounded w-full">
                            <option value="">Select Owner</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <!-- Responsible Dropdown -->
                    <div class="col-span-1">
                        <label for="responsible_id"
                            class="block text-sm font-medium text-gray-700">Responsible</label>
                        <select id="responsible_id" wire:model="newTask.responsible_id"
                            class="bg-gray-100 p-2 rounded w-full">
                            <option value="">Select Responsible</option>
                            @foreach ($responsibles as $responsible)
                                <option value="{{ $responsible->id }}">{{ $responsible->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Type Dropdown -->
                    <div class="col-span-1">
                        <label for="type_id" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="type_id" wire:model="newTask.type_id" class="bg-gray-100 p-2 rounded w-full">
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-1">
                        <label for="priority_id" class="block text-sm font-medium text-gray-700">Priority</label>
                        <select id="priority_id" wire:model="newTask.priority_id"
                            class="bg-gray-100 p-2 rounded w-full">
                            <option value="">Select Priority</option>
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Code -->
                    <div class="col-span-1">
                        <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                        <input id="code" type="text" wire:model="newTask.code" placeholder="Enter Code"
                            class="bg-gray-100 p-2 rounded w-full" />
                    </div>

                    <!-- Order -->
                    <div class="col-span-1">
                        <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                        <input id="order" type="number" wire:model="newTask.order" placeholder="Enter Order"
                            class="bg-gray-100 p-2 rounded w-full" />
                    </div>

                    <!-- Estimation -->
                    <div class="col-span-1">
                        <label for="estimation" class="block text-sm font-medium text-gray-700">Estimation</label>
                        <input id="estimation" type="number" wire:model="newTask.estimation"
                            placeholder="Enter Estimation" class="bg-gray-100 p-2 rounded w-full" />
                    </div>

                    <button wire:click="saveNewTask" class="bg-green-500 text-white p-2 rounded mt-4 w-full">Create
                        Task</button>
                </div>
            </div>
        </div>
    @endif



    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev, taskId) {
            if (!@this.get('editingTaskId')) {
                ev.dataTransfer.setData("taskId", taskId);
            }
        }

        function drop(ev, newStatusId) {
            ev.preventDefault();
            var taskId = ev.dataTransfer.getData("taskId");
            @this.updateTaskStatus(taskId, newStatusId);
        }
    </script>
