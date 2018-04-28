<?php

namespace App\Models\Observers;

use App\Models\Admin;

class AdminObserver
{
    /**
     * Listen to the Shop creating event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function creating(Admin $admin)
    {
        $admin->type = Admin::ADMIN_TYPE;
    }
}
