@include('header')

<div class="container">
    <div class="form">
        <form method="POST" action="{{ url('/create_blog') }}">
            @csrf
            <label for="blog">Bloggens namn</label>
            <input type="text" name="blog" required>
            <label for="header">Bloggens header</label>
            <input type="text" name="header" required>
            <label for="user">Användarnamn</label>
            <input type="text" name="user" required>
            <label for="password">Lösenord</label>
            <input type="password" name="password" required>          
            <button type="submit" value="Submit">Skapa</button>
        </form>
    </div>
</div>



@include('footer')

