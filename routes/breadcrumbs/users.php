<?php

// Home / Users
Breadcrumbs::register('dashboard.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('users.actions.list'), route('dashboard.users.index'), ['icon' => 'fa fa-users']);
});

// Home / Users / Create
Breadcrumbs::register('dashboard.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.users.index');
    $breadcrumbs->push(trans('users.actions.create'), route('dashboard.users.create'), ['icon' => 'fa fa-user-plus']);
});

// Home / Users / {user}
Breadcrumbs::register('dashboard.users.show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('dashboard.users.index');
    $breadcrumbs->push($user->name, route('dashboard.users.show', $user), ['icon' => 'fa fa-user']);
});

// Home / Users / {user} / Edit
Breadcrumbs::register('dashboard.users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('dashboard.users.show', $user);
    $breadcrumbs->push(trans('users.actions.edit'), route('dashboard.users.edit', $user), ['icon' => 'fa fa-edit']);
});
