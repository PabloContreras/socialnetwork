<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');
Route::get ('/perfilAdmin','adminController@admindatos');
Route::put('/{id}/update','adminController@update');
Route::get('/showForm/admin', 'adminController@showFormForAdmin');
Route::post('/alta-admins', array(

    'as'=>'altaAdmins',
    'uses'=>'adminController@altaAdmins'
));

Route::get('/usuarios','usuariosController@indexforadmin');



Route::get('/crear/cliente','adminController@formularioCliente');
Route::post('/alta-clientes',array(
    'as'=>'altaClientes',
    'uses'=>'usuariosController@altaUsuario'
));

Route::delete('/usuarios/{id}/eliminar','usuariosController@destroyUsuarioForAdmin');
Route::get('/usuarios/{id}/actualizar', 'usuariosController@showFormForUser');
Route::put('/usuarios/{id}/update', 'usuariosController@usuarioUpdate');

Route::post('/usuarios/{id}/ver','usuariosController@verUsuario');





