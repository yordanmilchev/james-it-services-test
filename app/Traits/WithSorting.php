<?php

namespace App\Traits;


trait WithSorting
{
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    /**
     * @param $field
     * Define sort field and direction
     */
    public function sortBy($field): void
    {
        if ($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }
}
