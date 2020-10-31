<?php

namespace App\Policies;

use App\DeliveryDrivers;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryDriversPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any deliveryDrivers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the deliveryDrivers.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return mixed
     */
    public function view(User $user, DeliveryDrivers $deliveryDrivers)
    {
        //
    }

    /**
     * Determine whether the user can create deliveryDrivers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the deliveryDrivers.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return mixed
     */
    public function update(User $user, DeliveryDrivers $deliveryDrivers)
    {
        //
    }

    /**
     * Determine whether the user can delete the deliveryDrivers.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return mixed
     */
    public function delete(User $user, DeliveryDrivers $deliveryDrivers)
    {
        //
    }

    /**
     * Determine whether the user can restore the deliveryDrivers.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return mixed
     */
    public function restore(User $user, DeliveryDrivers $deliveryDrivers)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the deliveryDrivers.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryDrivers  $deliveryDrivers
     * @return mixed
     */
    public function forceDelete(User $user, DeliveryDrivers $deliveryDrivers)
    {
        //
    }
}
