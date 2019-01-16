@extends('layout.app', ['current' => 'categoria'])

@section('titulo','Categorias')


@section('body')
	<div class="card border">
		<div class="card-body">
			<h5 class="card-title">Cadastro de Categorias</h5>
			
	@if(count($categorias) > 0)
			<table class="table table-ordered table-hover">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categorias as $cat)
						<tr>
							<td>{{$cat->id}}</td>
							<td>{{$cat->nome}}</td>
							<td>
								<a href="/edita" class="btn btn-sm btn-primary">Editar</a>
								<a href="{{ route('excluir.categoria',['id' => $cat->id]) }}" class="btn btn-sm btn-danger">Apagar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	@else
		<h1 class="text-center">Nenhuma categoria registrada.</h1>
	@endif
		</div>
		<div class="card-footer">
			<a href="{{route('criar.categoria')}}" class="btn btn-sm 
			btn-primary" role="button">Criar categoria</a>
		</div>
	</div>
@endsection
