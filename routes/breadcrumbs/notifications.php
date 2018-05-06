<?php

// Home / Notifications
Breadcrumbs::register('notifications', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('notifications.plural'), route('notifications'), ['icon' => 'fa fa-bell']);
});
