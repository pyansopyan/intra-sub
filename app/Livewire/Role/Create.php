<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;
    public $permissions = [];
    public $Getpermissions = [];

    public function mount()
    {
        $this->permissions = Permission::all();  // Ambil semua permissions
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'Getpermissions' => 'required|array',  // Pastikan permission dipilih
        ]);

        $role = Role::create(['name' => $this->name]);

        // Berikan permissions ke role
        $role->givePermissionTo($this->Getpermissions);

        session()->flash('message', 'Role berhasil ditambahkan.');

        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.role.create');
    }
}
