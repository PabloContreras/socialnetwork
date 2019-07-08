<div class="panel panel-default">
    <div class="panel-body" style="margin-left: 10px;">
        <div class="card border-success mb-3" style="max-width: 20rem;">
            <div class="card-header">
                <center><img src="/uploads/avatars/{{ $user->avatar }}" class="img-responsive" alt="Responsive image"></center>
            </div>
            <div class="card-body">
                <h4 class="card-title"><p><strong>{{ $user->name }}</strong></p></h4>
                <ul class="list-group">
                    @if(Auth::user() == $user)                
                        <li class="list-group-item d-flex align-items-center">
                            <form action="{{ url('/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <center><label style="color: black;">Actualizar foto de perfil</label></center>
                                <input type="file" name="avatar" class="btn-block">
                                <input type="submit" value="Actualizar" class="pull-right btn btn-xs btn-default">
                            </form>
                        </li>
                    @endif
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/{{ $user->username }}">{{ '@' . $user->username }}</a>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fa fa-link" aria-hidden="true"></i> <a href="{{ $user->website }}">Website</a>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($user->birthday)->format('j F Y') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
