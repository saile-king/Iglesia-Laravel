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

Route::get('/', 'PageController@index');

Route::resource('miembros', 'MiembrosController');
Route::get('/json-municipios','MiembrosController@municipios');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ofrendas', 'OfrendasController')->middleware('auth');
Route::resource('aportes', 'AportesController');
Route::resource('gastos', 'GastosController');
Route::resource('concepto', 'ConceptoController');

Route::get('aportespdf',['as'=>'aportespdf','uses'=>'PdfController@aportepdf']);
Route::get('gastospdf',['as'=>'gastospdf','uses'=>'PdfController@gastopdf']);


Route::get('/totales',['as'=>'total','uses'=>'PageController@totales']);
Route::get('diezmopdf',['as'=>'diezmospdf','uses'=>'PdfController@diezmospdf']);

Route::get('/test','ChartDataController@getMonthlyOfrendaData');







