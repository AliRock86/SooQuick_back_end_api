<?php

namespace App\Policies;

use App\Partnership;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnershipPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any partnership.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the partnership.
     *
     * @param  \App\User  $user
     * @param  \App\Partnership  $partnership
     * @return mixed
     */
    public function view(User $user, Partnership $partnership)
    {
        //
    }

    /**
     * Determine whether the user can create partnership.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the partnership.
     *
     * @param  \App\User  $user
     * @param  \App\Partnership  $partnership
     * @return mixed
     */
    public function update(User $user, Partnership $partnership)
    {
        //
    }

    /**
     * Determine whether the user can delete the partnership.
     *
     * @param  \App\User  $user
     * @param  \App\Partnership  $partnership
     * @return mixed
     */
    public function delete(User $user, Partnership $partnership)
    {
        //
    }

    /**
     * Determine whether the user can restore the partnership.
     *
     * @param  \App\User  $user
     * @param  \App\Partnership  $partnership
     * @return mixed
     */
    public function restore(User $user, Partnership $partnership)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the partnership.
     *
     * @param  \App\User  $user
     * @param  \App\Partnership  $partnership
     * @return mixed
     */
    public function forceDelete(User $user, Partnership $partnership)
    {
        //
    }
}
