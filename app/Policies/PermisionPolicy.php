<?php

namespace App\Policies;

use App\Permision;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermisionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any permision.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the permision.
     *
     * @param  \App\User  $user
     * @param  \App\Permision  $permision
     * @return mixed
     */
    public function view(User $user, Permision $permision)
    {
        //
    }

    /**
     * Determine whether the user can create permision.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the permision.
     *
     * @param  \App\User  $user
     * @param  \App\Permision  $permision
     * @return mixed
     */
    public function update(User $user, Permision $permision)
    {
        //
    }

    /**
     * Determine whether the user can delete the permision.
     *
     * @param  \App\User  $user
     * @param  \App\Permision  $permision
     * @return mixed
     */
    public function delete(User $user, Permision $permision)
    {
        //
    }

    /**
     * Determine whether the user can restore the permision.
     *
     * @param  \App\User  $user
     * @param  \App\Permision  $permision
     * @return mixed
     */
    public function restore(User $user, Permision $permision)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the permision.
     *
     * @param  \App\User  $user
     * @param  \App\Permision  $permision
     * @return mixed
     */
    public function forceDelete(User $user, Permision $permision)
    {
        //
    }
}
