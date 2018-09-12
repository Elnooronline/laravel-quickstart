<?php

namespace App\Models;

use App\Models\Scopes\UserTypeScope;
use App\Models\Relations\AdminRelations;

class Admin extends User
{
    use AdminRelations;

    /**
     * The type of the current model for single table inheritance.
     *
     * @var string
     */
    protected $modelType = 'admin';

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
