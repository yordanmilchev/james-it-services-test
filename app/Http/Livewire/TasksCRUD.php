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

    /**
     * @return View
     * Query database and return corresponding to the component blade
     */
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

    /**
     * @return void
     * Set component properties to their initial state on filter clearing
     */
    public function filtersCleared(): void
    {
        $this->resetExcept();
    }

    /**
     * @param Task $task
     * @return void
     * Bind specific task to component's editing property
     */
    public function edit(Task $task): void
    {
        $this->editing = $task;
    }

    /**
     * @return void
     * Bind new model instance to component's editing property
     */
    public function create(): void
    {
        $this->editing = new Task();
    }

    /**
     * @return void
     * Manually save task using save button located in modal
     */
    public function save(): void
    {
        $this->validate();
        $this->editing->save();
        session()->flash('success', 'Task has been successfully saved!');

        $this->dispatchBrowserEvent('closeModal');
    }

    /**
     * @return void
     * Automatically save task changes on input focus out if task exists in database
     */
    public function updated(): void
    {
        if (isset($this->editing) && $this->editing->id){
            $this->validate();
            $this->editing->save();
            $this->emit('dismissAlert');

            session()->flash('success', 'Task has been successfully saved!');
        }
    }

    /**
     * @param $task
     * @return void
     * Prompt user/change remove button to yes or no
     */
    public function confirmDelete($task): void
    {
        $this->confirming = $task;
    }

    /**
     * @return void
     * Return delete button to its original state
     */
    public function cancelDelete(): void
    {
        $this->reset('confirming');
    }

    /**
     * @param Task $task
     * @return void
     * Delete task from database
     */
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
