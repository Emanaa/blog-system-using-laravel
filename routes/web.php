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



Route::get('/listposts',"postController@show");


Route::get('/addpost', function () {
    return view('addpost');
});
Route::post("/addpost","postController@create");

Route::get("/post/{id}/{name}","postController@listfunc");

Route::get('/post/{id}',"postController@getIndexContent");

Route::post('/comment/{id}', "postController@addComment");
Route::post('/edit/{id}',"postController@edit");
Route::get('/delete/{id}',"postController@delete");

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/*Route::get('/', function () {
    return view('Home');
});*/
