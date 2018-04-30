@extends('adminlte::layout.main', ['title' => trans('admins.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('admins.plural'), 'breadcrumb' => 'dashboard.admins.index'])
        @component('adminlte::table-box', ['collection' => $admins])
            @slot('title') @endslot
            @slot('tools')
                {{ present('admins')->createButton }}
            @endslot
            <tr>
                <th>#</th>
                <th style="width: 90px;">{{ trans('admins.attributes.avatar') }}</th>
                <th>{{ trans('admins.attributes.name') }}</th>
                <th>{{ trans('admins.attributes.email') }}</th>
                <th>...</th>
            </tr>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>
                        {{ $admin->present()->thumbAvatar }}
                    </td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        {{ $admin->present()->controlButton }}
                    </td>
                </tr>
            @endforeach
        @endcomponent
    @endcomponent
@endsection
