<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Statuses;
use App\Models\Tasks;

class KanbanIndex extends Component
{
    public $editingTaskId = null;
    public $editedTaskName = '';
    public $creatingTask = false;
    public $newTaskName = '';

    public function editTask($taskId, $taskName)
    {
        $this->editingTaskId = $taskId;
        $this->editedTaskName = $taskName;
    }

    public function saveTask($taskId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $task->name = $this->editedTaskName;
            $task->save();
        }

        $this->resetEdit(); // Close modal after saving
    }

    public function resetEdit()
    {
        $this->editingTaskId = null;
        $this->editedTaskName = '';
    }

    public function openCreateTaskModal()
    {
        $this->creatingTask = true;
    }

    public function resetCreateTask()
    {
        $this->creatingTask = false;
        $this->newTaskName = ''; // Clear input when cancelling
    }

    public function saveNewTask()
    {
        if (!empty($this->newTaskName)) {
            // Save the new task if the task name is provided
            Tasks::create([
                'name' => $this->newTaskName,
                'status_id' => 1, // Default status (you can change this)
            ]);
        }

        $this->resetCreateTask(); // Close modal after saving or cancelling
    }

    public function updateTaskStatus($taskId, $newStatusId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $task->status_id = $newStatusId;
            $task->save();
        }
    }

    public function render()
    {
        return view('livewire.kanban.kanban-index', [
            'statuses' => Statuses::with('tasks')->get(),
        ]);
    }
}
