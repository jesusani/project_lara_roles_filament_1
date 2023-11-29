<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class rolePolicy
{


    public function viewAny(User $user): bool
    {
       return $user->hasRole(['Admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
     /*   if ($user->can('view roles')) {
            return true;
        }
        return false; */
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
       return $user->hasRole(['Admin']);
        //return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
     /*     if ($user->can('view role')) {
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
        //return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
       /*  if ($user->can('create users')) {
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
        //return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
       /*  if ($user->can('edit users')) {
            return true;
        }
        return false; */
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasRole(['Admin']);
       // return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
      /*   if ($user->can('delete users')) {
            return true;
        }
        return false; */
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return $user->hasRole(['Admin']);
       // return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
       /*  if ($user->can('create users')) {
            return true;
        }
        return false; */
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->hasRole(['Admin']);
       // return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
       /*  if ($user->can('create users')) {
            return true;
        }
        return false; */
    }
}
