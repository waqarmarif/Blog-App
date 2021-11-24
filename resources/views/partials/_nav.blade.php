<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{Request::is('/') ? 'active':''}}">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item {{Request::is('about') ? 'active':''}}">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item {{Request::is('contact') ? 'active':''}}">
            <a class="nav-link" href="/contact">Contact</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('dash')}}">{{Auth::user()->name}}</a>
      </li>
        @else
        <li class="nav-item {{Request::is('login') ? 'active':''}}">
            <a class="nav-link" href="login">Login</a>
        </li>
        <li class="nav-item {{Request::is('register') ? 'active':''}}">
            <a class="nav-link" href="register">Register</a>
        </li>
        @endauth
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown">
          @auth
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            
              <x-dropdown-link :href="route('post.index')">
                      {{ __('All Posts') }}
              </x-dropdown-link>
              <x-dropdown-link :href="route('category.index')">
                {{ __('Categories') }}
              </x-dropdown-link>
              <x-dropdown-link :href="route('tag.index')">
                {{ __('Tags') }}
              </x-dropdown-link>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
  
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
          </div>
          @else
          <a href="{{route('login')}}">Login</a>
          @endauth


        
        </li>
      </ul>
    </div>
  </nav>