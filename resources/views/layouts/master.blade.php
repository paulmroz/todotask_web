<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Flexbox</title>
		<link rel="stylesheet" type="text/css" href="/css/app.css">
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="/js/app.js"></script>

		@yield('scripts')
  </head>
  <body>
	 <div class="container">
		@include('layouts.nav')
		<main>
			@yield('content')
		</main>

		@include('layouts.footer')
	 </div>
  </body>

  @yield('scripts_js')
</html>