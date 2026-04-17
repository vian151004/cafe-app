<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'image', 'stock', 'is_available'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function stockMovements() 
    {
        return $this->hasMany(StockMovement::class);
    }

    public function reduceStock(int $amount): void
    {
        if ($this->stock >= $amount) {
            throw new \Exception("Stok {$this->name} tidak mencukupi untuk dikurangi sebanyak {$amount}.");
        }
        
        $this->decrement('stock', $amount);
    }

}
