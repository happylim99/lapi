<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction\Transaction;
use App\User;

class Buyer extends User
{
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
