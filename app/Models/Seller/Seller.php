<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use App\User;
use App\Scopes\SellerScope;

class Seller extends User
{
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SellerScope);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
