<?php

namespace App\Policies;

use App\StatusType;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any statusType.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the statusType.
     *
     * @param  \App\User  $user
     * @param  \App\StatusType  $statusType
     * @return mixed
     */
    public function view(User $user, StatusType $statusType)
    {
        //
    }

    /**
     * Determine whether the user can create statusType.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the statusType.
     *
     * @param  \App\User  $user
     * @param  \App\StatusType  $statusType
     * @return mixed
     */
    public function update(User $user, StatusType $statusType)
    {
        //
    }

    /**
     * Determine whether the user can delete the statusType.
     *
     * @param  \App\User  $user
     * @param  \App\StatusType  $statusType
     * @return mixed
     */
    public function delete(User $user, StatusType $statusType)
    {
        //
    }

    /**
     * Determine whether the user can restore the statusType.
     *
     * @param  \App\User  $user
     * @param  \App\StatusType  $statusType
     * @return mixed
     */
    public function restore(User $user, StatusType $statusType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the statusType.
     *
     * @param  \App\User  $user
     * @param  \App\StatusType  $statusType
     * @return mixed
     */
    public function forceDelete(User $user, StatusType $statusType)
    {
        //
    }
}
