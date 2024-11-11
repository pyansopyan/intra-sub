<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mt-4">Kanban Board</h2>
        <a href="{{ route('board.index') }}" class="text-blue-600 text-sm mt-4"><< Back to board</a>
        <!-- Button to Open Create Task Modal -->
        <button wire:click="openCreateTaskModal" class="bg-blue-500 text-white p-2 rounded">+ Create Task</button>
    </div>

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
                            <!-- Display Task Name -->
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

    <!-- Modal for Editing Task -->
    @if ($editingTaskId)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg w-1/3 relative">
                <button wire:click="resetEdit" class="absolute top-2 right-2 text-xl text-gray-500 hover:text-gray-800">
                    &times;
                </button>
                <h3 class="text-xl font-semibold">Edit Task</h3>
                <div class="mt-4">
                    <input type="text" wire:model="editedTaskName" wire:keydown.enter="saveTask({{ $editingTaskId }})"
                           wire:blur="saveTask({{ $editingTaskId }})" class="bg-gray-100 p-2 rounded w-full" autofocus>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal for Creating Task -->
    @if ($creatingTask)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg w-1/3 relative">
                <button wire:click="resetCreateTask" class="absolute top-2 right-2 text-xl text-gray-500 hover:text-gray-800">
                    &times;
                </button>
                <h3 class="text-xl font-semibold">Create New Task</h3>
                <div class="mt-4">
                    <!-- Real-time Input Field for Task Name -->
                    <input type="text" wire:model="newTaskName" wire:keydown.enter="saveNewTask"
                           wire:blur="saveNewTask" class="bg-gray-100 p-2 rounded w-full" autofocus placeholder="Task name (Optional)">
                </div>
                <div class="mt-4 flex justify-between">
                    <!-- Cancel Button -->
                    <button wire:click="resetCreateTask" class="bg-gray-500 text-white p-2 rounded">Cancel</button>
                    <!-- Submit Button -->
                    <button wire:click="saveNewTask" class="bg-blue-500 text-white p-2 rounded">Submit</button>
                </div>
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
