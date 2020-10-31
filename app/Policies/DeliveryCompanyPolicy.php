<?php

namespace App\Policies;

use App\DeliveryCompany;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryCompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any deliveryCompany.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the deliveryCompany.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return mixed
     */
    public function view(User $user, DeliveryCompany $deliveryCompany)
    {
        //
    }

    /**
     * Determine whether the user can create deliveryCompany.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the deliveryCompany.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return mixed
     */
    public function update(User $user, DeliveryCompany $deliveryCompany)
    {
        //
    }

    /**
     * Determine whether the user can delete the deliveryCompany.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return mixed
     */
    public function delete(User $user, DeliveryCompany $deliveryCompany)
    {
        //
    }

    /**
     * Determine whether the user can restore the deliveryCompany.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return mixed
     */
    public function restore(User $user, DeliveryCompany $deliveryCompany)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the deliveryCompany.
     *
     * @param  \App\User  $user
     * @param  \App\DeliveryCompany  $deliveryCompany
     * @return mixed
     */
    public function forceDelete(User $user, DeliveryCompany $deliveryCompany)
    {
        //
    }
}
