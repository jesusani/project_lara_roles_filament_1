<?php

namespace App\Policies;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PacientePolicy
{




   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
      // $result =  auth()->user()->paciente->user_id === auth()->user()->id;
       //return $result;
        //return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
       return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Paciente $paciente): bool
    {
        return $user->id() === $paciente->user_id();
       // return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
       // return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Paciente $paciente): bool
    {
       // return $user->id === $paciente->user_id;

       // return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Paciente $paciente): bool
    {
        return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Paciente $paciente): bool
    {
        return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Paciente $paciente): bool
    {
        return auth()->user()->hasRole(['admin']);
        /*return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();*/
        //return true;
    }
}
