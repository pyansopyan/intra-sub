<?php
namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $avatar; // This will hold the uploaded file
    public $currentAvatar; // Holds the path to the current avatar

    public function mount()
    {
        $user = auth()->user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->currentAvatar = $user->avatar; // Load the current avatar, but not for re-upload
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'avatar' => 'nullable|image', // Avatar is optional
        ]);

        $user = auth()->user();

        // Update profile data
        if ($this->avatar) {
            // Store the new avatar and update the avatar field
            $avatarPath = $this->avatar->storeAs('public/avatar', $this->avatar->hashName());
            $user->update([
                'avatar' => str_replace('public/', '', $avatarPath),
            ]);
        }

        // Update name and email (done regardless of avatar upload)
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Update Profile Successfully.');
        return redirect()->route('profile.edit');
    }

    public function render()
    {
        return view('livewire.pages.user.editprofile', [
            'currentAvatar' => $this->currentAvatar, // Pass current avatar to the view
        ]);
    }
}
