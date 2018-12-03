<?php

namespace App\Policies;

use App\User;
use App\Om;
use Illuminate\Auth\Access\HandlesAuthorization;

class OmPolicy
{
    use HandlesAuthorization;

    public function  before ($user , $ability) {
        if ($user->admin) {
            return  true;
        }
    }

    /**
     * Determine whether the user can view the om.
     *
     * @param  \App\User  $user
     * @param  \App\Om  $om
     * @return mixed
     */
    public function view(User $user, Om $om)
    {
        return true;
    }

    /**
     * Determine whether the user can create oms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the om.
     *
     * @param  \App\User  $user
     * @param  \App\Om  $om
     * @return mixed
     */
    public function update(User $user, Om $om)
    {
        return $user->id == $om->user_id;

    }

    /**
     * Determine whether the user can delete the om.
     *
     * @param  \App\User  $user
     * @param  \App\Om  $om
     * @return mixed
     */
    public function delete(User $user, Om $om)
    {
        return $user->id == $om->user_id;

    }
}
