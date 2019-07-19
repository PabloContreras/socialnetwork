
    <a href="{{ url('posts/' . $post->id . '/like') }}">
        <i class="fa fa-heart" aria-hidden="true"></i>
        {{ $post->likes->count() }}
    </a>
    
