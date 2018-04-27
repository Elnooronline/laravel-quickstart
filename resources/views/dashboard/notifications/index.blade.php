@php($title = trans('notifications.plural'))
@extends('adminlte::layout.main', compact('title'))
@section('content')
    @component('adminlte::page', ['title' => $title, 'breadcrumb' => 'notifications'])
        <adminlte-notifications-list
                translation="{{ json_encode(trans('notifications')) }}"
                route="{{ route('notifications', ['notification_type' => 'dashboard']) }}"
        ></adminlte-notifications-list>
    @endcomponent
@endsection