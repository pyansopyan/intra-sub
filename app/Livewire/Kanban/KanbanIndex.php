<?php

namespace App\Livewire\Kanban;

use App\Models\Project;
use App\Models\Statuses;
use App\Models\Tasks;
use App\Models\User; // Pastikan model User ada
use App\Models\Priorities; // Pastikan model Priority ada
use App\Models\TaskType; // Pastikan model Type ada
use Livewire\Component;

class KanbanIndex extends Component
{
    public $editingTaskId = null;
    public $editedTask = [];
    public $creatingTask = false;
    public $newTask = [];
    public $project;
    public $projectId;
    public $owners; // Menambahkan variabel owners
    public $responsibles; // Menambahkan variabel responsibles
    public $priorities; // Menambahkan variabel priorities
    public $types; // Menambahkan variabel types

    // Method untuk mengedit task
    public function editTask($taskId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $this->editingTaskId = $taskId;
            $this->editedTask = $task->toArray();
        }
    }

    // Method untuk menyimpan task yang diedit
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
            'status_id' => 1,  // Default status, adjust as needed
            'type_id' => '',
            'priority_id' => '',
            'code' => '',
            'order' => '',
            'estimation' => '',
            'is_default' => true, // Set is_default to true to trigger default behavior
        ];
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
        // Cek jika task name tidak kosong
        if (!empty($this->newTask['name'])) {
            // Menyimpan task baru dengan status To Do
            $this->newTask['status_id'] = 1; // Asumsikan ID status To Do adalah 1, sesuaikan dengan ID yang sesuai

            Tasks::create(array_merge($this->newTask, ['project_id' => $this->projectId]));
        }

        // Reset modal setelah task berhasil disimpan
        $this->resetCreateTask();
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
            'statuses' => Statuses::with(['tasks' => function ($query) {
                $query->where('project_id', $this->projectId);
            }])->get(),
            'owners' => $this->owners,
            'responsibles' => $this->responsibles,
            'priorities' => $this->priorities, // Kirim data priority ke view
            'types' => $this->types, // Kirim data type ke view
        ]);
    }
}
