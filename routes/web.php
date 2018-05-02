<?php


Route::get('/', function () {
	$photos = \App\Photo::take(4)->get();
    return view('welcome', compact('photos'));

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
Route::delete('/tasks/{task}', 'TaskController@destroy');
Route::get('/tasks/{task}', 'TaskController@show');
Route::post('/tasks/{task}/notes', 'NotesController@store');

//Route::post('/tasks/{task}/edit', 'TaskController@edit');

Route::patch('/tasks/{task}', 'TaskController@update');

Route::get('/tasks/tags/{tag}','TagController@index');

Route::get('/contact', 'ContactController@create');
Route::post('/contact', 'ContactController@sendEmail');

Route::get('/gallery', 'PhotoController@create');
Route::get('/gallery/manage', 'PhotoController@index');
Route::post('/gallery', 'PhotoController@store');
Route::delete('/gallery/{photo}', 'PhotoController@destroy');

Route::get('/tags','TagController@create');
Route::post('/tags','TagController@store');

Route::get('auth/github', 'Auth\LoginController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\LoginController@handleProviderCallback');
