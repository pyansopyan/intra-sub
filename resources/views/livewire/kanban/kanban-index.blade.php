<div>
    <!-- Header -->
    <div class="flex justify-between items-center mb-4 mt-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Kanban Board - {{ $project->name ?? '' }}</h2>
        <a href="{{ route('board.index') }}" class="text-blue-600 text-sm"><< Back to board</a>
    </div>

    <!-- Filter and Create Task Row -->
    <div class="flex items-center space-x-4 mb-4">
        <!-- Button to create a new task -->
        <button wire:click="openCreateTaskModal" class="bg-blue-500 text-white p-2 rounded">+ Create Task</button>

        <!-- Filter Panel -->
        <div class="flex space-x-4 items-end">
            <!-- Ticket Types Filter -->
            <div>
                <label for="types" class="form-label text-white">Ticket Types</label>
                <select class="form-select" wire:model="types">
                    <option value="">Select an option</option>
                    <option value="bug">Bug</option>
                    <option value="feature">Feature</option>
                </select>
            </div>

            <!-- Ticket Priorities Filter -->
            <div>
                <label for="priorities" class="form-label text-white">Ticket Priorities</label>
                <select class="form-select" wire:model="priorities">
                    <option value="">Select an option</option>
                    <option value="high">High</option>
                    <option value="normal">Normal</option>
                    <option value="low">Low</option>
                </select>
            </div>

            <!-- Filter buttons -->
            <div class="flex space-x-2">
                <button wire:click="filter" class="bg-purple-500 text-white p-2 rounded">Filter</button>
                <button wire:click="resetFilters" class="bg-gray-500 text-white p-2 rounded">Reset Filters</button>
            </div>
        </div>
    </div>

    <!-- Kanban Board -->
    <div class="flex space-x-4">
        @foreach ($statuses as $status)
            <div class="w-1/3 text-white p-4 rounded shadow-2xl" style="background-color: {{ $status->color }}"
                 ondrop="drop(event, {{ $status->id }})" ondragover="allowDrop(event)">
                <h2 class="font-bold mb-2">{{ $status->name }}</h2>
                <div class="space-y-2">
                    @foreach ($status->tasks as $task)
                        <div class="bg-gray-800 p-2 rounded shadow-lg"
                             @if ($editingTaskId !== $task->id)
                                 draggable="true" ondragstart="drag(event, {{ $task->id }})"
                             @endif>
                            <span class="flex justify-between items-center">
                                <span class="space-x-4 flex mb-4">
                                    <span wire:click="editTask({{ $task->id }}, '{{ $task->name }}')" class="cursor-pointer">
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

    <!-- Editing Task Modal -->
    @if ($editingTaskId)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg w-1/2 relative">
            <h3 class="text-xl font-semibold">Edit Task</h3>
            <button wire:click="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Task fields (name, content, owner, etc.) -->
                <!-- (Repeat code for each field as in the original example) -->
            </div>
        </div>
    </div>
    @endif

    <!-- Creating Task Modal -->
    @if ($creatingTask)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg w-1/2 relative">
            <h3 class="text-xl font-semibold">Create Task</h3>
            <button wire:click="resetCreateTask" class="absolute top-2 right-2 text-xl text-gray-500 hover:text-gray-800">
                &times;
            </button>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Task fields for creating a new task -->
                <!-- (Repeat code for each field as in the original example) -->
            </div>
            <button wire:click="saveNewTask" class="bg-green-500 text-white p-2 rounded mt-4 w-full">Create Task</button>
        </div>
    </div>
    @endif
</div>

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
