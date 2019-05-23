@extends('layout.principal')

@section('conteudo')
	<h2 class="pb-3">
		{{ $cidade->nome }}&nbsp;
		<button type="button" class="btn btn-secondary" id="btnVoltar">Voltar</button>
	</h2>

	@forelse ($detalhes['list'] as $key => $detalhe)
		@if ($loop->first)
			<div class="row justify-content-md-center">
		@endif
		<div class="col-12 col-sm-6 col-lg-4 my-3">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title pb-3">
						#{{ $key+1 }} - {{ \Carbon\Carbon::createFromTimestamp($detalhe['dt'])->setTimezone('America/Sao_Paulo')->format('d/m/Y H') }}h
					</h5>
					<h6 class="card-subtitle mb-3 text-muted">
						<img src="http://openweathermap.org/img/w/{{ $detalhe['weather'][0]['icon'] }}.png">&nbsp;{{ ucfirst($detalhe['weather'][0]['description']) }}
					</h6>
					<p class="card-text">
						Temperatura: <strong>{{ $detalhe['main']['temp'] }}&deg; C</strong><br />
						Umidade: <strong>{{ $detalhe['main']['humidity'] }}%</strong><br />
						Nebulosidade: <strong>{{ $detalhe['clouds']['all'] }}%</strong>
					</p>

				</div>
			</div>
		</div>
		@if ($loop->last)
			</div>
		@endif
	@empty
		<h6 class="mb-2 text-muted">Nenhum detalhe encontrado para a cidade.</h6>
	@endforelse
	
	<script>
		$('#btnVoltar').on('click', function() {
			location.href = '{{ url('/') }}';
		});
	</script>
@endsection