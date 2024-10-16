<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
        /**
     * define public variable
     */
    public $name;

        /**
     * store function
     */
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
