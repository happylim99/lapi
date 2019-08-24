<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer\Buyer;
use App\Models\Product\Product;

class Transaction extends Model
{
    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id'
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
