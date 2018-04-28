<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ isset($title) ? ($title . ' | ') : null }}{{ config('adminlte.name') }}</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@if(config('adminlte.appearence.dir') == 'ltr')
    <link rel="stylesheet" href="{{ url('vendor/adminlte/css/admin-lte.css') }}">
@else
    <link rel="stylesheet" href="{{ url('vendor/adminlte/css/admin-lte.rtl.css') }}">
@endif
<link rel="stylesheet" href="{{ url(mix('/css/dashboard.css')) }}">

@stack('assets.head')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">