@include('header')

<div class="container">
    <div class="list">
        @if ($posts)

        @foreach ($posts as $post) 
            <a href="#{{ $post->title }} "> {{ $post->title }} </a>
        @endforeach
        @endif
    </div>
    {{ session('blog')}}
    <div class="content">
        @if ($posts)
        @foreach ($posts as $post) 
            <a id="{{$post->title }}"><h2> {{ $post->title }} </h2></a>
            <p> {{ $post->post }} </p>
            <h6> Postat: {{ $post->created_at }} </h6>
            @if ( session('blog') == collect(request()->segments())->last())
                <a href="{{ url('/change_post') }}">Ändra</a>
                <a href="{{ url('/remove_post/'.$post->id) }}">Ta bort</a>
            @endif
            <br>
        @endforeach
        @else 
            <p>Inga postade inlägg... än!</p>
        @endif
    </div>
</div>

@include('footer')
