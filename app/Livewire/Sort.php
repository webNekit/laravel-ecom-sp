<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class Sort extends Component
{
    #[Url()]
    public $sort = 'asc';

    public function setSort($sort) {
        $this->sort = $sort;
        $this->dispatch('sort', sort: $this->sort);
    }

    public function render()
    {
        return view('livewire.sort');
    }
}
