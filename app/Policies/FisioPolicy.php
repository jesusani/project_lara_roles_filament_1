<?php

namespace App\Policies;

use App\Models\Fisio;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FisioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('view fisios')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Fisio $fisio): bool
    {
        if ($user->can('view fisio')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->can('create fisios')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Fisio $fisio): bool
    {
        if ($user->can('edit fisios')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Fisio $fisio): bool
    {
        if ($user->can('delete fisios')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Fisio $fisio): bool
    {
        if ($user->hasRole('Super-Admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Fisio $fisio): bool
    {
        if ($user->hasRole('Super-Admin')) {
            return true;
        }
        return false;
    }
}
