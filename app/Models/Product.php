<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Product.php
class Product extends Model
{
    protected $fillable = [
        'make','model','year','price','engine',
        'mileage','image','description','category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
