<?php

namespace App\Policies;

use App\Models\test;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class testPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any test.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\test  $test
     * @return mixed
     */
    public function view(User $user, test $test)
    {
        //
    }

    /**
     * Determine whether the user can create test.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\test  $test
     * @return mixed
     */
    public function update(User $user, test $test)
    {
        //
    }

    /**
     * Determine whether the user can delete the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\test  $test
     * @return mixed
     */
    public function delete(User $user, test $test)
    {
        //
    }

    /**
     * Determine whether the user can restore the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\test  $test
     * @return mixed
     */
    public function restore(User $user, test $test)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the test.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\test  $test
     * @return mixed
     */
    public function forceDelete(User $user, test $test)
    {
        //
    }
}
