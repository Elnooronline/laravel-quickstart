@extends('adminlte::layout.main', ['title' => trans('admins.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('admins.plural'), 'breadcrumb' => ['dashboard.admins.show', $admin]])
        @component('adminlte::table-box')

            <tr>
                <th>{{ trans('admins.attributes.name') }}</th>
                <td>{{ $admin->name }}</td>
            </tr>
            <tr>
                <th>{{ trans('admins.attributes.email') }}</th>
                <td>{{ $admin->email }}</td>
            </tr>

            @slot('footer')
                    {{ $admin->present()->editButton }}

                    {{ $admin->present()->deleteButton }}
            @endslot

        @endcomponent
    @endcomponent
@endsection
