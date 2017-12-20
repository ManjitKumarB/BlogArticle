<!-- NAVIGATION BAR -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home">Blog</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/articles">Articles<span class="sr-only">(current)</span></a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Library</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li>
            <form action="/search" method="POST" class="navbar-form">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="text" name="findArticle" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
          </li>
          <li>
              <a href="{{ action('ArticlesController@show', [$latest->id]) }}">{{ $latest->title }} </a>
          </li>

          <!-- Authentication Links -->
          @guest
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Guest </a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
              </li>

          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <!--span class="caret"></span-->
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li><a href="/articles/userArticles">Articles</a></li>
                      <li><a href="#">Tasks</a></li>
                      <li><a href="#">Settings</a></li>
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>