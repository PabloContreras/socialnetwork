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
Route::post('/logout', function(){
  Auth::logout();
  return redirect('/login');
});
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{id}', 'ProfileController@show');
Route::post('/{id}', 'ProfileController@updateAvatar');



Route::post('/', 'PostController@store');

Route::delete('/posts/{id}/eliminar_post', 'PostController@destroy');


Route::get('/posts/{id}', 'CommentsController@create');

Route::post('/posts/{id}', 'CommentsController@store');








Route::get('/posts/{post}/like', 'LikeController@likePost');

/*Route::group(['prefix' => 'cliente'], function () {
  Route::get('/login', 'ClienteAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ClienteAuth\LoginController@login');
  Route::post('/logout', 'ClienteAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ClienteAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ClienteAuth\RegisterController@register');

  Route::post('/password/email', 'ClienteAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ClienteAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ClienteAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ClienteAuth\ResetPasswordController@showResetForm');
});
*/
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');
  
  /*Route::post('/logout', function(){
    Auth::logout();
    return redirect('/admin/login');
  });*/

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
