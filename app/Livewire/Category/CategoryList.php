<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CategoryList extends Component
{

    #[Computed()]
   public function categories()
   {
        return Category::where('is_active', 1)
            ->where('is_popular', 1)
            ->get();
   }

    public function render()
    {
        return view('livewire.category.category-list', [
            'categories' => $this->categories(),
        ]);
    }
}
