<?php

return [
    'plural' => 'Admins',
    'singular' => 'Admin',
    'empty' => 'There are no admins yet.',
    'select' => 'Select admin',
    'actions' => [
        'list' => 'List admins',
        'show' => 'show',
        'create' => 'New admin',
        'edit' => 'edit',
        'delete' => 'delete',
    ],
    'messages' => [
        'created' => 'Admin was created successfuly.',
        'updated' => 'Admin was updated successfuly.',
        'deleted' => 'Admin was deleted successfuly.',
    ],
    'attributes' => [
        'name' => 'Admin name',
        'email' => 'E-mail',
        'password' => 'Password',
        'password_confirmation' => 'Password confirmation',
        'avatar' => 'Image',
        'type' => 'Type',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'You are about to delete the admin !!',
            'info' => 'You can not undo this step!',
            'confirm' => 'Confirm delete',
            'cancel' => 'Cancel',
        ],
    ],
];
