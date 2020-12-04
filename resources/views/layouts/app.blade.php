<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>{{ env('APP_NAME') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
	</head>
	<body class="c-app">

        @include('includes.sidebar')

		<div class="c-wrapper c-fixed-components">

            @include('includes.header')

			<div class="c-body">
				<main class="c-main">
					<div class="container-fluid">
						<div class="fade-in">

                            @include('includes.messages')
                            @yield('content')

						</div>
					</div>
				</main>

                @include('includes.footer')
			</div>
		</div>

        @stack('before-scripts')

        <script src="{{ mix('js/app.js') }}"></script>

        @stack('after-scripts')
	</body>
</html>
