<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="{{asset('assets/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">

        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li>
                    <a href="{{ route('login') }}"><i class="lnr lnr-user"></i> <span>Login</span></a>
                </li>
                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}"><i class="lnr lnr-book"></i> <span>Register</span></a>
                    </li>
                    @endif
                @endguest

            </ul>
        </div>
    </div>
</nav>