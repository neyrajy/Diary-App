<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KParent; // Replace with your actual Parent model

class ParentTable extends Component
{
    public $search;
    public $sortBy = 'id_asc';

    protected $queryString = ['search', 'sortBy'];

    public function render()
    {
        $parents = Parent::query()
            ->when($this->search, function ($query) {
                $query->where('firstname', 'like', '%'.$this->search.'%')
                      ->orWhere('lastname', 'like', '%'.$this->search.'%');
            })
            ->when($this->sortBy, function ($query) {
                list($sortField, $sortDirection) = explode('_', $this->sortBy);
                $query->orderBy($sortField, $sortDirection);
            })
            ->paginate(7);

        return view('livewire.parent-table', [
            'parents' => $parents,
            'parentsCount' => Parent::count(), // Adjust this as needed
        ]);
    }
}
