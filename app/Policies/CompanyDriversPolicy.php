<?php

namespace App\Policies;

use App\Models\CompanyDrivers;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyDriversPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any companyDrivers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the companyDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return mixed
     */
    public function view(User $user, CompanyDrivers $companyDrivers)
    {
        //
    }

    /**
     * Determine whether the user can create companyDrivers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the companyDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return mixed
     */
    public function update(User $user, CompanyDrivers $companyDrivers)
    {
        //
    }

    /**
     * Determine whether the user can delete the companyDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return mixed
     */
    public function delete(User $user, CompanyDrivers $companyDrivers)
    {
        //
    }

    /**
     * Determine whether the user can restore the companyDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return mixed
     */
    public function restore(User $user, CompanyDrivers $companyDrivers)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the companyDrivers.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CompanyDrivers  $companyDrivers
     * @return mixed
     */
    public function forceDelete(User $user, CompanyDrivers $companyDrivers)
    {
        //
    }
}
