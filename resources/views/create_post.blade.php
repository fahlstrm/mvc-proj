@include('header')

<div class="container">
    <div class="form post">
        <form method="POST" action="{{ url('/create_post') }}">
            <label for="title">Rubrik:</label>
            <input type="text" id="title" name="title">          
            <textarea name="content"> </textarea>
            <button type="submit" value="Submit">Posta inlägg</button>
        </form>
    </div>
</div>


@include('footer')
