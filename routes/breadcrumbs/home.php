<?php

// Home
Breadcrumbs::register('dashboard.home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('dashboard.home'), route('dashboard.home'), ['icon' => 'fa fa-dashboard']);
});
