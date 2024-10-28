<?php

namespace App\Livewire\ProjectStatuses;

use App\Models\Statuses;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($statusId)
    {
        $status = Statuses::find($statusId);

        if ($status) {
            $status->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('project-statuses.index');
    }

    public function render()
    {
        return view('livewire.project-statuses.index', [
            'status' => Statuses::latest()->paginate(5),
        ]);
    }
}
