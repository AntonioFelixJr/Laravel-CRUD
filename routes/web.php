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


Route::prefix('categorias')->group(function(){

	Route::post('/', 'ControladorCategoria@store')->name('store.categoria');

	Route::post('/{id}', 'ControladorCategoria@update')->name('atualizar.categoria');

	Route::get('/', 'ControladorCategoria@index')->name('listar.categoria');
	
	Route::get('/criar', 'ControladorCategoria@create')->name('criar.categoria');

	Route::get('/excluir/{id}', 'ControladorCategoria@destroy')->name('excluir.categoria');

	Route::get('/editar/{id}', 'ControladorCategoria@edit')->name('editar.categoria');

});

Route::prefix('produtos')->group(function(){
	
	Route::post('/', 'ControladorProduto@store')->name('store.produto');

	Route::post('/{id}', 'ControladorProduto@update')->name('atualizar.produto');

	Route::get('/', 'ControladorProduto@indexView')->name('listar.produto');

	Route::get('/criar', 'ControladorProduto@create')->name('criar.produto');

	Route::get('/excluir/{id}', 'ControladorProduto@destroy')->name('excluir.produto');

	Route::get('/editar/{id}', 'ControladorProduto@edit')->name('editar.produto');





});




