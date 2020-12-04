<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>{{ env('APP_NAME') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
	</head>
	<body class="c-app flex-row align-items-center">
		<div class="container">

            @yield('content')

        </div>

        @stack('before-scripts')

        <script src="{{ mix('js/app.js') }}"></script>

        @stack('after-scripts')
	</body>
</html>
