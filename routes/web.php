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

Route::get('posts', 'PostController@index');
Route::get('posts/create/{id}', 'PostController@create')->name('posts.create');
Route::post('posts/store', 'PostController@store')->name('posts.store');


Route::get('authors', 'AuthorController@index');
Route::get('authors/create', 'AuthorController@create');
Route::post('authors/store', 'AuthorController@store')->name('authors.store');

Route::get('comments', 'CommentController@index');
Route::get('comments/create/{id}', 'CommentController@create')->name('comments.create');
Route::post('comments/store', 'CommentController@store')->name('comments.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Relacionamentos*/

//One to one
Route::get('/one-to-one', 'HomeController@oneToOne')->name('relationship.onetoone');

//Relação one to many
Route::get('/one-to-many', 'HomeController@oneToMany')->name('relationship.onetomany');

//Relação one to many
Route::get('/many-to-many', 'HomeController@manyToMany')->name('relationship.manytomany');

//Relação têm muitos atravêz de
Route::get('/has-many-through', 'HomeController@hasManyThrough')->name('relationship.hasmanythrough');

//Relação polimorfica uno a uno
Route::get('/polymorphic-one-to-one', 'HomeController@polymorphicOneToOne')->name('polymorphic.onetoone');

//Relação polimorfica uno a muchos
Route::get('/polymorphic-one-to-many', 'HomeController@polymorphicOneToMany')->name('polymorphic.onetomany');

/*Scopos*/
Route::get('/get-scope', 'HomeController@getScope')->name('scope.getscope');



