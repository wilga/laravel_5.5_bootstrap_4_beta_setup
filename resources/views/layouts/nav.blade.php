{{-- TOP NAV BAR --}}
{{-- <nav class="navbar navbar-toggleable-md navbar-light bg-faded"> was for 4.0.0-alpha.6 --}}
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    {{-- HAMBURGER BUTTON FOR COLLAPSED NAV --}}
    <button class="navbar-toggler navbar-toggler-right" 
        type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- SHOW BRAND EXCEPT ON WELCOME PAGE --}}
    @if(Route::current()->getName() !== 'welcome')
        <a class="navbar-brand" href="{{ url('/') }}">
            Laravel
        </a>
    @endif

    {{-- COLLAPSIBLE PAGE NAVIGATION WHEN LOGGED IN --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if(Auth::user())
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item {{ Route::current()->getName() === 'home' ? 'active' : ''  }}">
                    <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() === 'link1' ? 'active' : ''  }}" href="#">Link 1</a>
                </li>
                <li class="nav-item {{ Route::current()->getName() === 'link2' ? 'active' : ''  }}">
                    <a class="nav-link" href="#"></i>Link 2</a>
                </li>
            </ul>
        @endif

        {{-- AUTHORIZATION & PERSONAL INFO NAV --}}
        <ul class="navbar-nav ml-auto">
            {{-- LOGIN OR REGISTER IF NOT LOGGED IN --}}
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            {{-- DASHBOARD OR LOGOUT --}}                
            @else    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        {{-- <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif      
        </ul>
    </div>
</nav>