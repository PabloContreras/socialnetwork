


 <div class="panel-body">
    <div class="row">
        <div class="col-md-12">              
            <div class="card border-success mb-3" >
                <div class="card-header">
                    <a href="{{ url($post->user->id) }}">
                        {{ $post->user->name }} <small> {{ '@' . $post->user->username }} </small>
                    </a>
                    <small> &bull; {{ $post->created_at->diffForHumans() }} </small>
                </div>
                <div class="card-body">
                    <div class="pull-left">
                        <a href="{{ url('/'.$post->user_id) }}">
                            <img class="media-object" src="/uploads/avatars/{{ $user->avatar }}" alt="avatar" style="width: 64px; height: 64px;">
                        </a>
                    </div>
                    <p class="card-text">
                       <h2><a href="{{ url('posts/'.$post->id) }}"> {!! $post->body !!} </a></h2>
                    </p>
                </div>
                <div class="card-footer">
                    @include('auth.partials.like')
                    <div class="pull-right">
                    @if(Auth::user()->id == $user->id)
                        <a href="{{ url('posts/' . $post->id) }}"
                           onclick="event.preventDefault();
                                    document.getElementById('delete-post-form').submit();">
                            <i class="pull-right fa fa-trash" aria-hidden="true"></i>
                        </a>

                        <form id="delete-post-form" action="{{ url('posts/' . $post->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    @endif
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-12">    
            @foreach( $comments as $comment )          
            <div class="card border-success mb-3" >
                <div class="card-header">
                    <a href="{{ url($comment->commenter_id) }}">
                        {{ $comment->username }} <small> {{ '@' . $comment->username }} </small>
                    </a>
                    <small> &bull; {{ $comment->created_at }} </small>
                </div>
                <div class="card-body">
                    <div class="pull-left">
                        <a href="{{ url('/'.$comment->commenter_id) }}">
                            <img class="media-object" src="/uploads/avatars/{{ $user->avatar }}" alt="avatar" style="width: 64px; height: 64px;">
                        </a>
                    </div>
                    <p class="card-text">
                       <h2><a href="{{ url('posts/'.$comment->post_id) }}"> {!! $comment->body !!} </a></h2>
                    </p>
                </div>
            </div>
            @endforeach
        </div> 
        <div class="col-md-12">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <div class="card-header">
                    <a href="{{ url(Auth::id()) }}">
                        {{ Auth::user()->name }} <small> {{ '@' . Auth::user()->username }} </small>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-2">
                        <a href="{{ url('/'.Auth::id()) }}">
                            <img class="media-object" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="avatar" style="width: 80px; height: 80px;">
                        </a>
                    </div>
                    <div class="col-md-10" >
                            <form method="POST" action=" {{ url('/posts/'.$post->id) }} ">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                    <textarea name="body" class="form-control" rows="3" placeholder="¿En qué estás pensando?" required autofocus style="width: 100%">{{ old('body') }}</textarea>

                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="submit" class="pull-right btn btn-primary" style="background-color: #CBAB7A; border-color: #CBAB7A;"/>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>    
