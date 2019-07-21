<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    //
    public function indexforadmin(){
    	$titulo = 'usuarios';
    	$usuarios = User::all();
    	return view('admin.usuarios.usuarios', compact('usuarios'));
    }
     public function altaUsuario(Request $r)
    {
      $usuario = new User([
        'name' => $r->nombre,
        'email' => $r->correo,
        'password'=>bcrypt($r->pasword),
        'username'=>$r->username,
      ]);
      $usuario->save();

        return back();
    }

    public function destroyUsuarioForAdmin($id){
        $usuario = User::find($id);
        $usuario->delete();
    	return back();
    }

    public function showFormForUser($id){
        $usuario = User::find($id);
        return view('admin.editarUsuario',compact('usuario'));

    }

    public function usuarioUpdate(Request $Request,$id){
       $usuario = User::find($id);
       $usuario->name  = $Request->nombre;
       $usuario->email=$Request->correo;
	   $usuario->password=bcrypt($Request->password);
	   $usuario->username=$Request->username;
       $usuario->save();
       return back();
    }

    public function verUsuario($id){
        $usuario = User::find($id);
        return view('admin.verUsuario',compact('usuario'));
    }
}
