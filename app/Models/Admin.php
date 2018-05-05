<?php

namespace App\Models;

use App\Models\Concerns\Presentable;
use App\Models\Scopes\UserTypeScope;
use App\Models\Relations\AdminRelations;
use App\Models\Presenters\AdminPresenter;

class Admin extends User
{
    use AdminRelations, Presentable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = AdminPresenter::class;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserTypeScope(static::ADMIN_TYPE));
    }
}
