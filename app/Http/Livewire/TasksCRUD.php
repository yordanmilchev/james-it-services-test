<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class TasksCRUD extends Component
{
    public function render(): View
    {
        return view('livewire.tasks-c-r-u-d');
    }
}
