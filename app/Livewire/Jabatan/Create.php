<?php

namespace App\Livewire\Jabatan;

use App\Models\Jabatan;
use Spatie\Permission\Models\Permission;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Jabatan::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Data berhasil ditambahkan.');

        return redirect()->route('jabatan.index');
    }

    public function render()
    {
        return view('livewire.jabatan.create');
    }
}
