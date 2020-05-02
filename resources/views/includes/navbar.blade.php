<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">

        <a href="index.html"><img src="{{asset('assets/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
        
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>

        {{-- <div class="navbar-btn navbar-btn-right">
            <a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
        </div> --}}
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="
                        @if(auth()->user()->role=='dosen')
                        {{auth()->user()->lecturers->getAvatar()}}
                        @elseif(auth()->user()->role=='mahasiswa')
                        {{auth()->user()->students->getAvatar()}}
                        @else
                            /images/default.jpg 
                        @endif
                        "
                            
                        class="img-circle" alt="Avatar"> <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        
                    <ul class="dropdown-menu">
                        @if(auth()->user()->role=='dosen')
                        <li><a href="{{route('lecturers.myprofile')}}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        @endif

                        @if(auth()->user()->role=='mahasiswa')
                        <li><a href="{{route('students.profilsaya')}}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        @endif
                        
                        <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        

                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                </li>
                <!-- <li>
                    <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>