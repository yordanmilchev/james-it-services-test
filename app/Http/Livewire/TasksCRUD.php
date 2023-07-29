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

    public $name, $editing, $confirming, $showFilters = false, $from_date, $to_date;

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

        if ($this->from_date){
            $tasksQb->whereDate('due_date', '>=', $this->from_date);
            $this->showFilters = true;
        }

        if ($this->to_date){
            $tasksQb->whereDate('due_date', '<=', $this->to_date);
            $this->showFilters = true;
        }

        return view('livewire.tasks-c-r-u-d', [
            'tasks' => $tasksQb->orderBy($this->sortField, $this->sortDirection)
                ->paginate(15)
        ]);
    }

    protected $listeners = ['filtersCleared'];

    public function filtersCleared(): void
    {
        $this->resetExcept();
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
        session()->flash('success', 'Task has been successfully saved!');

        $this->dispatchBrowserEvent('closeModal');
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

    public function confirmDelete($task): void
    {
        $this->confirming = $task;
    }

    public function cancelDelete(): void
    {
        $this->reset('confirming');
    }

    public function delete(Task $task): void
    {
        $this->editing = $task;
        $taskName = $this->editing->name;
        $this->emit('dismissAlert');

        try {
            $this->editing->delete();
            session()->flash('error', 'Task '.$taskName.' has been deleted!');
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
    }
}
