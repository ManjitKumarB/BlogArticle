<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('about', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Articles
Breadcrumbs::register('articles', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Articles', route('articles'));
});

// Home > Articles > [article]
Breadcrumbs::register('article', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('articles');
    $breadcrumbs->push($article->title, route('articles', $article->id));
});

?>