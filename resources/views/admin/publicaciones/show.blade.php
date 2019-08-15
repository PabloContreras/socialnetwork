@extends('admin.layout.main')

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Detalles de publicación de {{ $post->user->name }}</h4>
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
                         </tr>
                      </tbody>
                      @if( $post->image != 'null')
                      <footer>
                        <div class="col-md-12">              
                          <div class="card border-primary mb-3" >
                            <div class="card-body">
                              <center>
                                <img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/posts/{{ $post->image }}" alt="avatar" style="width: 50%; height: 50%;">
                              </center>
                            </div>
                          </div>
                        </div>
                      </footer>
                      @endif
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