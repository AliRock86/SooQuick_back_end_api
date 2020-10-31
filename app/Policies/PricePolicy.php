<?php

namespace App\Policies;

use App\Models\Price;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PricePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any price.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the price.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Price  $price
     * @return mixed
     */
    public function view(User $user, Price $price)
    {
        //
    }

    /**
     * Determine whether the user can create price.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the price.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Price  $price
     * @return mixed
     */
    public function update(User $user, Price $price)
    {
        //
    }

    /**
     * Determine whether the user can delete the price.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Price  $price
     * @return mixed
     */
    public function delete(User $user, Price $price)
    {
        //
    }

    /**
     * Determine whether the user can restore the price.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Price  $price
     * @return mixed
     */
    public function restore(User $user, Price $price)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the price.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Price  $price
     * @return mixed
     */
    public function forceDelete(User $user, Price $price)
    {
        //
    }
}
