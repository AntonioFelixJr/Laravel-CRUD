@extends('layout.app', ['current' => 'produto'])

@section('titulo','Novo Produto')


@section('body')
	<h1>Página de criação de produtos</h1>

<div class="card border">
	<div class="card-body">
		<form action="{{ route('store.produto') }}" method="POST">
			@csrf
			<div class="row">			
				<div class="form-group col-4">
					<label for="nomeProduto">Nome do produto:</label>
				 	<input type="text" class="form-control" name="nomeProduto"
					 id="nomeProduto" placeholder="Produto">
				</div>
				<div class="form-group col-2">
					<label for="estoqueProduto">Estoque do produto:</label>
					<input type="text" class="form-control" name="estoqueProduto"
					 id="estoqueProduto" placeholder="Quantidade">
					
				</div>
				<div class="form-group col-2">
					<label for="precoProduto">Estoque do produto:</label>
					<input type="text" class="form-control" name="precoProduto"
					 id="precoProduto" placeholder="Preço">
					
				</div>
				<div class="form-group col-4">

					<label for="selecioneCategoria"> Categoria do produto:</label>
					<select class="form-control" id="selecaoCategoria" name="idCategoria">
     					<option value="selecioneCategoria" id="0">Selecione uma categoria</option>
	@foreach($categorias as $cat)
     					<option value="{{$cat->id}}" id="{{$cat->id}}">{{$cat->nome}}</option>
			
	@endforeach
					</select>
				
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Salvar</button>			
			<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>			
		</form>
	</div>
</div>
@endsection
