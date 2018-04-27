<?php

return [

    /*
     * The logo of the dashboard.
     */
    'logo' => '<b>Elnooronline</b>',


    /*
     * The small logo of the dashboard.
     */
    'small_logo' => 'Elnooronline',

    /*
     * The name of the dashboard.
     */
    'name' => 'Elnooronline',

    'appearence' => [

        /*
         * Supported values are black, black-light, blue, blue-light,
         *  green, green-light, purple, purple-light,
         *  red, red-light, yellow and yello-light.
         */
        'skin' => 'black',

        /*
         * The direction of the dashboard.
         */
        'dir' => 'rtl',

        /*
         * The header items that will be rendered.
         */
        'header' => [
            'items' => [
                //'adminlte::layout.header.messages',
                'adminlte::layout.header.notifications',
                //'adminlte::layout.header.tasks',
                'adminlte::layout.header.user',
                //'adminlte::layout.header.logout',
            ],
        ],

        /*
         * The sidebar items that will be rendered.
         */
        'sidebar' => [
            'items' => [
                'adminlte::layout.sidebar.user-panel',
                //'adminlte::layout.sidebar.search-form',
                'adminlte::layout.sidebar.items',
            ],
        ],
    ],

    'urls' => [
        /*
        |--------------------------------------------------------------------------
        | URLs
        |--------------------------------------------------------------------------
        |
        | Register here your dashboard main urls, base, logout, login, etc...
        | The options that can be nullable is register and password_request meaning that it can be disabled.
        |
        */
        'base' => '/',
        'logout' => 'logout',
        'login' => 'login',
        'register' => 'register',
        'password_request' => 'password/reset',
        'password_email' => 'password/email',
        'password_reset' => 'password/reset',
    ],
];
