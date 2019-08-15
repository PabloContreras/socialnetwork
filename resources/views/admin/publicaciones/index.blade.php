@extends('admin.layout.main')

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Publicaciones</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">

                        <th>
                          Usuario
                        </th>
                        <th>
                          Contenido
                        </th>
                        <th>
                          Creación
                        </th>
                        <th>
                          Estado
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                        @foreach($publicaciones as $post)
                          <tr>
                             <td >
                               {{ $post->user->name }}
                             </td>
                            <td >
                              {{ $post->body }}
                            </td>
                            <td>
                              {{ $post->created_at->diffForHumans() }}
                            </td>
                            <td>
                              @if($post->activo === 1)
                                Autorizado
                              @else
                                No autorizado
                              @endif 
                            </td>

                            <td>
                              <form action="{{ '/admin/publicaciones/'.$post->id.'/eliminar' }}" method="post" >
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <button type="submit" rel="tooltip" title="Eliminar publicación" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">remove</i>
                              </button>
                              </form>
                            </td>
                            <td>
                                <a href="{{url('/admin/publicaciones/'.$post->id.'/ver')}}" rel="tooltip" title="Ver publicación" class="btn btn-success" style="background-color: transparent; border: none; color: #9c27b0;">
                                  <i class="material-icons">remove_red_eye</i>
                                </a>
                            </td>
                            <td>
                              @if($post->activo === 0)
                                  <form method="post" action="{{url('/admin/publicaciones/'.$post->id.'/aprobar')}}">
                                  {{ csrf_field() }}
                                      <button type="submit" rel="tooltip" title="Aprobar publiación" class="btn btn-success" style="background-color: transparent; border: none; color: #9c27b0;">
                                        <i class="material-icons">done</i>
                                      </button>
                                  </form>
                              @else
                                  <form method="post" action="{{url('/admin/publicaciones/'.$post->id.'/desaprobar')}}">
                                  {{ csrf_field() }}
                                      <button type="submit" rel="tooltip" title="Desaprobar publiación" class="btn btn-success" style="background-color: transparent; border: none; color: #9c27b0;">
                                        <i class="material-icons">clear</i>
                                      </button>
                                  </form>
                              @endif
                            </td>
                         </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     @endsection
     {{-- -> --}}