<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
	public function admindatos(){
        $admin = Admin::find( auth()->id());
        return view('admin.adminPerfil', compact('admin'));
    }

    public function update(Request $Request){
       $admin = Admin::find(auth()->id());
       $admin->name  = $Request->nombre;
       $admin->email = $Request->correo;
       $admin->password = bcrypt($Request->password);
       $admin->save();
       return back();
    }


     public function showFormForAdmin(){
      return view ('admin.crearAdmin');
    }

    public function altaAdmins(Request $r)
      {
        $admin = new Admin([
          'name' => $r->nombre,
          'email' => $r->correo,
          'password' => bcrypt($r->contraseña),
        ]);
        $admin->save();

          return back();
      }

	public function formularioCliente()
    {
      return view('admin.formularioCliente');
    }
}
