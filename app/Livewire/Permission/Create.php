<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $name;

    public function store()
    {
        $this->validate([
            'name'   => 'required',
        ]);

        $permission = Permission::create([
            'name'     => $this->name,
        ]);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('permission.index');
    }



    public function render()
    {
        return view('livewire.permission.create');
    }
}
