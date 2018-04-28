<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Observers\UserObserver;
use App\Models\Observers\AdminObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Admin::observe(AdminObserver::class);
        User::observe(UserObserver::class);

        Carbon::setLocale($this->app->getLocale());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
