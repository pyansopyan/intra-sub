<?php

namespace App\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\Statuses;

class Show extends Component
{
    public $projectId;
    public $project;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->project = Project::with('owner', 'status')->findOrFail($this->projectId);
    }
    public function render()
    {
        return view('livewire.project.show', ['project' => $this->project]);
    }
}
