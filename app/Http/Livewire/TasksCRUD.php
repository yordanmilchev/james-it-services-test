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

    public $name, $editing, $confirming, $showFilters = false;

    public $rules = [
        'editing.name' => 'required|string|max:255',
        'editing.description' => 'required|string|min:10',
        'editing.due_date' => 'required|date|date_format:Y-m-d',
    ];

    public function render(): View
    {
        $tasksQb = Task::query();

        if ($this->name){
            $tasksQb->where('name', 'like', '%'.$this->name.'%');
            $this->showFilters = true;
        }

        return view('livewire.tasks-c-r-u-d', [
            'tasks' => $tasksQb->orderBy($this->sortField, $this->sortDirection)
                ->paginate(15)
        ]);
    }

    public function edit(Task $task): void
    {
        $this->editing = $task;
    }

    public function create(): void
    {
        $this->editing = new Task();
    }

    public function save(): void
    {
        $this->validate();
        $this->editing->save();
        $this->dispatchBrowserEvent('closeModal');
        $this->reset('editing');

        session()->flash('success', 'Task has been successfully saved!');
    }

    public function updated(): void
    {
        if (isset($this->editing) && $this->editing->id){
            $this->validate();
            $this->editing->save();
            $this->emit('dismissAlert');

            session()->flash('success', 'Task has been successfully saved!');
        }
    }

    public function confirmDelete($skill): void
    {
        $this->confirming = $skill;
    }

    public function cancelDelete(): void
    {
        $this->reset('confirming');
    }

    public function delete(Task $task): void
    {
        $this->editing = $task;
        $taskName = $this->editing->name;

        try {
            $this->editing->delete();
            session()->flash('error', 'Task '.$taskName.' has been deleted!');
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
    }
}
