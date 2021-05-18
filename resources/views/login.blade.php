@include('header')


<div class="container">
    <div class="form">
        <form method="POST" action="{{ url('/login/{user}') }}">
            @csrf
            <label for="user">Användarnamn</label>
            <input type="text" name="user" required>          
            <label for="password">Lösenord</label>
            <input type="password" name="password" required>          
            <button type="submit" value="Submit">Logga in</button>
        </form>
    </div>
</div>

@include('footer')

