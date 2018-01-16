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


use Illuminate\Support\Facades\Input;
use App\Article;


Route::get('/', 'WelcomeController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('login', 'LoginController@home');

Route::get('articles/userArticles', 'ArticlesController@userArticles');

Route::post('search', 'ArticlesController@search');
// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', 'ArticlesController@create');
// Route::post('articles/store', 'ArticlesController@store');
// Route::get('articles/{id}', 'ArticlesController@show');

Route::resource('articles', 'ArticlesController');



/*
Route::controllers([

    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
*/


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
