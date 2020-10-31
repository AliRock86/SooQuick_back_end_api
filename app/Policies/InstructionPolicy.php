<?php

namespace App\Policies;

use App\Instruction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstructionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any instruction.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Instruction  $instruction
     * @return mixed
     */
    public function view(User $user, Instruction $instruction)
    {
        //
    }

    /**
     * Determine whether the user can create instruction.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Instruction  $instruction
     * @return mixed
     */
    public function update(User $user, Instruction $instruction)
    {
        //
    }

    /**
     * Determine whether the user can delete the instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Instruction  $instruction
     * @return mixed
     */
    public function delete(User $user, Instruction $instruction)
    {
        //
    }

    /**
     * Determine whether the user can restore the instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Instruction  $instruction
     * @return mixed
     */
    public function restore(User $user, Instruction $instruction)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Instruction  $instruction
     * @return mixed
     */
    public function forceDelete(User $user, Instruction $instruction)
    {
        //
    }
}
