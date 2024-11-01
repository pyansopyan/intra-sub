<?php

namespace App\Livewire\Tasks;

use App\Models\Tasks;
use App\Models\Project;
use App\Models\User;
use App\Models\Statuses;
use App\Models\TaskType;
use App\Models\Priorities;
use Livewire\Component;

class Show extends Component
{
    public $task;

    // Method for initializing task data based on ID
    public function mount($tasksId)
    {
        $this->task = Tasks::with(['owner', 'responsible', 'status', 'project', 'type', 'priority'])
                           ->findOrFail($tasksId);
    }

    // Method to render the view
    public function render()
    {
        return view('livewire.tasks.show', [
            'task' => $this->task,
        ]);
    }
}
