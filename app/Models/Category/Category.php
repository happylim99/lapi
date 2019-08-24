<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}