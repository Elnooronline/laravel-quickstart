@extends('adminlte::layout.main', ['title' => trans('admins.actions.create')])

@section('content')
    @component('adminlte::page', ['title' => trans('admins.actions.create'), 'breadcrumb' => 'dashboard.admins.create'])
        @component('adminlte::box')
            @php(BsForm::resource('admins'))
            {{ BsForm::post(route('dashboard.admins.store'), ['files' => true]) }}

            @include('dashboard.admins.partials.form')

            {{ BsForm::submit(trans('forms.save')) }}
            {{ BsForm::close() }}
        @endcomponent
    @endcomponent
@endsection
