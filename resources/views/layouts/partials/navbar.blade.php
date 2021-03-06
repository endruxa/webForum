<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        </div>
        <!-- Right Side Of Navbar -->

            <ul class="nav navbar-nav navbar-right">

        <!-- Authentication Links -->
            @if(Auth::guest())

                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>

                @else
                {{--notifications--}}

                    <li class="dropdown" id="markasread" onclick="markNotificationAsRead({{count(auth()->user()->unreadNotifications)}})">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-globe"></span>Notifications
                            <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    @include('layouts.partials.notification.'.snake_case(class_basename($notification->type)))
                                @empty
                                    <a href="">No unread Notifications</a>
                                @endforelse
                            </li>
                        </ul>
                    </li>

                {{--<notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}">@include('layouts.partials.notification.replied_to_thread')</notification>--}}
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
   {{-- </div>--}}
</nav>