<?php

namespace App\Policies;

use App\Models\TransferOrderByDrivers;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransferOrderByDriversPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any transferOrderByDrivers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the transferOrderByDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return mixed
     */
    public function view(User $user, TransferOrderByDrivers $transferOrderByDrivers)
    {
        //
    }

    /**
     * Determine whether the user can create transferOrderByDrivers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the transferOrderByDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return mixed
     */
    public function update(User $user, TransferOrderByDrivers $transferOrderByDrivers)
    {
        //
    }

    /**
     * Determine whether the user can delete the transferOrderByDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return mixed
     */
    public function delete(User $user, TransferOrderByDrivers $transferOrderByDrivers)
    {
        //
    }

    /**
     * Determine whether the user can restore the transferOrderByDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return mixed
     */
    public function restore(User $user, TransferOrderByDrivers $transferOrderByDrivers)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the transferOrderByDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrderByDrivers  $transferOrderByDrivers
     * @return mixed
     */
    public function forceDelete(User $user, TransferOrderByDrivers $transferOrderByDrivers)
    {
        //
    }
}
