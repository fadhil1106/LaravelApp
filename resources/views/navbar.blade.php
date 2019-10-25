<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">LaravelApp</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if (!empty($page) && $page == 'student')
                    <li class="active">
                        <a href="{{ url('student') }}">Siswa<span class="sr-only">(current)</span></a>
                    </li>
                @else
                    <li><a href="{{ url('student') }}">Siswa</a></li>
                @endif
                
                @if (Auth::check())    
                    @if (!empty($page) && $page == 'class')
                        <li class="active">
                            <a href="{{ url('class') }}">Classes<span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li><a href="{{ url('class') }}">Classes</a></li>
                    @endif
                @endif

                @if (Auth::check())    
                    @if (!empty($page) && $page == 'hobby')
                        <li class="active">
                            <a href="{{ url('hobby') }}">Hobby<span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li><a href="{{ url('hobby') }}">Hobby</a></li>
                    @endif
                @endif

                @if (!empty($page) && $page == 'about')
                <li class="active">
                    <a href="{{ url('about') }}">About<span class="sr-only">(current)</span></a>
                </li>
                @else
                    <li><a href="{{ url('about') }}">About</a></li>
                @endif

                @if (Auth::check() && Auth::user()->level == 'admin')    
                    @if (!empty($page) && $page == 'user')
                        <li class="active">
                            <a href="{{ url('user') }}">User<span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li><a href="{{ url('user') }}">User</a></li>
                    @endif
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li>    
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ Auth::user()->name }}
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li><a href="{{ url('login') }}">Login</a></li>    
                @endif
            </ul>
        </div>{{-- navbar-collapse --}}
    </div>{{-- container-fluid --}}
</nav>
{{-- Handled in app/Providers/LaravelAppServiceProvider --}}
