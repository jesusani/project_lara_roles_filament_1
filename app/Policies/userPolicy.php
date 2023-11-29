<?php

namespace App\Policies;

use App\Models\Paciente;
use App\Models\User;

class UserPolicy
{




   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
       /*  if ($user->can('view user')) {
            return true;
        }
        return false; */
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Paciente $paciente): bool
    {
        return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
     /*    if ($user->can('view users')) {
            return true;
        }
        return false; */
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
      /*   if ($user->can('create users')) {
            return true;
        }
        return false; */
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
     
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;

    }
}
