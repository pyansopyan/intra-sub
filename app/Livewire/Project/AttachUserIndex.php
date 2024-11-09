<?php

namespace App\Livewire\Project;

use App\Models\AttachUser;
use App\Models\User; // Import the User model to fetch users
use Livewire\Component;

class AttachUserIndex extends Component
{
    public $projects_id; // Make sure this matches the database column name
    public $users_id; // Make sure this matches the database column name
    public $users; // Property to hold list of users for the dropdown

    public function mount($projectId)
    {
        // Set the project ID from the URL parameter
        $this->projects_id = $projectId;

        // Load all users for the dropdown (you can filter this as needed)
        $this->users = User::all();
    }

    public function store()
    {

        // Create a new AttachUser record with user_id and project_id
        AttachUser::create([
            'users_id' => $this->users_id,
            'projects_id' => $this->projects_id,
        ]);

        // Flash a success message to the session
        session()->flash('message', 'User attached to the project successfully.');
        return redirect()->route('project.show', ['projectId' => $this->projects_id] );

    }



    public function render()
    {
        return view('livewire.project.attach-user-index', [
            'users' => $this->users, 
        ]);
    }
}
