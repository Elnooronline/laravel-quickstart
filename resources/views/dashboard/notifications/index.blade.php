@php($title = trans('notifications.plural'))
@extends('adminlte::layout.main', compact('title'))
@section('content')
    @component('adminlte::page', ['title' => $title, 'breadcrumb' => 'notifications'])
        <adminlte-notifications-list
                route="{{ route('api.notifications.paginate') }}"
        ></adminlte-notifications-list>
    @endcomponent
@endsection