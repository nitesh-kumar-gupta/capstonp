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
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
		<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>
	</head>
	<body>
	@include('layouts.footer')
	<div class="image-container set-full-height" style="background-image: url({{asset('images/authBg.jpg')}})">
		<div class="container">
			@yield('wizard')
		</div>
		@yield('footer')
	</div>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{asset('js/jquery.bootstrap.js')}}"></script>
	<script src="{{asset('js/wizard.js')}}"></script>
	<script src="{{asset('js/jquery.validate.min.js')}}"></script>
	</body>
</html>
