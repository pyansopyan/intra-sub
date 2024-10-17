<?php

namespace App\Livewire\Departement;

use Livewire\Component;
use App\Models\Departement;
use Livewire\WithPagination;

class Index extends Component
{
    public function destroy($departementId)
    {
        $departement = Departement::find($departementId);

        if ($departement) {
            $departement->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('departement.index');
    }

    public function render()
    {
        return view('livewire.departement.index', [
            'departements' => Departement::latest()->paginate(5)
        ]);
    }
}
