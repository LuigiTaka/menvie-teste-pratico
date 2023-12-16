<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('pessoas', \App\Http\Controllers\PessoaController::class);

/*
Route::get("/pessoas/{id}", function ( $id ) {
    $controller = new \App\Http\Controllers\PessoaController();
    return  $controller->show( Route::getCurrentRequest(),$id );
});
Route::get("/pessoas", [\App\Http\Controllers\PessoaController::class,"index"]);

Route::post("/pessoas",[\App\Http\Controllers\PessoaController::class,"store"]);
Route::put("/pessoas",[\App\Http\Controllers\PessoaController::class,"update"]);
*/
