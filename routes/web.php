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
Auth::routes();

Route::get('/', 'HomeController@index');

Route::middleware(['auth'])->group(function () {
    Route::resource('article', 'ArticleController');
    Route::prefix('article')->group(function () {
        Route::get('/create', 'ArticleController@create');
        Route::get('/{id}', 'ArticleController@show');
    });
    Route::prefix('comment')->group(function () {
        Route::post('/', 'CommentController@store');
    });


});
