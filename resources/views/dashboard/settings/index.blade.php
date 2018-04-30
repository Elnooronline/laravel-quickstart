@extends('adminlte::layout.main', ['title' => trans('settings.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('settings.plural'), 'breadcrumb' => 'dashboard.settings.index'])
        @component('adminlte::box')
            @php(BsForm::resource('settings'))
            {{ BsForm::put(route('dashboard.settings.update'), ['files' => true]) }}

            {{ BsForm::text('name')->value(Setting::get('name')) }}
            {{ BsForm::text('phone')->value(Setting::get('phone')) }}
            {{ BsForm::text('email')->value(Setting::get('email')) }}
            <img
                    src="{{ Setting::getModel('logo')->getFirstOrDefaultMediaUrl() }}"
                    height="70"
                    class="img img-circle"
            >
            <br><br>
            {{ BsForm::file('logo') }}

            {{ BsForm::submit(trans('forms.save')) }}
            {{ BsForm::close() }}
        @endcomponent
    @endcomponent
@endsection
