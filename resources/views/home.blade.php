@extends('layouts.app')

@section('content')
    @component('adminlte::page', ['title' => 'Home'])
        @component('adminlte::box')
            You're logged in!
        @endcomponent
    @endcomponent
@endsection
