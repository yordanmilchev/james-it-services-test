<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Traits\WithSorting;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TasksCRUD extends Component
{
    use WithPagination;
    use WithSorting;

    public $name, $editing;

    public $rules = [
        'editing.name' => 'required',
        'editing.description' => 'required',
        'editing.due_date' => 'required',
    ];

    public function render(): View
    {
        return view('livewire.tasks-c-r-u-d', [
            'tasks' => Task::orderBy($this->sortField, $this->sortDirection)
                ->paginate(15)
        ]);
    }

    public function edit(Task $task): void
    {
        $this->editing = $task;
    }

    public function save(): void
    {
        $this->validate();
        $this->editing->save();

        session()->flash('success', 'Task has been successfully saved!');
    }
}
