<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Check old password
        Validator::extend('check_hash', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, array_first($parameters));
        });

        Validator::extend('base64_image', function ($attribute, $value, $parameters, $validator) {
            return validate_base64($value, ['png', 'jpg', 'jpeg', 'gif']);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
