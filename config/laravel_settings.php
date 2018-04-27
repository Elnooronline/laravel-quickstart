<?php
return [
    'driver' => env('SETTINGS_DRIVER', 'database'),

    'model_class' => \Elnooronline\LaravelSettings\Models\SettingModel::class,

    'cache' => false,
];
