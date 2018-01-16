@extends('app')

@section('breadcrumbs')
        <li><a href="/articles">Articles</a></li>
        <li class="active">New Article</li>
@endsection

@section('content')

    <h1>Write a New Article</h1>

    <hr/>

    <form id="add_article" name="add_article" method="POST" action="/articles">

    {{ csrf_field() }}

        <!-- Temporary -->
        <input type="hidden" name="user_id" id="user_id" />
        
        <!-- Title Form Input -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" />
        </div>

        <!-- Body Form Input -->
        <div class="form-group">
            <label for="body">Body:</label>
            <input type="textarea" id="body" name="body" class="form-control" />
        </div>

        <!-- published_at Form Input -->
        <div class="form-group">
            <label for="published_at">Publish On:</label>
            <input type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="published_at" name="published_at" class="form-control" />
        </div>

        <!-- Tags Form Input -->
        <div class="form-group">
            <label for="tags">Tags:</label>
            <select id="tags" value=null name="tags[]" class="form-control" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <!-- Add Article Form Input -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary form-control" value="Add Article" />
        </div>

    </form>

    

    @include ('errors.list')

@stop