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
        // Validasi nama role
        $this->validate([
            'name' => 'required',
        ]);

        // Temukan role dan perbarui namanya
        $role = Role::findOrFail($this->roleId);
        $role->name = $this->name;
        $role->save();

        // Sync permissions yang terpilih
        $role->syncPermissions($this->Getpermissions);

        // Flash message
        session()->flash('message', 'Data Berhasil Diperbarui.');

        // Redirect ke halaman index role
        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.role.edit');
    }
}
