@extends('layout.app', ['current' => 'categoria'])

@section('titulo','Editar Categoria')


@section('body')
	<h1>Página de edição de categorias</h1>

<div class="card border">
	<div class="card-body">
		<form action="{{ route('atualizar.categoria', ['id' => $categorias->id ]) }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="nomeCategoria">Nome da Categoria</label>
				<input type="text" class="form-control" name="nomeCategoria"
				 id="nomeCategoria" placeholder="Categoria" value="{{ $categorias->nome }}">
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Salvar</button>			
			<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>			
		</form>
	</div>
</div>
@endsection
