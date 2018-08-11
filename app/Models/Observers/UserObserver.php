<?php

namespace App\Models\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Listen to the user creating event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        //
    }
}
