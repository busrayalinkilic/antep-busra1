<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjeController;
use App\Exports\ProductExports;
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
/*
Route::get('/', function () {
    return view('layouts.master');
});
*/
Route::get('/', [\App\Http\Controllers\ProjeController::class, 'index']);
//Route::view('/', 'layouts.master');


Route::get('/hakkimda', [\App\Http\Controllers\HomeController::class, 'hakkimda']);
Route::get('/urunler', [\App\Http\Controllers\HomeController::class, 'urunler']);
Route::get('/satis', [\App\Http\Controllers\HomeController::class, 'satis']);

/**
 * product işlemleri
 */
//Route::get('/create-product', 'ProductController@create')->name('product.create');
//Route::post('/save-product','ProductController@store')->name('product.save');
//Route::get('/show-products','ProductController@index')->name('product.index');
Route::get('/export-products','ProductController@export')->name('product.export');



//Slider işlemleri
Route::get('/show-sliders','SliderController@index')->name('slider.index');
Route::get('/delete-slider/{id}','SliderController@destroy')->name('delete.slider')->where(array('id' => '[0-9]+'));


// kategori işlemleri
Route::get('upload-categories', 'CategoryController@upload')->name('category.upload');
Route::post('/import-categories','CategoryController@import')->name('category.import');





