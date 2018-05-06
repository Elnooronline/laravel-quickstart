<?php

// Home / Users
Breadcrumbs::register('dashboard.admins.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('admins.actions.list'), route('dashboard.admins.index'), ['icon' => 'fa fa-users']);
});

// Home / Admins / Create
Breadcrumbs::register('dashboard.admins.create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.admins.index');
    $breadcrumbs->push(trans('admins.actions.create'), route('dashboard.admins.create'), ['icon' => 'fa fa-user-plus']);
});

// Home / Admins / {admin}
Breadcrumbs::register('dashboard.admins.show', function ($breadcrumbs, $admin) {
    $breadcrumbs->parent('dashboard.admins.index');
    $breadcrumbs->push($admin->name, route('dashboard.admins.show', $admin), ['icon' => 'fa fa-user']);
});

// Home / Admins / {admin} / Edit
Breadcrumbs::register('dashboard.admins.edit', function ($breadcrumbs, $admin) {
    $breadcrumbs->parent('dashboard.admins.show', $admin);
    $breadcrumbs->push(trans('admins.actions.edit'), route('dashboard.admins.edit', $admin), ['icon' => 'fa fa-edit']);
});
