@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('auth.partials.profile')
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body infinite-scroll">
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
                                                    <input type="submit" class="pull-right btn btn-primary" style="background-color: #CBAB7A; border-color: #CBAB7A;"/>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>                
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {{--@include('auth.partials.feed')--}}
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-body infinite-scroll">
                        <div class="row">
                            @if( isset($posts) )
                                 @foreach($posts as $post) 
                                    <div class="col-md-12">              
                                        <div class="card border-success mb-3" >
                                            <div class="card-header">
                                                <a href="{{url($post->user_id) }}">
                                                    {{ $post->user->name }} <small> {{ '@' . $post->user->username }} </small>
                                                </a>
                                                <small> &bull; {{ $post->created_at->diffForHumans() }} </small>
                                            </div>
                                            <div class="card-body">
                                                <div class="pull-left">
                                                    <a href="{{ url('/'.$post->user->id) }}">
                                                        <img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/avatars/{{ $post->user->avatar }}" alt="avatar" style="width: 64px; height: 64px;">
                                                    </a>
                                                </div>
                                                <p class="card-text"> <h2><a href="{{ url('posts/'.$post->id) }}"> {!! $post->body !!} </a></h2></p>
                                            </div>
                                            @if( $post->image != 'null')
                                                <center><img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/posts/{{ $post->image }}" alt="avatar" style="width: 50%; height: 50%;"></center>
                                            @endif
                                            <div class="card-footer">
                                               @include('auth.partials.like')
                                            </div>
                                        </div>
                                    </div> 
                                @endforeach
                                {{ $posts->links() }}
                            @endif
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
