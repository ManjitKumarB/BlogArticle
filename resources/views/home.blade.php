@extends('app')
@section('breadcrumbs')
<li class="active">Dashboard</li>
@endsection

@section('content')
<div class="row">
</div>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/articles/userArticles">My Articles</a></div>
                <div class="panel-heading"><a href="/articles">All Articles</a></div>
<!--
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
-->
            </div>
        </div>
    </div>
</div>
@endsection
