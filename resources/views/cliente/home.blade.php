@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('cliente.partials.profile')
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
                                                <a href="{{ url('/'.$user->username) }}">
                                                    <img class="media-object" src="uploads/avatars/{{ $user->avatar }}" alt="avatar" style="width: 64px; height: 64px;">
                                                </a>
                                            </div>
                                            <div class="col-md-10" >
                                                <form method="POST" action=" {{ '/cliente/posts' }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                                        <textarea name="body" class="form-control" rows="3" placeholder="¿En qué estás pensando?" required autofocus style="width: 100%">{{ old('body') }}</textarea>

                                                        @if ($errors->has('body'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('body') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <input type="submit" class="pull-right btn btn-primary" />
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
                @include('cliente.partials.feed')
            </div>
        </div>
    </div>
@endsection
