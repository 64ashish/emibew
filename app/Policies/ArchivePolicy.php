<?php

namespace App\Policies;

use App\Models\Archive;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArchivePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole(['super admin','emiweb admin', 'emiweb staff'])) {
            return true;
        }

    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        if($user->hasRole('subscriber')){
            return true;
        }

        // return true if user is regular and archive id is 1
        return true;


    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Archive $archive)
    {
        //


        if($user->hasRole(['organization admin', 'organization staff']) and $user->organization->archives->contains('id', $archive->id))
        {
            return true;
        }

        if($user->hasRole('subscriber')){
            return true;
        }

        // return true if user is regular and archive id is 1
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Archive $archive)
    {
        if($user->hasRole(['organization admin', 'organization staff']) and $user->organization->archives->contains('id', $archive->id))
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Archive $archive)
    {
        //
        if($user->hasRole(['organization admin', 'organization staff']) and $user->organization->archives->contains('id', $archive->id))
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Archive $archive)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Archive $archive)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Archive $archive)
    {
        //
    }
}
