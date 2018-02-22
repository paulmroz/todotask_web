<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function(){
	auth()->logout();
	return redirect('/');
})->middleware('auth');


Route::get('/tasks','TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/{task}', 'TaskController@show');
Route::post('/tasks/{task}/notes', 'NotesController@store');

Route::get('/contact', 'ContactController@create');
Route::post('/contact', 'ContactController@sendEmail');

Route::get('/gallery', 'PhotoController@create');
Route::post('/gallery', 'PhotoController@store');
