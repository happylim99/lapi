<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use App\User;

class Seller extends User
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
