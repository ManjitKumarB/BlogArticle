<!-- partial HTML to show add button for create new article -->

@guest
    <!-- Nothing to show -->
@else
        <div>
            <a class="btn-floating btn-large waves-effect add-article-btn" title="create article" href="/articles/create" >
                <i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i>
            </a>
        </div>

@endguest