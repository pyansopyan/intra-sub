<?php

namespace App\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\AttachUser;

class Show extends Component
{
    public $users;          // To store users for this project
    public $projectId;      // Project ID
    public $project;        // Project data
    public $user_id;        // User ID to be added to the project
    public $attachUser;     // AttachUser data related to this project
    public $attachUserId;   // To store the ID of the specific attached user

    // Called when the component is mounted
    public function mount($projectId, $attachUserId = null)
    {
        $this->projectId = $projectId;
        $this->attachUserId = $attachUserId;

        // Fetch the project, including its owner and status
        $this->project = Project::with('owner', 'status')->findOrFail($this->projectId);

        // Fetch all users for the dropdown or list
        $this->users = User::all();

        // Fetch AttachUser data related to the current project
        $this->attachUser = AttachUser::where('projects_id', $this->projectId)
            ->with('user') // Include 'user' relationship
            ->get();

        // If attachUserId is provided, fetch the specific attached user
        if ($this->attachUserId) {
            $this->attachUser = AttachUser::where('projects_id', $this->projectId)
                ->where('id', $this->attachUserId) // Filter by attachUserId
                ->first(); // Only get one result
        }
    }

    public function render()
    {
        // Send project and attachUser data to the view
        return view('livewire.project.show', [
            'project' => $this->project,
            'attachUser' => $this->attachUser, // Send AttachUser data to the view
        ]);
    }
}
