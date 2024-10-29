<?php

namespace App\Livewire\Priorities;

use App\Models\Priorities;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($prioritasId)
    {
        $prioritas = Priorities::find($prioritasId);

        if ($prioritas) {
            $prioritas->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('priorities.index');
    }

    public function render()
    {
        return view('livewire.priorities.index', [
            'prioritas' => Priorities::latest()->paginate(5),
        ]);
    }
}
