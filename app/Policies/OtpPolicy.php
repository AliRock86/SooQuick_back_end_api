<?php

namespace App\Policies;

use App\Otp;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OtpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any otp.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the otp.
     *
     * @param  \App\User  $user
     * @param  \App\Otp  $otp
     * @return mixed
     */
    public function view(User $user, Otp $otp)
    {
        //
    }

    /**
     * Determine whether the user can create otp.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the otp.
     *
     * @param  \App\User  $user
     * @param  \App\Otp  $otp
     * @return mixed
     */
    public function update(User $user, Otp $otp)
    {
        //
    }

    /**
     * Determine whether the user can delete the otp.
     *
     * @param  \App\User  $user
     * @param  \App\Otp  $otp
     * @return mixed
     */
    public function delete(User $user, Otp $otp)
    {
        //
    }

    /**
     * Determine whether the user can restore the otp.
     *
     * @param  \App\User  $user
     * @param  \App\Otp  $otp
     * @return mixed
     */
    public function restore(User $user, Otp $otp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the otp.
     *
     * @param  \App\User  $user
     * @param  \App\Otp  $otp
     * @return mixed
     */
    public function forceDelete(User $user, Otp $otp)
    {
        //
    }
}
