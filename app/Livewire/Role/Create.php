<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $permissions;
    public $name;
    public $Getpermissions = [];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        // Debugging: Log data yang ingin disimpan
        logger('Menyimpan role:', ['name' => $this->name, 'permissions' => $this->Getpermissions]);

        $role = Role::create(['name' => $this->name]);
        $permissions = Permission::whereIn('id', $this->Getpermissions)->get();
        $role->givePermissionTo($permissions);

        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('role.index'); // Pastikan ini sesuai dengan rute Anda
    }

    public function render()
    {
        return view('livewire.role.create');
    }
}
