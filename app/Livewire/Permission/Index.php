<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;
        /**
     * destroy function
     */
    public function destroy($permissionId)
    {
        //get permission
        $permission = Permission::findOrFail($permissionId);

        if ($permission) {
            $permission->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('permission.index');
    }
    public function render()
    {
        return view('livewire.permission.index', [
            'permissions' => Permission::latest()->get(),
        ]);
    }
}
