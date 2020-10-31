<?php

namespace App\Policies;

use App\Models\TransferredOrders;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransferredOrdersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any transferredOrders.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the transferredOrders.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return mixed
     */
    public function view(User $user, TransferredOrders $transferredOrders)
    {
        //
    }

    /**
     * Determine whether the user can create transferredOrders.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the transferredOrders.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return mixed
     */
    public function update(User $user, TransferredOrders $transferredOrders)
    {
        //
    }

    /**
     * Determine whether the user can delete the transferredOrders.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return mixed
     */
    public function delete(User $user, TransferredOrders $transferredOrders)
    {
        //
    }

    /**
     * Determine whether the user can restore the transferredOrders.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return mixed
     */
    public function restore(User $user, TransferredOrders $transferredOrders)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the transferredOrders.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferredOrders  $transferredOrders
     * @return mixed
     */
    public function forceDelete(User $user, TransferredOrders $transferredOrders)
    {
        //
    }
}
