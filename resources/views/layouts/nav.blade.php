    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('about') }}">About</a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
      </li>
      <li class="nav-item">
        <a href="{{ url('posts') }}" class="nav-link">Dashboard With Model</a>
      </li> 
      <li class="nav-item">
        <a href="{{ url('queryposts') }}" class="nav-link">Dashboard With Query</a>
      </li>
           <li class="nav-item">
        <a href="{{ url('ajaxposts') }}" class="nav-link">Dashboard With Ajax</a>
      </li>   
        <li class="nav-item">
        <a href="{{ route('gallery') }}" class="nav-link">Dashboard With gallery</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('view-gallery') }}" class="nav-link">View Gallery</a>
      </li>
      <li class="nav-item">
        <a href="{{ url('model-crud') }}" class="nav-link">model-crud</a>
      </li>  
      <li class="nav-item">
        <a href="{{ url('query-builder-crud') }}" class="nav-link">query-builder-crud</a>
      </li>
      <li class="nav-item">
        <a href="{{ url('ajax-crud') }}" class="nav-link">Ajax-Crud</a>
      </li>
 
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>