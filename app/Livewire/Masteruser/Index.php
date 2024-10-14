<?php

namespace App\Livewire\Masteruser;

use Livewire\Component;
use App\Models\Masteruser;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        return view('livewire.masteruser.index', [
            'masterusers' => Masteruser::latest()->paginate(5),
        ]);
    }
}
