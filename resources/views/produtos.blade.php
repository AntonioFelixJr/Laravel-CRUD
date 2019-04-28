@extends('layout.app', ['current' => 'produtos'])

@section('titulo','Produtos')


@section('body')
	<div class="card border">
		<div class="card-body">
			<h5 class="card-title">Cadastro de Produtos</h5>
			
			<table id="tabelaProdutos" class="table table-ordered table-hover">
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
					
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<button onClick="novoProduto()" class="btn btn-sm 
			btn-primary" role="button">Criar produto</button>
		</div>
	</div>

<div class="modal" tabindex="-1" role="dialog"	id="dlgProdutos">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" id="formProduto">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title">Novo Produto</h5>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" class="form-control">

					<div class="form-group">
						<label for="nomeProduto" class="control-label">Nome do Produto</label>
						<div class="input-group">
							<input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
						</div>
					</div>

					<div class="form-group">
						<label for="precoProduto" class="control-label">Preço do Produto</label>
						<div class="input-group">
							<input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto">
						</div>
					</div>
					<div class="form-group">
						<label for="qtdProduto" class="control-label">Quantidade do Produto</label>
						<div class="input-group">
							<input type="number" class="form-control" id="qtdProduto" placeholder="Quantidade do Produto">
						</div>
					</div>

					<div class="form-group">
						<label for="categoriaProduto" class="control-label">Categoria do Produto</label>
						<div class="input-group">
							<select class="form-control" id="categoriaProduto"></select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': "{{ csrf_token() }}"
		}
	});

	$('#formProduto').submit( function(event){
		event.preventDefault();
		criarProduto();
		$('#dlgProdutos').modal('hide');
	});

	function criarProduto(){
		prod = {
			nome: $("#nomeProduto").val(),
			preco: $("#precoProduto").val(),
			estoque: $("#qtdProduto").val(),
			categoria_id: $("#categoriaProduto").val()
		}
		$.post("{{ route('produtos.store') }}", prod, function(data){
			produto = JSON.parse(data);
			linha = montarLinha(produto);				
			$('#tabelaProdutos>tbody').append(linha);

		});
	}

	function excluir(id){

		$.ajax({
			type: "DELETE",
			url: "/api/produtos/" + id,
			context: this,
			success: function(){
				console.log('Apagou');
				linhas = $('#tabelaProdutos>tbody>tr');
				e = linhas.filter( function(i, elemento){
					return elemento.cells[0].textContent == id
				});
				if (e){
					e.remove();
				}


			},
			error: function(error){
				console.log(error);
			}
		});
	}

	function novoProduto(){
		$('#nomeProduto').val('');
		$('#precoProduto').val('');
		$('#qtdProduto').val('');
		$('#dlgProdutos').modal('show');	
	}

	function carregarCategorias(){
		$.getJSON("{{ route('api.categorias') }}", function(data){
			for(i = 0; i < data.length; i++ ){
				opcao = "<option value='" + data[i].id +"'>"+
				data[i].nome + "</option>";
				$('#categoriaProduto').append(opcao);
			}
		});
	}

	function carregarProdutos(){
		$.getJSON("{{ route('produtos.index') }}", function(produtos){
			for(i = 0; i < produtos.length; i++ ){
				 linha = montarLinha(produtos[i]);
				$('#tabelaProdutos>tbody').append(linha);
			}
		});
	}

	function montarLinha(produto){
			var linha = 
			"<tr> "+
				"<td>" + produto.id +"</td>"+
				"<td>" + produto.nome +"</td>"+
				"<td>" + produto.estoque +"</td>"+
				"<td>" + produto.preco +"</td>"+
				"<td>" + produto.categoria_id +"</td>"+
				"<td>" +
					"<button class='btn btn-sm btn-primary'"+ 
					" onClick='editar(" + produto.id + ")'>Editar</button>"+
					"<button class='btn btn-sm btn-danger'"+
					" onClick='excluir(" + produto.id + ")'>Apagar</button>"+
				"</td>" +
			"</tr>";
			return linha;
	}

	$(function(){
		carregarCategorias();
		carregarProdutos();
	});
</script>
@endsection