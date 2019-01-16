@extends('layout.app', ['current' => 'homepage'])

@section('titulo','Página Inical')


@section('body')
<div class="jumbotron bg-light border border-secondary">
	<div class="row">
		<dir class="card-deck col-12">
			<div class="card border border-primary col-6">
				<div class="card-body">
					<h5 class="card-title">Cadastro de Produtos</h5>
					<p class="card-text">
						Aqui será a área de cadastro dos produtos.
						Só não esqueça de cadastrar previamente as caegorias.
					</p>
					<a href="produtos.cadastro" class="btn btn-primary">Cadastre seus produtos</a>
				</div>	
			</div>				
			<div class="card border border-primary col-6">
				<div class="card-body">
					<h5 class="card-title">Cadastro de Categorias</h5>
					<p class="card-text">
						Aqui será a área de cadastro das categorias dos produtos.
					</p>
					<a href="categorias.cadastro" class="btn btn-primary">Cadastre suas categorias</a>
				</div>	
			</div>
		</dir>
	</div>
</div>
@endsection
