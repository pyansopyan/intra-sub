<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $permissions;
    public $roleId;
    public $name;
    public $Getpermissions = [];

    public function mount($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->permissions = Permission::all();
        $this->Getpermissions = $role->permissions()->pluck('id')->toArray();
    }

    /**
     * Update function
     */
    public function update()
    {
        // Validate role name and ensure it's unique except for the current role
        $this->validate([
            'name' => 'required|unique:roles,name,' . $this->roleId . ',id,guard_name,web',
        ]);

        // Find the role and update the name
        $role = Role::findOrFail($this->roleId);
        $role->name = $this->name;
        $role->save();

        // Filter valid permissions
        $validPermissions = Permission::whereIn('id', $this->Getpermissions)
                                      ->where('guard_name', 'web')  // Only select permissions for the 'web' guard
                                      ->pluck('id')
                                      ->toArray();

        // Sync only valid permissions
        $role->syncPermissions($validPermissions);

        // Flash message
        session()->flash('message', 'Data Berhasil Diperbarui.');

        // Redirect to role index
        return redirect()->route('role.index');
    }


    public function render()
    {
        return view('livewire.role.edit');
    }
}
