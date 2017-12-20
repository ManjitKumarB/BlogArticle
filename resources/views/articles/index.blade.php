@extends('app')


@section('content')

    <h1>Articles</h1>

    @foreach ($articles as $article)
        <article>
            <h2> 

                <a href="{{ url('/articles', $article->id) }}">{{ $article->title }} </a>

                <!-- general URI method to use as link  - - <a href="/articles/{{ $article->id }}">{{ $article->title }} </a> -->
                <!-- general controller method to use as link  - - <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }} </a> -->

            </h2>


            <div class="body">{{ $article->body }}</div>
        
        </article>
    @endforeach

    <!-- New Article -->
    @include ('partials.newarticle')

@stop