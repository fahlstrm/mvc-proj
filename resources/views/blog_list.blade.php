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
        @if ($posts )
        @foreach ($posts as $blog)
            <tr>
                <td><a href="{{ url('/'.$blog->blog) }}"> {{ $blog->blog }} </a></td>
                <td>{{ $blog->username}}</td>
                <td>{{ $blog->posts}}</td>
            </tr>
        @endforeach
        @endif
        </table>
    </div>

    <div class="middle-table">
        <h2>Senaste skapade bloggarna</h2>
        <table>
            <tr>
                <th>Blogg</th>
                <th>Namn</th>
            </tr>
        @if ($created)
        @foreach ($created as $create)
            <tr>
                <td><a href="{{ url('/'.$create->blog) }}"> {{ $create->blog }} </a></td>
                <td>{{ $create->username}}</td>
            </tr>
        @endforeach
        @endif
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
        @if ( $latest )
        @foreach ($latest as $blog)
        <tr>
            <td><a href="{{ url('/'.$blog->blog) }}"> {{ $blog->blog }} </a></td>
            <td>{{ $blog->title}}</td>
            <td>{{ $blog->created_at}}</td>
        </tr>
        @endforeach
        @endif
    </table>
    </div>
</div>

@include('footer')
