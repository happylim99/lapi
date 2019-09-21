<?php

namespace App\Models;

use App\User;
use App\Models\Product;
use App\Scopes\SellerScope;
use App\Transformers\SellerTransformer;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    public $transformer = SellerTransformer::class;

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
