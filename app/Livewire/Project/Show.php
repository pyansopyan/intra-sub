<?php

namespace App\Livewire\Project;

use App\Models\AttachUser;
use App\Models\Project;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $users;
    public $projectId;
    public $project;
    public $user_id;
    public $attachUserId;

    public function mount($projectId, $attachUserId = null)
    {
        $this->projectId = $projectId;
        $this->attachUserId = $attachUserId;

        $this->project = Project::with('owner', 'status')->findOrFail($this->projectId);


        $this->users = User::all();

    }

    public function destroy($attachUserId)
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

        $attachUser = AttachUser::where('projects_id', $this->projectId)
            ->with(relations: 'user')
            ->paginate('10');

        if ($this->attachUserId) {
            $attachUser = AttachUser::where('projects_id', $this->projectId)
                ->where('id', $this->attachUserId)
                ->first();
        }

        return view('livewire.project.show', [
            'project' => $this->project,
            'attachUser' => $attachUser,
        ]);
    }
}
