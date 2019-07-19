<br><br>
<div class="panel panel-default">
    <div class="panel-body infinite-scroll">
        <div class="row">
            @foreach($posts as $post) 
                <div class="col-md-12">              
                <div class="card border-primary mb-3" >
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
                        <p class="card-text"> <h2><a href="{{ url('posts/'.$post->id) }}"> {!! $post->body !!} </a></h2></p>
                        @if( $post->image != 'null')
                            <center><img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/posts/{{ $post->image }}" alt="avatar" style="width: 50%; height: 50%;"></center>
                        @endif
                    </div>
                    <div class="card-footer">
                       @include('auth.partials.like')
                    </div>
                </div>
                </div> 
            @endforeach
            {{ $posts->links() }}
        </div>
            
    </div>
</div>
