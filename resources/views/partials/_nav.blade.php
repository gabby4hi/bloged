<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-slide-dropdown">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-slide-dropdown">
        <ul class="nav navbar-nav">    
              <li class="{{ Request::is('/') ? "active": " " }}"><a href="/">Home</a></li>
             

              <li class="{{ Request::is('about') ? "active": " " }}"><a href="/about">About</a></li>
              <li class="{{ Request::is('contacts') ? "active": " " }}"><a href="contacts">Contact</a></li> 
              <li class="{{ Request::is('blog') ? "active": " " }}"><a href="blog">Blog</a></li> 
          
        </ul>

        <ul class="nav navbar-nav navbar-right">
        @if (Auth::check()) 
            <li class="dropdown">
              <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
            <li><a href="{{ route('post.index') }}">Post</a></li>
            <li>
            
            {!! Form::open(['route'=> 'logout', 'Method' => 'POST']) !!}
            {{ csrf_field() }}
            
            <input type="submit" name="logout" value="Logout" class="btn btn-default" style="margin-top: 10px">

            {!! Form::close() !!}
            <!--
            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>-->

            @else

            <li><a href="{{ route('login') }}">Login</a></li>

             @endif  
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- Testing option to recover navigation  -->
            <!-- Main component for a primary marketing message or call to action -->
              <div class="container">
  
          

