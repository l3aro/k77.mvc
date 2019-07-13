<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'price'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category', 'product_id', 'category_id');
    }
}
