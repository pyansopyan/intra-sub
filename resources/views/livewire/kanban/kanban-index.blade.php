<div> <!-- This is the single root element wrapping everything -->

    <!-- Header -->
    <div class="flex justify-between items-center mb-4 mt-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Kanban Board - {{ $project->name ?? '' }}
        </h2>
        <a href="{{ route('board.index') }}" class="text-blue-600 text-sm">
            << Back to board</a>
    </div>

    <!-- Filter and Create Task Row -->
    <div class="flex items-center space-x-4 mb-4">
        <button wire:click="openCreateTaskModal" class="bg-blue-500 text-white p-2 rounded">+ Create Task</button>

        <div class="flex space-x-4 items-end">
            <div>
                <label for="types" class="form-label text-white">Types</label>
                <select class="form-select" wire:model="types">
                    {{-- <option value="">Select an option</option>
                    <option value="bug">Bug</option>
                    <option value="feature">Feature</option> --}}
                </select>
            </div>

            <div>
                <label for="priorities" class="form-label text-white">Priorities</label>
                <select class="form-select" wire:model="priorities">
                    {{-- <option value="">Select an option</option>
                    <option value="high">High</option>
                    <option value="normal">Normal</option>
                    <option value="low">Low</option> --}}
                </select>
            </div>

            <!-- Filter buttons -->
            <div class="flex space-x-2">
                <button wire:click="filter" class="btn btn-primary">Filter</button>
                <button wire:click="resetFilters" class="btn btn-dark">Reset Filters</button>
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

    <!-- (Modal code remains unchanged) -->
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
