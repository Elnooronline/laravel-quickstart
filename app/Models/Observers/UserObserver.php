<?php

namespace App\Models\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Listen to the Shop creating event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->type = User::USER_TYPE;
    }
}
