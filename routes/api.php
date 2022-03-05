<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Produtos
Route::get("produto", "ProdutoController@index");
Route::get("produto/{produto}", "ProdutoController@show");
Route::post("produto", "ProdutoController@store");
Route::patch("produto/{produto}", "ProdutoController@update");
Route::delete("produto/{produto}", "ProdutoController@delete");

//loja

// Loja
Route::get("loja", "LojaController@index");
Route::get("loja/{loja}", "LojaController@show");
Route::post("loja", "LojaController@store");
Route::patch("loja/{loja}", "LojaController@update");
Route::delete("loja/{loja}", "LojaController@delete");