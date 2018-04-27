<?php

namespace App\Models;

use App\Http\Resources\NorificationResource;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    protected $table = 'notifications';

    public function toArray()
    {
        return (new NorificationResource())->toArray(request());
    }
}
