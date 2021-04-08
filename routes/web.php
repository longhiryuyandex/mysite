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

Route::prefix('admin')->group(function(){
    Route::resource('products', 'product\ProductController');
    Route::post('products/ajax', 'product\ProductController@active_feature')->name('ajax-update');
    Route::post('products/quick-view', 'product\ProductController@quick_view')->name('quick-view');
    Route::post('products/search', 'product\ProductController@search')->name('product-search');
});

Route::get('test', function()
{
    $img = Image::make('images/image.jpg')->resize(300, 200);
    return $img->response('jpg');
});
