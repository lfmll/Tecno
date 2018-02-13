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
    return view('welcome');
});

Auth::routes();
Route::get('producto/images/{filename}',function($filename){
    $path=public_path("images/$filename");
    if(!\File::exists($path)) abort(404);
    $file=\File::get($path);
    $type=\File::mimeType($path);
    $response=Response::make($file,200);
    $response->header("Content-Type",$type);
    return $response;
});
Route::get('/home', 'HomeController@index');
Route::resource('categoria','CategoriaController');
Route::resource('marca','MarcaController');
Route::resource('proveedora','ProveedoraController');
Route::resource('producto','ProductoController');
Route::resource('ingreso','IngresoController');