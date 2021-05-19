@include('header')


<div class="container">

    <div class="form">
        @if ( $message ) 
        <p class="error"> {{ $message }}  </p>
        @endif
        <form method="POST" action="{{ url('/login/{user}') }}">
            @csrf
            <label for="username">Användarnamn</label>
            <input type="text" name="username" required>          
            <label for="password">Lösenord</label>
            <input type="password" name="password" required>          
            <button type="submit" value="Submit">Logga in</button>
        </form>
    </div>
</div>

@include('footer')

