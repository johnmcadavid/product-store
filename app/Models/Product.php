<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'reference',
        'price',
        'weight',
        'category',
        'stock'
    ];

    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'product_id');
    }    
}
