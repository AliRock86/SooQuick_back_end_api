<?php

namespace App\Policies;

use App\OrderAcation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderAcationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any orderAcation.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the orderAcation.
     *
     * @param  \App\User  $user
     * @param  \App\OrderAcation  $orderAcation
     * @return mixed
     */
    public function view(User $user, OrderAcation $orderAcation)
    {
        //
    }

    /**
     * Determine whether the user can create orderAcation.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the orderAcation.
     *
     * @param  \App\User  $user
     * @param  \App\OrderAcation  $orderAcation
     * @return mixed
     */
    public function update(User $user, OrderAcation $orderAcation)
    {
        //
    }

    /**
     * Determine whether the user can delete the orderAcation.
     *
     * @param  \App\User  $user
     * @param  \App\OrderAcation  $orderAcation
     * @return mixed
     */
    public function delete(User $user, OrderAcation $orderAcation)
    {
        //
    }

    /**
     * Determine whether the user can restore the orderAcation.
     *
     * @param  \App\User  $user
     * @param  \App\OrderAcation  $orderAcation
     * @return mixed
     */
    public function restore(User $user, OrderAcation $orderAcation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the orderAcation.
     *
     * @param  \App\User  $user
     * @param  \App\OrderAcation  $orderAcation
     * @return mixed
     */
    public function forceDelete(User $user, OrderAcation $orderAcation)
    {
        //
    }
}
