<?php

namespace App\Policies;

use App\OrderInstruction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderInstructionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any orderInstruction.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the orderInstruction.
     *
     * @param  \App\User  $user
     * @param  \App\OrderInstruction  $orderInstruction
     * @return mixed
     */
    public function view(User $user, OrderInstruction $orderInstruction)
    {
        //
    }

    /**
     * Determine whether the user can create orderInstruction.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the orderInstruction.
     *
     * @param  \App\User  $user
     * @param  \App\OrderInstruction  $orderInstruction
     * @return mixed
     */
    public function update(User $user, OrderInstruction $orderInstruction)
    {
        //
    }

    /**
     * Determine whether the user can delete the orderInstruction.
     *
     * @param  \App\User  $user
     * @param  \App\OrderInstruction  $orderInstruction
     * @return mixed
     */
    public function delete(User $user, OrderInstruction $orderInstruction)
    {
        //
    }

    /**
     * Determine whether the user can restore the orderInstruction.
     *
     * @param  \App\User  $user
     * @param  \App\OrderInstruction  $orderInstruction
     * @return mixed
     */
    public function restore(User $user, OrderInstruction $orderInstruction)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the orderInstruction.
     *
     * @param  \App\User  $user
     * @param  \App\OrderInstruction  $orderInstruction
     * @return mixed
     */
    public function forceDelete(User $user, OrderInstruction $orderInstruction)
    {
        //
    }
}
