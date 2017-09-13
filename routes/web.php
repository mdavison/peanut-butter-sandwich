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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('index');
});

// Pages.Words
Route::get('/typing', 'Pages\WordsController@index');
Route::get('/typing/pokemon/{word}', 'Pages\WordsController@show');

// Admin
Route::get('/admin/', 'Admin\AdminController@index');

// Admin.Words
//Route::get('/admin/words/', 'Admin\WordsController@index');
//Route::get('/admin/words/create', 'Admin\WordsController@create');
//Route::post('/admin/words', 'Admin\WordsController@store');
//Route::get('/admin/words/{word}', 'Admin\WordsController@show');
//Route::get('/admin/words/{word}/edit', 'Admin\WordsController@edit');
Route::resource('admin/words', 'Admin\WordsController');
Route::get('/admin/words/{word}/delete', 'Admin\WordsController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Email verification for new user registration
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirm'
]);