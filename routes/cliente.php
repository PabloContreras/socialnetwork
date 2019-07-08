<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('cliente')->user();

    //dd($users);

    return view('cliente.home');
})->name('home');

/*Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{id}', 'ProfileController@show');
Route::post('/{id}', 'ProfileController@updateAvatar');



Route::post('/posts', 'PostController@store');

Route::delete('/posts/{post}', 'PostController@destroy');


Route::get('/posts/{id}', 'CommentsController@create');

Route::post('/posts/{id}', 'CommentsController@store');*/