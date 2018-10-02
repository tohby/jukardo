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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/admin', 'AdminController@admin');
Route::group(['middleware' => 'auth','prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@admin');
    Route::resource('/portfolio', 'PortfoliosController');
    Route::resource('/messages', 'Messages');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'PagesController@index');
    Route::get('/work', 'PagesController@work');
    Route::get('/work/{id}', 'PagesController@workdetails');
    Route::get('/contact', 'PagesController@contact');
    Route::post('/contact', 'createMessage@send');
    Route::get('/services', 'PagesController@services')->name('services');
    Route::get('/about', 'PagesController@about')->name('about');
});