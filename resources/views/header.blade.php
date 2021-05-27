<!doctype html>
<html lang="sv" class="no-js">
<html>
    <meta charset="utf-8">
    <title>{{  $title }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css')  }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a href="{{ url('/') }}">
        @if ( session('header') )
            <h1> {{ session('header') }}</h1>

        @else 
            <h1> Bloggportalen </h1>
        @endif
        </a>
    </header>
    <nav class="nav">
        <a href="{{ url('/blog_list') }}">Blogglista</a>

        @if ( session('username') )
        <a href="{{ url('/create_post') }}"> Skapa inlägg </a>
        <a href="{{ url('/logout') }} "> Logga ut </a>
        <!-- <a href=""> Alla inlägg </a> -->
        @else 
        <a href="{{ url('/login') }}"> Logga in </a>
        @endif
    </nav>
  
    <main>

