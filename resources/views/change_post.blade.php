@include('header')

<div class="container">
    <div class="form post">
        <form method="POST" action="{{ url('/change_post/'. $post->id) }}">
            @csrf
            <label for="title">Rubrik:</label>
            <input type="text" id="title" name="title" value="{{$post->title}}">          
            <textarea name="post"> {{ $post->post }} </textarea>
            <hidden name="blog" value="{{ session('blog') }}">
            <button type="submit" value="Submit">Publicera om</button>
        </form>
    </div>
</div>

@include('footer')
