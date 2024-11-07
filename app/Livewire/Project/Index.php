<?php

namespace App\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Index extends Component
{
    public $search;

    use WithPagination;

    public function destroy($projectId)
    {
        $project = Project::find($projectId);

        if ($project) {
            $project->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('project.index');
    }

    public function render()
    {
        return view('livewire.project.index', [
            'projects' => Project::with(['owner', 'status'])->where('name','like','%'.$this->search.'%')->latest()->paginate(5)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
