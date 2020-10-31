<?php

namespace App\Policies;

use App\DeliveryPrice;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryPricePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any deliveryPrice.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the deliveryPrice.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return mixed
     */
    public function view(User $user, DeliveryPrice $deliveryPrice)
    {
        //
    }

    /**
     * Determine whether the user can create deliveryPrice.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the deliveryPrice.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return mixed
     */
    public function update(User $user, DeliveryPrice $deliveryPrice)
    {
        //
    }

    /**
     * Determine whether the user can delete the deliveryPrice.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return mixed
     */
    public function delete(User $user, DeliveryPrice $deliveryPrice)
    {
        //
    }

    /**
     * Determine whether the user can restore the deliveryPrice.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return mixed
     */
    public function restore(User $user, DeliveryPrice $deliveryPrice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the deliveryPrice.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryPrice  $deliveryPrice
     * @return mixed
     */
    public function forceDelete(User $user, DeliveryPrice $deliveryPrice)
    {
        //
    }
}
