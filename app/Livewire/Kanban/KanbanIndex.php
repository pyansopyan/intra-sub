<?php

namespace App\Livewire\Kanban;

use App\Models\Priorities;
use App\Models\Project;
use App\Models\Tasks;
use App\Models\TaskStatus;
use App\Models\TaskType;
use App\Models\User;
use Livewire\Component;

class KanbanIndex extends Component
{
    public $editingTaskId = null;
    public $editedTask = [];
    public $creatingTask = false;
    public $newTask = [];
    public $project;
    public $projectId;
    public $owners;
    public $responsibles;
    public $priorities;
    public $types;

    // filter properties
    public $selectedType = '';
    public $selectedPriority = '';
    public $selectedResponsible = '';

    public function filter()
    {

    }

    public function resetFilters()
    {
        $this->selectedType = '';
        $this->selectedPriority = '';
        $this->selectedResponsible = '';
    }

    public function editTask($taskId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $this->editingTaskId = $taskId;
            $this->editedTask = $task->toArray();
        }
    }
    public function saveTask()
    {
        $task = Tasks::find($this->editingTaskId);

        if ($task) {
            $task->update($this->editedTask);
        }

        $this->resetEdit();
    }

    // Method untuk mereset form edit
    public function resetEdit()
    {
        $this->editingTaskId = null;
        $this->editedTask = [];
    }

    // Method untuk membuka modal create task
    public function openCreateTaskModal()
    {
        $this->creatingTask = true;
        $this->newTask = [
            'name' => '',
            'content' => '',
            'owner_id' => '',
            'responsible_id' => '',
            'status_id' => '', // Initially empty
            'type_id' => '',
            'priority_id' => '',
            'code' => '',
            'order' => '',
            'estimation' => '',
            'is_default' => true, // Set is_default to true to trigger default behavior
        ];

        // Get the "To Do" status dynamically (assuming it's the default)
        $defaultStatus = TaskStatus::where('is_default', true)->first();
        if ($defaultStatus) {
            $this->newTask['status_id'] = $defaultStatus->id;
        } else {
            session()->flash('error', 'Default status not found!');
        }
    }

    // Method untuk mereset form create task
    public function resetCreateTask()
    {
        $this->creatingTask = false;
        $this->newTask = [];
    }

    // Method untuk menyimpan task baru
    public function saveNewTask()
    {
        // Ensure name is not empty
        if (!empty($this->newTask['name'])) {
            // Fetch the default "To Do" status if not already set
            if (empty($this->newTask['status_id'])) {
                $defaultStatus = TaskStatus::where('is_default', true)->first();
                if ($defaultStatus) {
                    $this->newTask['status_id'] = $defaultStatus->id;
                } else {
                    session()->flash('error', 'Default status not found!');
                    return;
                }
            }

            // Create the new task and associate it with the project
            Tasks::create(array_merge($this->newTask, ['project_id' => $this->projectId]));
        }

        // Reset modal after saving the task
        $this->resetCreateTask();
    }

    public function updateTaskRealTime()
    {
        $task = Tasks::find($this->editingTaskId);

        if ($task) {
            $task->update($this->editedTask); // Updates the task with the new values
        }
    }
    public function closeModal()
    {
        $this->editingTaskId = null; // This will close the modal
    }

    // Method untuk memperbarui status task
    public function updateTaskStatus($taskId, $newStatusId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $task->status_id = $newStatusId;
            $task->save();
        }
    }

    // Method untuk menginisialisasi data ketika komponen dimuat
    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->project = Project::find($projectId);
        $this->owners = User::all();
        $this->responsibles = User::all();
        $this->priorities = Priorities::all(); // Ambil semua data priority
        $this->types = TaskType::all(); // Ambil semua data type
    }

    // Method untuk render view
    public function render()
    {
        return view('livewire.kanban.kanban-index', [
            'statuses' => TaskStatus::with(['tasks' => function ($query) {
                $query->where('project_id', $this->projectId);

                if ($this->selectedType) {
                    $query->where('type_id', $this->selectedType);
                }
                if ($this->selectedPriority) {
                    $query->where('priority_id', $this->selectedPriority);
                }
                if ($this->selectedResponsible) {
                    $query->where('responsible_id', $this->selectedResponsible);
                }
            }])->get(),
            'owners' => $this->owners,
            'responsibles' => $this->responsibles,
            'priorities' => $this->priorities, // Kirim data priority ke view
            'types' => $this->types, // Kirim data type ke view
        ]);
    }
}
