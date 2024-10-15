<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public function render()
    {
        return view('livewire.permission.index', [
            'permissions' => Permission::all() // Ambil semua data permission
        ]);
    }

    public function delete($id)
    {
        Permission::find($id)->delete(); // Hapus permission berdasarkan ID
        session()->flash('message', 'Permission berhasil dihapus');
    }

}
