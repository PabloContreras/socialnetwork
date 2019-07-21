	@extends('admin.layout.main')
  @section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar usuario</h4>
            </div>
            <div class="card-body">
              <form method="post" action="{{'/admin/usuarios/'.$usuario->id.'/update'}}">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" name="nombre"  value="{{$usuario->name}}" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Correo</label>
                      <input type="email" value="{{$usuario->email}}" name="correo" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Password</label>
                      <input type="password" value="{{$usuario->password}}" name="password" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" value="{{$usuario->username}}" name="username" class="form-control">
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Actualizar información </button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection