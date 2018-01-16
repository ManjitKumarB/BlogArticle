@extends('app')
@section('breadcrumbs')
        <li><a href="/articles">Articles</a></li>
        <li class="active">{{ $article->title }}</li>
@endsection

@section('content')

    <h1>Edit: {{ $article->title }}</h1>

    <hr/>

    <form method="POST" action="/articles/{{ $article->id }}">
        <input type="hidden" name="_method" value="PATCH" />

    {{ csrf_field() }}

        <!-- Title Form Input -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $article->title }}"/>
        </div>

        <!-- Body Form Input -->
        <div class="form-group">
            <label for="body">Body:</label>
            <input type="textarea" id="body" name="body" class="form-control" value="{{ $article->body }}" />
        </div>

        <!-- published_at Form Input -->
        <div class="form-group">
            <label for="published_at">Publish On:</label>
            <input type="date" id="published_at" name="published_at" class="form-control" value="{{ Carbon\Carbon::parse($article->published_at)->format('Y-m-d') }}"/>
        </div>

        <!-- Tags Form Input -->
        <div class="form-group">
            <label for="tags">Tags:</label>
            <select id="tags" value=null name="tags[]" class="form-control" multiple="multiple">
                @foreach ($tags as $tag)
                <option value="{{$tag->id}}" <?php if(in_array($tag->id, $tagList)) {?> selected="selected" <?php }?> >{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <!-- Add Article Form Input -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary form-control" value="Update Article" />
        </div>

    </form>

@include ('errors.list')

@stop