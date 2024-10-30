<?php
namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Statuses;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $owner_id;
    public $status_id;
    public $ticket_prefix;
    public $cover_image;

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'owner_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'ticket_prefix' => 'required|string|max:255',
            'cover_image' => 'required|image|max:2048', // max 2MB
        ]);

        // Simpan gambar dan dapatkan path-nya
        $covername = $this->cover_image->hashName();

// Simpan cover_image dengan storeAs
        $this->cover_image->storeAs('public/projects', $covername);

        // Simpan project ke database
        $project = Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'owner_id' => $this->owner_id,
            'status_id' => $this->status_id,
            'ticket_prefix' => $this->ticket_prefix,
            'cover_image' => $covername,
        ]);

        session()->flash('message', 'Data Berhasil disimpan');

        return redirect()->route('project.index');
    }

    public function render()
    {
        return view('livewire.project.create', [
            'owners' => User::all(),
            'statuses' => Statuses::all(),
        ]);
    }
}
