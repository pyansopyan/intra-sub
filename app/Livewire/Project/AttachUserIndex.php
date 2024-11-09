<?php

namespace App\Livewire\Project;

use App\Models\AttachUser;
use Livewire\Component;
use App\Models\User;

class AttachUserIndex extends Component
{
    public $projects_id;
    public $users_id;
    public $users;

    public function mount($projectId)
    {
        $this->projects_id = $projectId;
        $this->users = User::all();
    }

    public function store()
    {
        AttachUser::create([
            'users_id' => $this->users_id,
            'projects_id' => $this->projects_id,
        ]);

        session()->flash('message', 'User attached to the project successfully.');
        return redirect()->route('project.show', ['projectId' => $this->projects_id]);
    }

    // Make sure this method is public
    public function delete($attachUserId)
    {
        $attachment = AttachUser::find($attachUserId);

        if ($attachment) {
            $attachment->delete();
            session()->flash('message', 'User detached from the project successfully.');
        } else {
            session()->flash('error', 'Attachment not found.');
        }
    }

    public function render()
    {
        return view('livewire.project.attach-user-index', [
            'users' => $this->users,
            'attachedUsers' => AttachUser::where('projects_id', $this->projects_id)->get(),
        ]);
    }
}
