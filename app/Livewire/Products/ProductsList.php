<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ProductsList extends Component
{

    public $categoryId;

    #[Computed()]
    public function products()
    {
        return Product::where('category_id', $this->categoryId)
            ->where('is_active', 1)
            ->get();
    }

    public function render()
    {
        return view('livewire.products.products-list', [
            'products' => $this->products(),
        ]);
    }
}
