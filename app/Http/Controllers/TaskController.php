<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class TaskController extends Controller
{
    /**
     * @return View
     * Return tasks blade containing livewire component call
     */
    public function index(): View
    {
        return view('tasks');
    }
}
