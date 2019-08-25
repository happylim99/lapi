<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction\Transaction;
use App\User;
use App\Scopes\BuyerScope;

class Buyer extends User
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new BuyerScope);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
