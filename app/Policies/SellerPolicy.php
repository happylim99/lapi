<?php

namespace App\Policies;

use App\User;
use App\Models\Seller;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class SellerPolicy
{
    use HandlesAuthorization, AdminActions;
    
    /**
     * Determine whether the user can view the seller.
     *
     * @param  \App\User  $user
     * @param  \App\Models\seller  $seller
     * @return mixed
     */
    public function view(User $user, Seller $seller)
    {
        return $user->id === $seller->id;
    }

    /**
     * Determine whether the user can sell products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function sell(User $user, Seller $seller)
    {
        return $user->id === $seller->id;
    }

    /**
     * Determine whether the user can update products.
     *
     * @param  \App\User  $user
     * @param  \App\Models\seller  $seller
     * @return mixed
     */
    public function editProduct(User $user, seller $seller)
    {
        return $user->id === $seller->id;
    }

    /**
     * Determine whether the user can delete products.
     *
     * @param  \App\User  $user
     * @param  \App\Models\seller  $seller
     * @return mixed
     */
    public function deleteProduct(User $user, seller $seller)
    {
        return $user->id === $seller->id;
    }
}
