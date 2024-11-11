<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Project;

class BoardIndex extends Component
{
    public $selectedProject;
    public function render()
    {
        return view('livewire.kanban.board-index', [
            'projects' => Project::all(),
        ]);
    }
}
