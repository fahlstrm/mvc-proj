@include('header')

<div class="container">

    <div class="box left box-image">
        <img src="{{ asset('img/pexels-evie-shaffer-2748757.jpg')}} " alt="flower image">
        <a href="">Blogglista</a>
    </div>

    <div class="box middle">
        @if ($user)
        <a href="{{ url('/create_post') }}">Nytt inlägg</a>
        @else 
        <a href="{{ url('/create_blog') }}">Ny blogg</a>
        @endif
    </div>


    <div class="box right box-image">
        <img src="{{ asset('img/maria_ovchinnikova_7558442.jpg')}} " alt="flower image">
        <a href="">Senaste inlägg</a>
    </div>

</div>


@include('footer')

