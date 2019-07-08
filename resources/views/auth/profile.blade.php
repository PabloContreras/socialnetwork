@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('auth.partials.profile')
            </div>
            <div class="col-md-8">
                @include('auth.partials.posts')
            </div>
        </div>
    </div>
@endsection
