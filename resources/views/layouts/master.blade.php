<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | Capston</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/material-dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
		<script type="text/javascript" src="https://static.filestackapi.com/v3/filestack.js"></script>
		@include('layouts.footer')
		<div class="wrapper">
			@extends('layouts.sidebar')
			@extends('layouts.navbar')
			<div class="main-panel">
				@yield('content')
				@yield('footer')
			</div>
		</div>
    </body>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js') }}"></script>
    <script src="{{ asset('js/master.js') }}"></script>
	<script src="{{asset('js/validator.js')}}"></script>
	<script src="{{asset('js/jquery.validate.min.js')}}"></script>
	@yield('script')
</html>
