<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $roleId;
    public $name;
    public $permissions = [];
    public $Getpermissions = [];

    public function mount($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->roleId = $role->id;
        $this->name = $role->name;

        // Ambil semua permissions dan yang sudah terpilih untuk role ini
        $this->permissions = Permission::all();
        $this->Getpermissions = $role->permissions()->pluck('id')->toArray();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,' . $this->roleId,
        ]);

        $role = Role::findOrFail($this->roleId);
        $role->update(['name' => $this->name]);

        // Sync permissions yang dipilih ke role
        $role->syncPermissions($this->Getpermissions);

        session()->flash('message', 'Role berhasil diperbarui.');

        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.role.edit');
    }
}
