@include('header')

<div class="container">

    <div class="form">
        <h2>Är du säker på att du vill ta bort inlägget?</h2>
        <p> {{ $post->title }} </p>

        <form method="POST" action="{{ url('/remove_post/'.$post->id ) }}">
            @csrf
            <hidden name="blog" value="{{ session('blog') }}">
            <button type="submit" value="Submit">Ta bort</button>
        </form>
    </div>
</div>

@include('footer')
