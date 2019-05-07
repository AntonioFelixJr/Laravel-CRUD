<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class ControladorProduto extends Controller
{
    public function index()
    {
        $prods = Produto::all();
        return $prods->toJson();
    }

    public function indexView()
    {
        $produto = Produto::all();
        $categoria = Categoria::all();
        $data = [
            'categoria' => $categoria,
            'produto' => $produto
        ];
        return view('produtos', ['data'=>$data]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('criar_produto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pro = new Produto();
        $pro->nome = $request->input('nome');
        $pro->estoque = $request->input('estoque');
        $pro->preco = $request->input('preco');
        $pro->categoria_id = $request->input('categoria_id');
        $pro->save();

        return $pro->toJson();

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Produto::find($id);
        if ( isset( $prod ) ) {
            return $prod;
        }
        return response('Produto Não encontrador',404);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::all();
        $produto = Produto::find($id);
        $data = [
            'categoria' => $categoria,
            'produto' => $produto
        ];
        return view('editar_produto', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        if (isset($produto)) {
            $produto->nome = $request->input('nome');
            $produto->estoque = $request->input('estoque');
            $produto->preco = $request->input('preco');
            $produto->categoria_id = $request->input('categoria_id');
            $produto->save();
            return $produto;
        }

        return response('Produto Não encontrador',404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Produto::find($id);
        if (isset($pro)) {
            $pro->delete();
            return response('OK',200);
        }

        return response('Produto Não encontrador',404);
    }
}
