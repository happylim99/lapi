<?php

namespace App\Policies;

use App\User;
use App\Models\Transaction;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization, AdminActions;
    
    /**
     * Determine whether the user can view the transaction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Transaction  $transaction
     * @return mixed
     */
    public function view(User $user, Transaction $transaction)
    {
        dd('kaka');
        return $user->id === $transaction->buyer->id || $user->id === $transaction->product->seller->id;
    }
}
