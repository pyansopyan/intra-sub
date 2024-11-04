<?php

namespace App\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\Statuses;

class Show extends Component
{
    public $users;
    public $projectId;
    public $project;
    public $user_id;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->project = Project::with('owner', 'status')->findOrFail($this->projectId);

        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.project.show', ['project' => $this->project]);
    }
}
