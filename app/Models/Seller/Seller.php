<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Seller extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
