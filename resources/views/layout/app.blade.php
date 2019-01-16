<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<title>Cadastro de Produtos</title>
</head>

<body>
	<div class="container">
		<main role=main"">
			@hasSection('body')
				@yield('body')
			@endif
		</main>
	</div>
	<script src="{{ asset('js/app,js') }}" type="text/javascript"></script>
</body>
</html>