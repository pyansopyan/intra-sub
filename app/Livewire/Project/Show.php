<?php

namespace App\Livewire\Project;

use App\Models\AttachUser;
use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $users;
    public $projectId;
    public $project;
    public $user_id;
    public $attachUser;
    public $attachUserId;

    public function mount($projectId, $attachUserId = null)
    {
        $this->projectId = $projectId;
        $this->attachUserId = $attachUserId;

        $this->project = Project::with('owner', 'status')->findOrFail($this->projectId);


        $this->users = User::all();

        $this->attachUser = AttachUser::where('projects_id', $this->projectId)
            ->with('user')
            ->get();

        if ($this->attachUserId) {
            $this->attachUser = AttachUser::where('projects_id', $this->projectId)
                ->where('id', $this->attachUserId)
                ->first();
        }
    }

    public function delete($attachUserId)
    {
        $attachment = AttachUser::find($attachUserId);

        if ($attachment) {
            $attachment->delete();
            session()->flash('message', 'Data Berhasil Dihapus.');
        } else {
            session()->flash('error', 'Attachment not found.');
        }
    }

    public function render()
    {
        return view('livewire.project.show', [
            'project' => $this->project,
            'attachUser' => $this->attachUser,
        ]);
    }
}
