<!DOCTYPE html>
<html dir="{{ config('adminlte.appearence.dir') }}" lang="{{ app()->getLocale() }}">
<head>
    @include('adminlte::layout.assets.head')
</head>
<body class="hold-transition skin-{{ config('adminlte.appearence.skin') }} sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" id="app">

    @include('adminlte::layout.header')

    @include('adminlte::layout.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('adminlte::layout.footer')
</div>
<!-- ./wrapper -->

@include('adminlte::layout.assets.footer')

@stack('scripts')
</body>
</html>
