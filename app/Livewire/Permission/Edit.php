<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    // public $permission;
    // public $name;

    // public function mount($id)
    // {
    //     $this->permission = Permission::find($id);
    //     $this->name = $this->permission->name;
    // }

    // public function update($id)
    // {
    //     $this->validate([
    //         'name' => 'required'
    //     ]);

    //     $this->permission->update([
    //         'name' => $this->name
    //     ]);

    //      return redirect()->route('permission.index');

    // }

    public function render()
    {
        return view('livewire.permission.edit');
    }

}



