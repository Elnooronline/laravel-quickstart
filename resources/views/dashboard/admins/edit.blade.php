@extends('adminlte::layout.main', ['title' => trans('admins.actions.edit')])

@section('content')
    @component('adminlte::page', ['title' => trans('admins.actions.edit'), 'breadcrumb' => ['dashboard.admins.edit', $admin]])
        @component('adminlte::box', ['title' => trans('admins.singular')])
            @php(BsForm::resource('admins'))

            {{ BsForm::putModel($admin, route('dashboard.admins.update', $admin),['files' => true]) }}

            @include('dashboard.admins.partials.form')

            {{ BsForm::submit(trans('forms.edit')) }}

            {{ BsForm::close() }}
        @endcomponent
    @endcomponent
@endsection
