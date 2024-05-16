<?php

namespace App\Policies;

use App\Models\User;
use App\Models\entregaCarga;
use Illuminate\Auth\Access\Response;

class EntregaCargaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, entregaCarga $entregaCarga): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, entregaCarga $entregaCarga): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, entregaCarga $entregaCarga): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, entregaCarga $entregaCarga): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, entregaCarga $entregaCarga): bool
    {
        //
    }
}
