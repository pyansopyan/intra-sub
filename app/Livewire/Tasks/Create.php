<?php

namespace App\Livewire\Tasks;

use App\Models\Tasks;
use App\Models\Project;
use App\Models\User;
use App\Models\Statuses;
use App\Models\TaskType;
use App\Models\Priorities;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $content;
    public $owner_id;
    public $responsible_id;
    public $status_id;
    public $project_id;
    public $type_id;
    public $priority_id;
    public $code;
    public $order;
    public $estimation;

    // Method untuk menyimpan data
    public function store()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|string|max:255',
            'content' => 'required',
            'owner_id' => 'required|exists:users,id',
            'responsible_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'project_id' => 'required|exists:projects,id',
            'type_id' => 'required|exists:task_types,id',
            'priority_id' => 'required|exists:priorities,id',
            'code'=> 'required',
            'order'=> 'required',
            'estimation'=> 'required',
        ]);

        // Menyimpan data ke dalam database
        $task = Tasks::create([
            'name' => $this->name,
            'content' => $this->content,
            'owner_id' => $this->owner_id,
            'responsible_id' => $this->responsible_id,
            'status_id' => $this->status_id,
            'project_id' => $this->project_id,
            'type_id' => $this->type_id,
            'priority_id' => $this->priority_id,
            'code' => $this->code,
            'order' => $this->order,
            'estimation' => $this->estimation,
        ]);

        // Menampilkan pesan sukses
        session()->flash('message', 'Data Berhasil disimpan');

        // Reset form
        $this->reset(['owner_id','responsible_id','status_id','projects_id','type_id','priority_id']);

        // Redirect ke halaman indeks
        return redirect()->route('tasks.index');
    }

    // Method untuk render tampilan
    public function render()
    {
        return view('livewire.tasks.create', [
            'users' => User::all(),
            'statuses'=> Statuses::all(),
            'projects' => Project::all(),
            'taskType' => TaskType::all(),
            'priorities' => Priorities::all(),
        ]);
    }
}
