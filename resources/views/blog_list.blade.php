@include('header')

<div class="container">

<div class="left-table">
        <h2>Inläggstoppen</h2>
        <table>
            <tr>
                <th>Blogg</th>
                <th>Namn</th>
                <th>Antal inlägg</th>
            </tr>
        @foreach ($posts as $blog)
            <tr>
                <td><a href="{{ url('/'.$blog->blog) }}"> {{ $blog->blog }} </a></td>
                <td>{{ $blog->username}}</td>
                <td>{{ $blog->posts}}</td>
            </tr>
        @endforeach
        </table>
    </div>

    <div class="middle-table">
        <h2>Senaste skapade bloggarna</h2>
        <table>
            <tr>
                <th>Blogg</th>
                <th>Namn</th>
            </tr>
        @foreach ($created as $create)
            <tr>
                <td><a href="{{ url('/'.$create->blog) }}"> {{ $create->blog }} </a></td>
                <td>{{ $create->username}}</td>
            </tr>
        @endforeach
        </table>
    </div>

    <div class="right-table">
    <h2>Senaste inläggen</h2>
    <table>
        <tr>
            <th>Blogg</th>
            <th>Rubrik</th>
            <th>Postad</th>
        </tr>
    @foreach ($latest as $blog)
        <tr>
            <td><a href="{{ url('/'.$blog->blog) }}"> {{ $blog->blog }} </a></td>
            <td>{{ $blog->title}}</td>
            <td>{{ $blog->created_at}}</td>
        </tr>
    @endforeach
    </table>
    </div>
</div>

@include('footer')
