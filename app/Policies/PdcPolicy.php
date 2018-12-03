<?php

namespace App\Policies;

use App\User;
use App\Pdcs;
use Illuminate\Auth\Access\HandlesAuthorization;

class PdcPolicy
{
    use HandlesAuthorization;

    public function  before ($user , $ability) {
        if ($user->admin) {
            return  true;
        }
    }

    /**
     * Determine whether the user can view the pdcs.
     *
     * @param  \App\User  $user
     * @param  \App\Pdcs  $pdcs
     * @return mixed
     */
    public function view(User $user, Pdcs $pdcs)
    {
        return true;
    }

    /**
     * Determine whether the user can create pdcs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the pdcs.
     *
     * @param  \App\User  $user
     * @param  \App\Pdcs  $pdcs
     * @return mixed
     */
    public function update(User $user, Pdcs $pdcs)
    {
        return $user->id == $pdcs->user_id;
    }

    /**
     * Determine whether the user can delete the pdcs.
     *
     * @param  \App\User  $user
     * @param  \App\Pdcs  $pdcs
     * @return mixed
     */
    public function delete(User $user, Pdcs $pdcs)
    {
        return $user->id == $pdcs->user_id;
    }
}
