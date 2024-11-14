<?php

namespace App\Livewire\Kanban;

use App\Models\Project;
use Livewire\Component;

class BoardIndex extends Component
{
    public $selectedProject;

    public function updatedSelectedProject($projectId)
    {
        if ($projectId) {
            // Redirect ke halaman kanban berdasarkan projectId
            return redirect()->route('kanban.index', ['projectId' => $projectId]);
        }
    }

    public function render()
    {
        $project = Project::all();
        return view('livewire.kanban.board-index', [
            'projects' => $project,
        ]);
    }
}
