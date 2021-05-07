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

Route::namespace('Api')->group(function () {
    Route::post('/get-three', 'ProductsController@three');
    Route::post('/get-one', 'ProductsController@one');
    Route::post('/get', 'ProductsController@catalog');
    Route::post('/getSort', 'ProductsController@catalogSort');
    Route::post('/getSortb', 'ProductsController@catalogSortb');
    Route::post('/menu', 'MenuController@getMenu');
    Route::post('/search', 'ProductsController@search');
});
