<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item logo">
            <a href="{{ url('/campings') }}" class="nav-link">
                <span class="link-text">{{ config('app.name', 'Camping') }}</span>
                @include('icons.bars')
            </a>
        </li>
        @if (!Auth::guest())
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    @include('icons.user')
                    <span class="link-text">Hello, {{ Auth::user()->name }}!</span>
                </a>
            </li>
        @endif
        
        <li class="nav-item">
            <a href="/campings" class="nav-link">
                @include('icons.camping')
                <span class="link-text">Campings</span>
            </a>
        </li>

        @if (!Auth::guest())
            <li class="nav-item">
                <a href="/campings/create" class="nav-link">
                    @include('icons.create')
                    <span class="link-text">New Camping</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    @include('icons.dashboard')
                    <span class="link-text">Dashboard</span>
                </a>
            </li>
        @endif

        @guest
            <li class="nav-item login">
                <a href="{{ route('login') }}" class="nav-link">
                    @include('icons.login')
                    <span class="link-text">{{ __('Login') }}</span>
                </a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item register">
                    <a href="{{ route('register') }}" class="nav-link">
                        @include('icons.register')
                        <span class="link-text">{{ __('Register') }}</span>
                    </a>
                </li>
            @endif
        @else            
            <li class="nav-item">
                <a  href="{{ route('logout') }}" 
                    class="nav-link" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    @include('icons.logout')
                    <span class="link-text">{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>
