<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class MenuKatalog extends Component
{
    public $category_id = null;

    public function selectCategory($id)
    {
        $this->category_id = $id;
    }

    public function render()
    {
        return view('livewire.⚡menu-katalog', [
            'categories' => Category::all(),
            'products' => Product::query()
                ->when($this->category_id, fn($q) => $q->where('category_id', $this->category_id))
                ->where('is_available', true) // Hanya yang tersedia
                ->get(),
        ]);
    }

    public function resetCategory()
    {
        $this->category_id = null;
    }
}