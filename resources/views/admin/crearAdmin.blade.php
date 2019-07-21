
@extends('admin.layout.main')
@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Alta de administrador</h4>
                </div>
                <div class="card-body">
                  <form method="post" action={{url('admin/alta-admins')}} >
                    @csrf
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre completo</label>
                          <input type="text" name="nombre" class="form-control" >
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo</label>
                          <input type="email" name="correo" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contraseña</label>
                          <input type="password" name="contraseña" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Agregar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     @endsection