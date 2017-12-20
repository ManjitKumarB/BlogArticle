@extends('app')


@section('content')

    <h1>{{ $article->title }}</h1>

        <article>
            {{ $article->body }}
        
        </article>

    @unless ($article->tags->isEmpty())
    <h5>Tags:</h5>
    <ul>
        @foreach ($article->tags as $tag)

            <li> {{ $tag->name }} </li>

        @endforeach
    </ul>
    @endunless

    <br/>

    @guest
    <!-- Nothing to show -->

    @else

        <!-- Verify owner of article to provide modifications -->
        @if ( Auth::user()->id == $article->user_id)

            <div>
                <table>
                    <tr>
                        <td>
                            <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                        <td>
                        <td>
                            <form method="POST" action="/articles/{{ $article->id }}">
                                <input type="hidden" name="_method" value="DELETE" />
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" value="Delete" />
                            </form>
                        </td>
                    </tr>
                </table>

            </div>

        @endif

    @endguest

    <!-- New Article -->
    @include ('partials.newarticle')


@stop