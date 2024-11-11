<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mt-4">Kanban Board</h2>
        <a href="{{route('board.index')}}" class="text-blue-600 text-sm mt-4"><< Back to board</a>
    </div>


    <div class="flex space-x-4">
        @foreach ($statuses as $status)
            <div class="w-1/3 text-white p-4 rounded shadow-2xl" style="background-color: {{ $status->color }}"
                ondrop="drop(event, {{ $status->id }})"
                ondragover="allowDrop(event)">
                <h2 class="font-bold mb-2">{{ $status->name }}</h2>
                <div class="space-y-2">
                    @foreach ($status->tasks as $task)
                        <div class="bg-gray-800 p-2 rounded shadow-lg" draggable="true"
                            ondragstart="drag(event, {{ $task->id }})">
                            <span class="flex justify-between items-center">
                                <span class="space-x-4 space-y-4 flex mb-4">{{ $task->name}}</span>
                                {{-- <span class="flex space-x-2">
                                    <button onclick="confirmDelete({{ $task->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">DELETE</button>
                                </span> --}}
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
</div>

<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev, taskId) {
        ev.dataTransfer.setData("taskId", taskId);
    }

    function drop(ev, newStatusId) {
        ev.preventDefault();
        var taskId = ev.dataTransfer.getData("taskId");
        @this.updateTaskStatus(taskId, newStatusId);
    }

    function confirmDelete(taskId) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            @this.call('destroy', taskId);
        }
    }
</script>
