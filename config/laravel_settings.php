<?php

return [
    'driver' => env('SETTINGS_DRIVER', 'database'),

    'model_class' => \App\Models\Setting::class,

    'cache' => false,
];
