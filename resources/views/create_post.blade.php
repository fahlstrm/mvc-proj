@include('header')

<div class="container">
    <div class="several-images">
        <img src="{{ asset('img/pexels-harry-cooke-6195002.jpg')}} " alt="flower image">
        <img src="{{ asset('img/pexels-harry-cooke-6195002.jpg')}} " alt="flower image">

    </div>
    <div class="form">
        <form method="POST" action="">
        <label for="title">Rubrik:</label>
            <input type="text" id="title" name="title">          
            <label for="content">Inlägg:</label>
            <textarea name="content">
            </textarea>
        </form>
    </div>
</div>


@include('footer')
