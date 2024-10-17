<?php

namespace App\Livewire\Jabatan;

use Livewire\Component;
use App\Models\Jabatan;
use Livewire\WithPagination;

class Index extends Component
{
    public function destroy($jabatanId)
    {
        $jabatan = Jabatan::find($jabatanId);

        if ($jabatan) {
            $jabatan->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('jabatan.index');
    }

    public function render()
    {
        return view('livewire.jabatan.index', [
            'jabatan' => Jabatan::latest()->paginate(5)
        ]);
    }
}
