<?php

namespace App\Livewire\Kanban;

use App\Models\Project;
use App\Models\Statuses;
use App\Models\Tasks;
use Livewire\Component;

class KanbanIndex extends Component
{
    public $editingTaskId = null;
    public $editedTaskName = '';
    public $creatingTask = false;
    public $newTaskName = '';
    public $project;
    public $projectId;

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

        $this->resetEdit();
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
        $this->newTaskName = '';
    }

    public function saveNewTask()
    {
        if (!empty($this->newTaskName)) {
            Tasks::create([
                'name' => $this->newTaskName,
                'status_id' => 1,
                'project_id' => $this->projectId,
            ]);
        }

        $this->resetCreateTask();
    }

    public function updateTaskStatus($taskId, $newStatusId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $task->status_id = $newStatusId;
            $task->save();
        }
    }

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->project = Project::find($projectId);
    }

    public function render()
    {
        return view('livewire.kanban.kanban-index', [
            'statuses' => Statuses::with(['tasks' => function ($query) {
                $query->where('project_id', $this->projectId);
            }])->get(),
        ]);
    }
}
