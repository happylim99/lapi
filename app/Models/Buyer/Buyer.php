<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;

class Buyer extends User
{
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
