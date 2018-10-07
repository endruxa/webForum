<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Left Side Of Navbar -->

            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

        <!-- Right Side Of Navbar -->

        <ul class="nav navbar-nav navbar-right">

        <!-- Authentication Links -->
            @if(Auth::guest())

                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>

                @else
                {{--notifications--}}
                <notification :userId="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>
                   <li class="dropdown">

                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               {{ Auth::user()->name }}
                           </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a href="{{ route('user_profile', auth()->user()) }}">
                                       My Profile
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                   </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
