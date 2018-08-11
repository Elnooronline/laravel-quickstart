<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use App\Models\Helpers\UserHelpers;
use App\Models\Concerns\Presentable;
use App\Models\Concerns\Resourcable;
use App\Models\Concerns\HasMediaTrait;
use App\Models\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\Models\Concerns\SingleTableInheritance;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use SingleTableInheritance,
        HasApiTokens,
        Notifiable,
        Resourcable,
        Presentable,
        HasMediaTrait,
        UserHelpers {
           UserHelpers::getImagePlaceholder insteadof HasMediaTrait;
        }

    /**
     * The code of normal user type.
     */
    const USER_TYPE = 'user';

    /**
     * The code of admin type.
     */
    const ADMIN_TYPE = 'admin';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The type of the current model for single table inheritance.
     *
     * @var string
     */
    protected $modelType = 'user';

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

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;
}
