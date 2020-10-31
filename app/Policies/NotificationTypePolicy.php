<?php

namespace App\Policies;

use App\NotificationType;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any notificationType.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the notificationType.
     *
     * @param  \App\User  $user
     * @param  \App\NotificationType  $notificationType
     * @return mixed
     */
    public function view(User $user, NotificationType $notificationType)
    {
        //
    }

    /**
     * Determine whether the user can create notificationType.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the notificationType.
     *
     * @param  \App\User  $user
     * @param  \App\NotificationType  $notificationType
     * @return mixed
     */
    public function update(User $user, NotificationType $notificationType)
    {
        //
    }

    /**
     * Determine whether the user can delete the notificationType.
     *
     * @param  \App\User  $user
     * @param  \App\NotificationType  $notificationType
     * @return mixed
     */
    public function delete(User $user, NotificationType $notificationType)
    {
        //
    }

    /**
     * Determine whether the user can restore the notificationType.
     *
     * @param  \App\User  $user
     * @param  \App\NotificationType  $notificationType
     * @return mixed
     */
    public function restore(User $user, NotificationType $notificationType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the notificationType.
     *
     * @param  \App\User  $user
     * @param  \App\NotificationType  $notificationType
     * @return mixed
     */
    public function forceDelete(User $user, NotificationType $notificationType)
    {
        //
    }
}
