<?php

namespace App\Policies;

use App\User;
use App\Events;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;


    public function  before ($user , $ability) {
        if ($user->admin) {
          return  true;
        }
    }
    /**
     * Determine whether the user can view the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function view(User $user, Events $events)
    {
        return true;
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function update(User $user, Events $events)
    {
        return $user->id == $events->user_id;
    }

    /**
     * Determine whether the user can delete the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function delete(User $user, Events $events)
    {
        return $user->id == $events->user_id;

    }
}
