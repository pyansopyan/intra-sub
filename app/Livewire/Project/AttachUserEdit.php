<?php

namespace App\Livewire\Project;

use App\Models\AttachUser;
use App\Models\User; // Import the User model to fetch users
use Livewire\Component;

class AttachUserEdit extends Component
{
    public $projects_id; // Project ID
    public $attachUserId; // Attach User ID to be edited
    public $users_id; // Selected user ID
    public $users; // List of users for dropdown
    public $attachUser; // Store the specific attach user to edit

    public function mount($projectId, $attachUserId)
    {
        // Set the project ID from the URL parameter
        $this->projects_id = $projectId;

        // Fetch the specific AttachUser to edit based on the attachUserId
        $this->attachUser = AttachUser::where('projects_id', $this->projects_id)
                                      ->where('id', $attachUserId)
                                      ->first();

        // If no attachUser found, redirect with an error message
        if (!$this->attachUser) {
            session()->flash('error', 'Attach User not found.');
            return redirect()->route('project.show', ['projectId' => $this->projects_id]);
        }

        // Load all users for the dropdown
        $this->users = User::all();

        // Preselect the user_id from the found attachUser
        $this->users_id = $this->attachUser->users_id;
    }

    public function update()
    {
        // Ensure that a user is selected for update
        if (!$this->users_id) {
            session()->flash('error', 'Please select a user.');
            return;
        }

        // Update the AttachUser with the new user_id
        $this->attachUser->update([
            'users_id' => $this->users_id,
        ]);

        // Flash a success message and redirect
        session()->flash('message', 'Attach User updated successfully.');
        return redirect()->route('project.show', ['projectId' => $this->projects_id]);
    }

    public function render()
    {
        return view('livewire.project.attach-user-edit', [
            'users' => $this->users,
        ]);
    }
}
