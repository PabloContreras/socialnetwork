@extends('admin.layout.main')
@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Editar Información</h4>
                </div>
                <div class="card-body">
                  <form  method="POST" action="{{ '/admin/'.$admin->id.'/update'}}">
                    @csrf
                      @method('put')
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre Completo</label>
                          <input type="text" name="nombre" value="{{$admin->name}}" class="form-control" >
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo</label>
                          <input type="email" name="correo" value="{{$admin->email}}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contraseña</label>
                          <input type="password" name="password" value="{{$admin->password}}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Actualizar Información</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     @endsection