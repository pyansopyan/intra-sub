<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    /**
     * destroy function
     */
    public function destroy($roleId)
    {
        $role = Role::findOrFail($roleId);

        if ($role) {
            $role->delete();
        }
        session()->flash('message', 'Data Berhasil Dihapuss.');

        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.role.index', [
            'roles' => Role::latest()->paginate(5)
        ]);
    }
}
