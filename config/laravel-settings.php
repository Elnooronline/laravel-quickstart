<?php
return [
    /**
     * The model of the settings table.
     * if you want to override the model you should extend your settings model from the package model class.
     *
     *   'model_class' => \App\CustomSetting::class,
     *
     *   class CustomSetting extends \Elnooronline\LaravelSettings\Models\SettingModel
     *   {
     *      ...
     *   }
     */
    'model_class' => \App\Models\Setting::class,

    /**
     * The registered prefix methods.
     * Ex:
     * 'prefix_methods' => [
     *      'country'
     *  ],
     * Usage:
     * Setting::country('us')->set('title', 'Website')
     */
    'prefix_methods' => [
        //
    ],

    /**
     * The global prefix conditions.
     * Ex:
     * 'global_conditions' => [
     *      'country' => 'us'
     *  ],
     *
     * Usage:
     * Setting::set('title', 'Website')
     */
    'global_conditions' => [
        //
    ]
];
