<?php

namespace App\Models;

use App\Http\Resources\NotificationResource;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    protected $table = 'notifications';

    public function toArray()
    {
        return (new NotificationResource())->toArray(request());
    }
}
