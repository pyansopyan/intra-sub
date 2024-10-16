<?php

namespace App\Livewire\Role;
// a
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Show extends Component
{
    public $roleId;
    public $role;

    public function mount($roleId)
    {
        $this->roleId = $roleId;
        $this->role = Role::findOrFail($this->roleId);
    }

    public function render()
    {
        // Return the view with the role data
        return view('livewire.role.show', [
            'role' => $this->role,
        ]);
    }
}
