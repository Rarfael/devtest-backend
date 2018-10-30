<?php

use Illuminate\Http\Request;

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

Route::get('/', function(){
    return response()->json(['message' => 'API working', 'status' => 'Connected']);
});
/** The resource method automaticaly create all the basic routes
 *  POST      api/products                 products.store    App\Http\Controllers\ProductsController@store    api          
 *  GETHEAD   api/products/create          products.create   App\Http\Controllers\ProductsController@create   api          
 *  GETHEAD   api/products/{product}       products.show     App\Http\Controllers\ProductsController@show     api          
 *  PUTPATCH  api/products/{product}       products.update   App\Http\Controllers\ProductsController@update   api          
 *  DELETE    api/products/{product}       products.destroy  App\Http\Controllers\ProductsController@destroy  api 
 */
Route::resource('products', 'ProductsController');
