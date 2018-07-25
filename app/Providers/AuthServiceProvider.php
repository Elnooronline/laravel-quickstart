<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Hashing\Hasher;
use App\Auth\Providers\EloquentMultipleUserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('eloquent.multiple', function ($app, array $config) {
            return new EloquentMultipleUserProvider($app->make(Hasher::class), $config['model'], $config['mapping']);
        });
    }
}
