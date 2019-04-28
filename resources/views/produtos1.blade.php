@extends('layout.app', ['current' => 'produtos'])

@section('titulo','Produtos')


@section('body')
	<div class="card border">
		<div class="card-body">
			<h5 class="card-title">Cadastro de Produtos</h5>
			
	@if(count($data['produto']) > 0)
			<table class="table table-ordered table-hover">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Estoque</th>
						<th>Preço</th>
						<th>Categoria</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data['produto'] as $pro)
						<tr>
							<td>{{$pro->id}}</td>
							<td>{{$pro->nome}}</td>
							<td>{{$pro->estoque}}</td>
							<td>{{$pro->preco}}</td>
							<td>
							@foreach($data['categoria'] as $cat)

								{{  $cat['id'] == $pro['categoria_id'] ? $cat['nome'] : "" }}

							@endforeach
							</td>
							<td>
								<a href=" {{route('editar.produto', ['id' => $pro->id ])}} " class="btn btn-sm btn-primary">Editar</a>
								<a href="{{ route('excluir.produto',['id' => $pro->id ]) }}" class="btn btn-sm btn-danger">Apagar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	@else
		<h1 class="text-center">Nenhum produto registrado.</h1>
	@endif
		</div>
		<div class="card-footer">
			<a href="{{route('criar.produto')}}" class="btn btn-sm 
			btn-primary" role="button">Criar produto</a>
		</div>
	</div>
@endsection
