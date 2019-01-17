<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::get('/produtos', 'ControladorProduto@index')->name('listar.produtos');
Route::get('/categorias', 'ControladorCategoria@index')->name('listar.categorias');

Route::prefix('categorias')->group(function(){

	Route::get('/', 'ControladorCategoria@index')->name('listar.categorias');

	Route::post('/', 'ControladorCategoria@store')->name('store.categorias');

	Route::post('/{id}', 'ControladorCategoria@update')->name('atualizar.categoria');
	
	Route::get('/novo', 'ControladorCategoria@create')->name('criar.categoria');

	Route::get('/excluir/{id}', 'ControladorCategoria@destroy')->name('excluir.categoria');

	Route::get('/editar/{id}', 'ControladorCategoria@edit')->name('editar.categoria');




});
