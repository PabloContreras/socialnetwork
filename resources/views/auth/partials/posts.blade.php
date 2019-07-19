<div class="panel panel-default">
    @if(Auth::id() == $user->id)
        <div class="panel-heading">
            <div class="col-md-12">
                <div class="card border-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 pull-left">
                                <a href="{{ url('/'.$user->id) }}">
                                    <img class="media-object" src="uploads/avatars/{{ $user->avatar }}" alt="avatar" style="width: 64px; height: 64px;">
                                </a>
                            </div>
                            <div class="col-md-10" >
                                <form method="POST" action=" {{ url('/') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                        <textarea name="body" class="form-control" rows="3" placeholder="¿En qué estás pensando?" required autofocus style="width: 100%">{{ old('body') }}</textarea>

                                        @if ($errors->has('body'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('body') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <input type="file" name="image" style="color: black;">
                                    </div>
                                    <input type="submit" class="pull-right btn btn-primary" style="background-color: #CBAB7A; border-color: #CBAB7A;" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    @endif
    <br><br>
    <div class="panel-body">
        @if( $user->posts()->latest()->get() )
        @foreach($user->posts()->latest()->get() as $post)
            <div class="row">
                <div class="col-md-12">              
                    <div class="card border-success mb-3" >
                        <div class="card-header">
                            <a href="{{ url($post->user->id) }}">
                                {{ $post->user->name }} <small> {{ '@' . $post->user->username }} </small>
                            </a>
                            <small style="color: black;"> &bull; {{ $post->created_at->diffForHumans() }} </small>
                        </div>
                        <div class="card-body">
                            <div class="pull-left">
                                <a href="{{ url('/'.$post->user->id) }}">
                                    <img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/avatars/{{ $post->user->avatar }}" alt="avatar" style="width: 64px; height: 64px;">
                                </a>
                            </div>
                            <p class="card-text">
                                <h2><a href="{{ url('posts/'.$post->id) }}"> {!! $post->body !!} </a></h2>
                            </p>
                            @if( $post->image != 'null')
                                <center><img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/posts/{{ $post->image }}" alt="avatar" style="width: 50%; height: 50%;"></center>
                            @endif
                        </div>
                        <div class="card-footer">
                            @include('auth.partials.like')
                            <div class="pull-right">
                            @if(Auth::user()->id == $post->user->id)
                                <form action="{{'/posts/'.$post->id.'/eliminar_post'}}" method="post">
                                  {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                      <button type="submit" style="background: none; border: none;">
                                        <i class="pull-right fa fa-trash"></i> 
                                      </button> 
                                </form>
                            @endif
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        @endforeach
        @endif
    </div>    
</div>

