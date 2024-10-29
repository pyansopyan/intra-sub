<?php

namespace App\Livewire\Activities;

use App\Models\Activities;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($aktivitasId)
    {
        $aktivitas = Activities::find($aktivitasId);

        if ($aktivitas) {
            $aktivitas->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('activities.index');
    }

    public function render()
    {
        return view('livewire.activities.index', [
            'aktivitas' => Activities::latest()->paginate(5),
        ]);
    }
}
