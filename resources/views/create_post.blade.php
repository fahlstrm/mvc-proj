@include('header')

<div class="container">
    <div class="form post">
        <form method="POST" action="{{ url('/create_post') }}">
            @csrf
            <label for="title">Rubrik:</label>
            <input type="text" id="title" name="title">          
            <textarea name="post"> </textarea>
            <hidden name="blog" value="{{ session('blog') }}">
            <button type="submit" value="Submit">Posta inlägg</button>
        </form>
    </div>
</div>


@include('footer')
