<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use App\Models\Helpers\UserHelpers;
use App\Models\Concerns\Presentable;
use App\Models\Concerns\Resourcable;
use App\Models\Concerns\HasMediaTrait;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, Resourcable, Presentable, HasMediaTrait, UserHelpers, HasApiTokens;

    /**
     * The code of normal user type.
     */
    const USER_TYPE = 0;

    /**
     * The code of admin type.
     */
    const ADMIN_TYPE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
