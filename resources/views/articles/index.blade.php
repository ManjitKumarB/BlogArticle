@extends('app')
@section('breadcrumbs')
        <li class="active">Articles List</li>
@endsection

@section('content')

    <h1>Articles</h1>

    @if(isset($articles) && $articles<>"")

    @foreach ($articles as $article)
        <article>
            <h2> 

                <a href="{{ url('/articles', $article->id) }}">{{ $article->title }} </a>

                <!-- general URI method to use as link  - - <a href="/articles/{{ $article->id }}">{{ $article->title }} </a> -->
                <!-- general controller method to use as link  - - <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }} </a> -->

            </h2>


            @if ( strlen("strip_tags($article->body)") < 100 )

                <div class="body">{!! $article->body !!}</div>

            @else
                <div class="body">
                <?php echo substr(strip_tags($article->body), 0, 100) ?><strong>...</strong>&nbsp;
                <a href="{{ url('/articles', $article->id) }}">Read more</a>
                </div>

            @endif
            
        
        </article>
    @endforeach

    @else
        <div class="alert alert-danger">
            <strong>No Records!</strong>&nbsp;&nbsp; No records match for the search text.
            <a href="/articles" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    @endif

    
    <!-- New Article -->
    @include ('partials.newarticle')

@stop