<div>
    <div class="flex justify-between items-center mb-4 mt-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Kanban Board - {{ $project->name ?? '' }}
        </h2>
        <a href="{{ route('board.index') }}" class="text-blue-600 text-sm">
            << Back to board</a>
    </div>
    <div class="flex items-center space-x-4 mb-4">
        <button wire:click="openCreateTaskModal" class="bg-blue-500 text-white p-2 rounded">+ Create Task</button>

        <div class="flex space-x-4 items-end">
            <div>
                <label for="types" class="form-label text-white">Types</label>
                <select class="form-select" wire:model="selectedType">
                    <option value="">Select Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="priorities" class="form-label text-white">Priorities</label>
                <select class="form-select" wire:model="selectedPriority">
                    <option value="">Select Priority</option>
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="responsibles" class="form-label text-white">Responsible</label>
                <select class="form-select" wire:model="selectedResponsible">
                    <option value="">Select Responsible</option>
                    @foreach ($responsibles as $responsible)
                        <option value="{{ $responsible->id }}">{{ $responsible->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-2">
                <button wire:click="filter" class="btn btn-primary">Filter</button>
                <button wire:click="resetFilters" class="btn btn-dark">Reset Filters</button>
            </div>
        </div>
    </div>


    <div class="flex space-x-4">
        @foreach ($statuses as $status)
            <div class="w-1/3 text-white p-4 rounded shadow-2xl" style="background-color: {{ $status->color }}"
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
                            <small class="text-gray-400 mt-2">
                                <i>{{ $task->updated_at->format('H:i') }}</i>
                            </small>
                        </div>
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
                        <select id="owner_id" wire:model="editedTask.owner_id" class="bg-gray-100 p-2 rounded w-full"
                            wire:keyup="updateTaskRealTime">
                            <option value="">Select Owner</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Responsible Dropdown -->
                    <div class="col-span-1">
                        <label for="responsible_id" class="block text-sm font-medium text-gray-700">Responsible</label>
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
