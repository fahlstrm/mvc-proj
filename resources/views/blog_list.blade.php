@include('header')

<div class="container">
    <div class="left-table">
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

    <div class="right-table">
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
