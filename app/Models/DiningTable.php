<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiningTable extends Model
{
    protected $fillable = ['name', 'capacity', 'status', 'qr_code'];

    public function orders() 
    {
        return $this->hasMany(Order::class);
    }
}
