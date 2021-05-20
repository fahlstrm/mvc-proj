@include('header')

<div class="container">
    <div class="list">
        @foreach ($posts as $post) 
            <a href="#{{ $post->title }} "> {{ $post->title }} </a>
        @endforeach
    </div>

    <div class="content">
        @if ($posts)
        @foreach ($posts as $post) 
            <a id="{{$post->title }}"><h2> {{ $post->title }} </h2></a>
            <p> {{ $post->post }} </p>
            <h6> Postat: {{ $post->created_at }} </h6>

            <br>
        @endforeach
        @else 
        <p>Inga postade inlägg... än!</p>
        @endif
    </div>
</div>

@include('footer')
