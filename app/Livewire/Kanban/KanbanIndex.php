<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Statuses;
use App\Models\Tasks;

class KanbanIndex extends Component
{
    public function updateTaskStatus($taskId, $newStatusId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $task->status_id = $newStatusId;
            $task->save();
            session()->flash('message', 'Task updated successfully.');
        }
    }

    public function destroy($taskId)
    {
        $task = Tasks::find($taskId);

        if ($task) {
            $task->delete();
            session()->flash('message', 'Task deleted successfully.');
        }
    }

    public function render()
    {
        return view('livewire.kanban.kanban-index', [
            'statuses' => Statuses::with('tasks')->get(),
        ]);
    }
}
