@extends('layout.principal')

@section('conteudo')
	<div class="card my-3">
		<div class="card-body">
			<h5 class="card-title pb-3">Cadastro de Cidade</h5>
			<form method="post" action="{{ url('create') }}">
				@csrf
				<div class="form-group">
					<input type="input" name="cidade" class="form-control" id="cidadeInput" placeholder="Nome da cidade" required>
					<small id="cidadeHelp" class="form-text text-muted">Informe o nome completo da cidade sem abreviações.</small>
				</div>
				<button type="submit" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
			</form>
		</div>
	</div>

	<div class="card my-3">
		<div class="card-body">
			<h5 class="card-title">Cidade Cadastradas</h5>
			<h6 class="card-subtitle pb-4 text-muted">Clique na cidade para acessar os detalhes</h6>
			
			@forelse ($cidades as $letra => $arrCidade)
				<div class="row">
					<div class="col-12">
						<h3>{{ $letra }}</h3>
					</div>
				</div>
				<div class="row pb-3">
					@foreach ($arrCidade as $cidade)
						<div class="col-12 col-sm-4 col-lg-2">
							<a href="{{ url('show/'.$cidade->id) }}">{{ $cidade->nome }}</a>
						</div>
					@endforeach
				</div>
			@empty
				<h6 class="card-subtitle mb-2 text-muted">Nenhuma cidade cadastrada.</h6>
			@endforelse
		</div>
	</div>
@endsection