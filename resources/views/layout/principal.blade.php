<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Bootstrap CSS -->
    	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<title>{{ env('APP_NAME')}}</title>
	</head>
	<body>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{ asset('js/app.js') }}"></script>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Previsão do Tempo</h1>
				<p class="lead">Cadastre e selecione cidades para ver a previsão dos próximos 5 dias!</p>
			</div>
		</div>
		<div class="container">
			@include('layout.status-erros')

			@yield('conteudo')
		</div>
		
		<script>
			$('form').on('submit', function() {
				$(this).children('button[type="submit"]').each(function() {
					var btnText = $(this).text();

					var btnHtml = '<span class="spinner-border" style="width: 1.4rem; height: 1.4rem;" role="status" aria-hidden="true"></span>&nbsp;'+btnText;

					$(this).prop('disabled', true);
					$(this).html(btnHtml);
				});
			});
		</script>
	</body>
</html>