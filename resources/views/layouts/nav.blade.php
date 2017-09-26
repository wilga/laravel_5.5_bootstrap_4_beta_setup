{{-- TOP NAV BAR --}}
<nav class="navbar-dark bg-dark fixed-top">


    {{-- HAMBURGER BUTTON FOR COLLAPSED NAV --}}
    <div class="navbar navbar-expand-sm">

        {{-- SHOW BRAND EXCEPT ON WELCOME PAGE --}}
        {{-- @if($viewName !== 'welcome') --}}
            <a class="navbar-brand" href="{{ url('/') }}" {{-- style="min-width: 10rem" --}}>
                {{ config('app.name', 'Laravel') }}
            </a>
        {{-- @endif --}}

        {{-- SMALL SCREEN ICONS - MUST INCLUDE DISPLAY CSS --}}
        <ul id="nav-calendar-link-icon" class="navbar-nav flex-row mr-auto">
            <li class="nav-item {{ $viewName === 'calendar' ? 'active' : ''  }}">
                <a class="nav-link" href="{{ url('/calendar') }}"><i class="fa fa-calendar" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item nav-link-contact">
                <a class="nav-link ml-3" href="/#contact"><i id="nav-calendar-icon" class="fa fa-address-card-o" aria-hidden="true"></i></a>
            </li>        
        </ul>

        <button class="navbar-toggler navbar-toggler-left" 
            type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul id="nav-calendar-link" class="navbar-nav">
            <li class="nav-item {{ $viewName === 'calendar' ? 'active' : ''  }}" style="min-width: 5rem">
                <a class="nav-link" href="{{ url('/calendar') }}">Calendar</a>
            </li>
            <li class="nav-item nav-link-contact">
                <a class="nav-link" href="/#contact">Contact</i></a>
            </li>        
        </ul>

        {{-- ADDITIONAL NAVIGATION WHEN LOGGED IN, WILL COLLAPSE INTO HAMBURGER BUTTON--}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- aligned left, after guest links --}}
            <ul class="navbar-nav mr-auto">

                @if(Auth::user())

                    <li class="nav-item">
                        <a class="nav-link {{ $viewName === 'link1' ? 'active' : ''  }}"
                            href="/link1">
                        Link 1</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"></i>Link 2</a>
                    </li>

                @endif
            </ul>


            {{-- AUTHORIZATION & PERSONAL INFO NAV, NAVBAR RIGHT --}}
            <ul class="navbar-nav ml-auto">

                {{-- LOGIN OR REGISTER IF NOT LOGGED IN --}}
                @if (Auth::guest())
                    <li class="nav-item {{ $viewName === 'login' ? 'active' : ''  }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item {{ $viewName === 'register' ? 'active' : ''  }}">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>

                {{-- DASHBOARD OR LOGOUT --}}                
                @else    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            {{-- <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a> --}}
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
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
    </div>
</nav>

@section('scripts')
    {{-- highlight contact bookmark link if active or clicked --}}
    <script>
        if (window.location.hash == '#contact') {
            $('.nav-link-contact').addClass('active')
        }
        $('.nav-link-contact').click(function() {
            $('.nav-link-contact').addClass('active')      
        })
    </script>

@endsection